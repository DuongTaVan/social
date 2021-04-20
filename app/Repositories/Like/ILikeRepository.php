<?php

namespace App\Repositories\Like;

interface ILikeRepository
{
    public function addLike($id);

    public function removeLike($id);

    public function addLikeComment($id);

    public function removeLikeComment($id);
}
