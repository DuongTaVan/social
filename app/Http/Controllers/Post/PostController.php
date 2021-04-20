<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Enums\Lang;
use App\Http\Requests\PostRequest;
use App\Repositories\Post\PostRepository;
use App\Http\Resources\PostResource;
use Symfony\Component\HttpFoundation\Response;

class PostController extends BaseController
{
    public $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getListPosts()
    {
        $posts = $this->postRepository->getListPosts();
        return $posts;
    }

    public function getListFriendPosts($friendId)
    {
        $posts = $this->postRepository->getListFriendPosts($friendId);
        return $posts;
    }

    public function addPost(PostRequest $request)
    {
        $this->postRepository->addPost($request);
        return $this->responseSuccess(Lang::ADD_POST_SUCCESS, Response::HTTP_OK);
    }

    public function detailPost($id)
    {
        $post = $this->postRepository->detailPost($id);
        return new PostResource($post);
    }

    public function updatePost(PostRequest $request, $id)
    {
        $this->postRepository->updatePost($request, $id);
        return $this->responseSuccess(Lang::UPDATE_POST_SUCCESS, Response::HTTP_OK);
    }

    public function removePost($id)
    {
        $this->postRepository->removePost($id);
        return $this->responseSuccess(Lang::REMOVE_POST_SUCCESS, Response::HTTP_OK);
    }

    public function getUsersLike($id)
    {
        $post = $this->postRepository->getUsersLike($id);
        return PostResource::collection($post);
    }

    public function getUsersShare($id)
    {
        $users = $this->postRepository->getUsersShare($id);
        return PostResource::collection($users);
    }

    public function sharePost($id, PostRequest $request)
    {
        $this->postRepository->sharePost($id, $request);
        return $this->responseSuccess(Lang::ADD_POST_SUCCESS, Response::HTTP_OK);
    }
}
