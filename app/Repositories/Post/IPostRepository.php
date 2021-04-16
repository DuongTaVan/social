<?php

namespace App\Repositories\Post;
interface IPostRepository
{
    public function getListPosts();

    public function addPost($request);

    public function detailPost($id);

    public function updatePost($request, $id);

    public function removePost($id);

    public function getUsersLike($id);

    public function getUsersShare($id);
}
