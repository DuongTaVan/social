<?php

namespace App\Repositories\Like;

interface ILikeRepository
{
    public function getLikes();

    public function getLikesComment();

    public function add($id);

    public function remove($id);

    public function addLikeComment($id);

    public function removeLikeComment($id);
}
