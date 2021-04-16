<?php

namespace App\Repositories\Comment;

interface ICommentRepository
{
    public function add($request, $id);

    public function detail($id);

    public function update($request, $id);

    public function remove($id);

    public function getComments($id);
}
