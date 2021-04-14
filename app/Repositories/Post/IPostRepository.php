<?php

namespace App\Repositories\Post;
interface IPostRepository
{
    public function listPost();

    public function addPost($request);

    public function detailPost($id);

    public function updatePost($request, $id);

    public function removePost($id);

    public function userLike($id);

    public function userShare($id);
}
