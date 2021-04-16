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
    /**
     * @var postRepository
     */
    public $postRepository;
    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    /**
     * @return json //list post
     */
    public function getPosts()
    {
        $posts = $this->postRepository->getPosts();
        return $posts;
    }
    /**
     * @param int $id //id friend
     * @return json //list post of friend
     */
    public function getFriendPosts($friendId)
    {
        $posts = $this->postRepository->getFriendPosts($friendId);
        return $posts;
    }
    /**
     * @param int|string $request //data
     * @return json $message
     */
    public function add(PostRequest $request)
    {
        $this->postRepository->add($request);
        return $this->responseSuccess(Lang::ADD_POST_SUCCESS, Response::HTTP_OK);
    }
    /**
     * @param int $id //id post
     * @return json //data of detail post
     */
    public function detail($id)
    {
        $post = $this->postRepository->detail($id);
        return new PostResource($post);
    }
    /**
     * @param int $id //id post
     * @param int|string $request //data
     * @return json $message
     */
    public function update(PostRequest $request, $id)
    {
        $this->postRepository->update($request, $id);
        return $this->responseSuccess(Lang::UPDATE_POST_SUCCESS, Response::HTTP_OK);
    }
    /**
     * @param int $id //id post
     * @return json $message
     */
    public function remove($id)
    {
        $this->postRepository->remove($id);
        return $this->responseSuccess(Lang::REMOVE_POST_SUCCESS, Response::HTTP_OK);
    }
    /**
     * @param int $id //id user like post
     * @param int|string $request //data
     * @return json //list user like post
     */
    public function getUsersLike($id)
    {
        $post = $this->postRepository->getUsersLike($id);
        return PostResource::collection($post);
    }
    /**
     * @param int $id //id post
     * @return json //list user share post
     */
    public function getUsersShare($id)
    {
        $users = $this->postRepository->getUsersShare($id);
        return PostResource::collection($users);
    }
    /**
     * @param int $id //id post
     * @param int|string $request //data
     * @return json $message
     */
    public function share($id, PostRequest $request)
    {
        $this->postRepository->share($id, $request);
        return $this->responseSuccess(Lang::ADD_POST_SUCCESS, Response::HTTP_OK);
    }
    /**
     * @return json //list post home
     */
    public function getPostsHome()
    {
        $posts = $this->postRepository->getPostsHome();
        return PostResource::collection($posts);
    }
}
