<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Post\PostRepository;

class PostController extends Controller
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

    public function addPost(Request $request)
    {
        $post = $this->postRepository->addPost($request);
        return $post;
    }

    public function detailPost($id)
    {
        $post = $this->postRepository->detailPost($id);
        return $post;
    }

    public function updatePost(Request $request, $id)
    {
        $post = $this->postRepository->updatePost($request, $id);
        return $post;
    }

    public function removePost($id)
    {
        $post = $this->postRepository->removePost($id);
        return $post;
    }

    public function getUsersLike($id)
    {
        $users = $this->postRepository->getUsersLike($id);
        return $users;
    }

    public function userShare($id)
    {
        $users = $this->postRepository->getUsersShare($id);
        return $users;
    }
}
