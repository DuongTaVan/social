<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Lang;
use App\Http\Controllers\BaseController;
use App\Http\Resources\LikeResource;
use App\Repositories\Like\LikeRepository;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends BaseController
{
    /**
     * @var likeRepository
     */
    public $likeRepository;
    /**
     * @param LikeRepository $likeRepository
     */
    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    /**
     * @return json //list like user
     */
    public function getLikes()
    {
        $likes = $this->likeRepository->getLikes();
        return $likes;
    }
    /**
     * @return json //list like user
     */
    public function getLikesComment()
    {
        $likes = $this->likeRepository->getLikesComment();
        return $likes;
    }
    /**
     * @param int $id //id like
     * @return json $message
     */
    public function add($id)
    {
        $this->likeRepository->add($id);
        return $this->responseSuccess(Lang::ADD_LIKE_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id like
     * @return json $message
     */
    public function remove($id)
    {
        $this->likeRepository->remove($id);
        return $this->responseSuccess(Lang::REMOVE_LIKE_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id like
     * @return json $message
     */
    public function addLikeComment($id)
    {
        $this->likeRepository->addLikeComment($id);
        return $this->responseSuccess(Lang::ADD_LIKE_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id like
     * @return json $message
     */
    public function removeLikeComment($id)
    {
        $this->likeRepository->removeLikeComment($id);
        return $this->responseSuccess(Lang::REMOVE_LIKE_SUCCESS, Response::HTTP_OK);
    }
}
