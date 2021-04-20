<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Resources\LikeResource;
use App\Repositories\Like\LikeRepository;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends BaseController
{
    public $likeRepository;

    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function addLike($id)
    {
        $this->likeRepository->addLike($id);
        return $this->responseSuccess(Lang::ADD_LIKE_SUCCESS, Response::HTTP_OK);
    }

    public function removeLike($id)
    {
        $user = $this->likeRepository->removeLike($id);
        return $user;
    }

    public function addLikeComment($id)
    {
        $this->likeRepository->addLikeComment($id);
        return $this->responseSuccess(Lang::REMOVE_LIKE_SUCCESS, Response::HTTP_OK);
    }

    public function removeLikeComment($id)
    {
        $this->likeRepository->removeLikeComment($id);
        return $this->responseSuccess(Lang::REMOVE_LIKE_SUCCESS, Response::HTTP_OK);
    }
}
