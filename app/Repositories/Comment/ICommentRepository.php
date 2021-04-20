<?php

namespace App\Repositories\Comment;

interface ICommentRepository
{
    public function addComment($request, $id);

    public function detailComment($id);

    public function updateComment($request, $id);

    public function removeComment($id);

    public function getListComment($id);
}
