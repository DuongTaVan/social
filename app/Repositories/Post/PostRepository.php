<?php

namespace App\Repositories\Post;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\BaseController;
use App\Http\Resources\PostResource;
use App\Enums\Constants;
use Symfony\Component\HttpFoundation\Response;

class PostRepository extends BaseController implements IPostRepository
{
    public function listPost()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->with(['post' => function ($query) {
            $query->paginate(Constants::NUMBER_POST_PAGINATE);
            $query->withCount('like');
            $query->withCount('count_user');
        }])->get();
        return PostResource::collection($user);
    }

    public function addPost($request)
    {
        $data = $request->all();
        $data["created_by"] = Auth::user()->id;
        Post::create($data);
        return $this->responseSuccess('add post success', Response::HTTP_OK);
    }

    public function detailPost($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    public function updatePost($request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return $this->responseSuccess('update post success', Response::HTTP_OK);
    }

    public function removePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return $this->responseSuccess('remove post success', Response::HTTP_OK);
    }

    public function userLike($id)
    {
        $post = Post::where('id', $id)->with(['like'=>function($query){
            $query->with('user');
        }])->get();
        return PostResource::collection($post);
    }
    public function userShare($id)
    {
        $post = Post::where('id', $id)->with(['count_user'=>function($query){
            $query->with('user');
        }])->get();
        return PostResource::collection($post);
    }
}
