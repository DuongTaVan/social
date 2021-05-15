<?php

namespace App\Repositories\Post;
interface IPostRepository
{
    public function getPosts();

    public function add($request);

    public function detail($id);

    public function update($request, $id);

    public function remove($id);

    public function getUsersLike($id);

    public function getUsersShare($id);

    public function share($id, $request);

    public function getPostsHome();
}
