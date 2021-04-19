<?php

namespace App\Repositories\Post;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\BaseController;
use App\Http\Resources\PostResource;
use App\Enums\Constants;
use App\Enums\Lang;
use Symfony\Component\HttpFoundation\Response;

class PostRepository extends BaseController implements IPostRepository
{
    /**
     * @return json $result
     */
    public function getListPosts()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->with(['post' => function ($query) {
            $query->paginate(Constants::NUMBER_POST_PAGINATE);
            $query->withCount('like');
            $query->withCount('count_user');
        }])->get();
        return PostResource::collection($user);
    }

    /**
     * @param int|string $request //data
     */
    public function addPost($request)
    {
        $data = $request->all();
        $data["created_by"] = Auth::user()->id;
        Post::create($data);
        return $this->responseSuccess(Lang::ADD_POST_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id user friend
     */
    public function detailPost($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    /**
     * @param int $id //id post
     * @param int|string $request //data
     * @return json $result
     */
    public function updatePost($request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return $this->responseSuccess(Lang::UPDATE_POST_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function removePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return $this->responseSuccess(Lang::REMOVE_POST_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function getUsersLike($id)
    {
        $post = Post::where('id', $id)->with(['like' => function ($query) {
            $query->with('user');
        }])->get();
        return PostResource::collection($post);
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function getUsersShare($id)
    {
        $post = Post::where('id', $id)->with(['count_user' => function ($query) {
            $query->with('user');
        }])->get();
        return PostResource::collection($post);
    }
}
