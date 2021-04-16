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

    public function listPost()
    {
        return $this->postRepository->listPost();
    }

    public function addPost(Request $request)
    {
        return $this->postRepository->addPost($request);
    }

    public function detailPost($id)
    {
        return $this->postRepository->detailPost($id);
    }

    public function updatePost(Request $request, $id)
    {
        return $this->postRepository->updatePost($request, $id);
    }

    public function removePost($id)
    {
        return $this->postRepository->removePost($id);
    }

    public function userLike($id)
    {
        return $this->postRepository->userLike($id);
    }

    public function userShare($id)
    {
        return $this->postRepository->userShare($id);
    }
}
