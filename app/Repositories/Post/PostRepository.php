<?php

namespace App\Repositories\Post;

use Faker\Provider\Image;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\File;
use App\Http\Controllers\BaseController;
use App\Http\Resources\PostResource;
use App\Enums\Constants;
use App\Enums\Lang;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PostRepository extends BaseController implements IPostRepository
{
    /**
     * @return json $result
     */
    public function getPostsHome()
    {
        $id = Auth::user()->id;
        $posts = Post::whereHas('user', function ($q) use ($id) {
            $q->where('id', $id)->orWhereHas('userTo', function ($q) use ($id) {
                $q->where('from_id', $id);
            })->orWhereHas('userFrom', function ($q) use ($id) {
                $q->where('status', 1);
                $q->where('to_id', $id);
            });
        })
            ->with('user')
            ->withCount('count_user')
            ->withCount('like')
            ->withCount('comment')
            ->with('file')
            ->with(['sharePost' => function ($query) {
                $query->with('user');
            }])
            ->orderByDesc('created_at')->paginate(Constants::NUMBER_POST_PAGINATE);
        return $posts;
    }

    /**
     * @return json $result
     */
    public function getPosts()
    {
        $id = Auth::user()->id;
        $posts = Post::where('created_by', $id)
            ->withCount('count_user')
            ->withCount('like')
            ->withCount('comment')
            ->with('file')
            ->with(['sharePost' => function ($query) {
                $query->with('user');
            }])
            ->orderByDesc('id')
            ->paginate(Constants::NUMBER_POST_PAGINATE);
        return PostResource::collection($posts);
    }

    /**
     * @return json $result
     */
    public function getFriendPosts($friendId)
    {
        $posts = Post::where('created_by', $friendId)
            ->withCount('count_user')
            ->withCount('like')
            ->withCount('comment')
            ->with('file')->with(['sharePost' => function ($query) {
                $query->with('user');
            }])
            ->orderByDesc('id')
            ->paginate(Constants::NUMBER_POST_PAGINATE);

        return PostResource::collection($posts);
    }

    /**
     * @param int|string $request //data
     */
    public function add($request)
    {
        DB::beginTransaction();
        try {
            $post = new Post;
            $post->content = $request->content;
            $post->created_by = Auth::user()->id;
            $post->save();
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $name = "/images/" . time() . Str::random(Constants::RANDOM_NAME_FILE) . '.' . $file->getClientOriginalExtension();
                    $path = public_path() . '/uploads/images/';
                    Storage::disk('public')->put($name, file_get_contents($file->getRealPath()));
                    $file = new File;
                    $file->name = $name;
                    $file->post_id = $post->id;
                    $file->save();
                }
            }
            \DB::commit();
        } catch (Throwable $e) {

            \DB::rollback();
            return $this->responseError(Lang::POST_UPLOAD_ERR, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param int $id //id user friend
     */
    public function detail($id)
    {
        $post = Post::where('id', $id)->with('file', 'user')->firstOrFail();
        return $post;
    }

    /**
     * @param int $id //id post
     * @param int|string $request //data
     * @return json $result
     */
    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $post = Post::findOrFail($id);
            $post->update($request->all());
            if ($request->idImagesDelete) {
                foreach ($request->idImagesDelete as $idImage) {
                    $file = File::findOrFail('id', $idImage);
                    if ($file->name) {
                        $file_path = $file->name;
                        unlink(storage_path('app/public/' . $file_path));
                    }
                    $file->delete();
                }
            }
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $extend = [
                        'png', 'jpg', 'jpeg', 'PNG', 'JPG'
                    ];
                    if (!in_array($ext, $extend)) {
                        return $this->responseError(Lang::FILE_UPLOAD_NOT_IMAGE, Response::HTTP_NOT_FOUND);
                    }
                    $name = "/images/" . time() . Str::random(Constants::RANDOM_NAME_FILE) . '.' . $file->getClientOriginalExtension();
                    $path = public_path() . '/uploads/images/';
                    Storage::disk('public')->put($name, file_get_contents($file->getRealPath()));
                    $file = new File;
                    $file->name = $name;
                    $file->post_id = $post->id;
                    $file->save();
                }
            }
            \DB::commit();
        } catch (Throwable $e) {
            \DB::rollback();
            return $this->responseError(Lang::POST_UPLOAD_ERR, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function remove($id)
    {
        DB::beginTransaction();
        try {
            $post = Post::findOrFail($id);
            $files = File::where('post_id', $id)->get();
            foreach ($files as $file) {

                $removeFile = File::findOrFail($file->id);
                if ($removeFile->name) {
                    $file_path = $removeFile->name;
                    unlink(storage_path('app/public/' . $file_path));
                }
                $removeFile->delete();
            }
            $post->delete();
            \DB::commit();
        } catch (Throwable $e) {
            \DB::rollback();
            return $this->responseError(Lang::POST_REMOVE_ERR, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function getUsersLike($id)
    {
        $users = Post::where('id', $id)->with(['like' => function ($query) {
            $query->with('user');
        }])->get();
        return $users;
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function getUsersShare($id)
    {
        $users = Post::where('id', $id)->with(['count_user' => function ($query) {
            $query->with('user');
        }])->get();
        return $users;

    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function share($id, $request)
    {
        $data = $request->all();
        $data['share_post_id'] = $id;
        $data['created_by'] = Auth::user()->id;
        Post::create($data);
    }
}
