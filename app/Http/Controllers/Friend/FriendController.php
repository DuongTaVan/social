<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Lang;
use App\Http\Resources\FriendResource;
use App\Repositories\Friend\FriendRepository;
use Symfony\Component\HttpFoundation\Response;

class FriendController extends BaseController
{
    public $friendRepository;

    public function __construct(FriendRepository $friendRepository)
    {
        $this->friendRepository = $friendRepository;
    }

    public function getListFriends()
    {
        $users = $this->friendRepository->getListFriends();
        return FriendResource::collection($users);
    }

    public function requestFriend()
    {
        $users = $this->friendRepository->requestFriend();
        return FriendResource::collection($users);
    }

    public function sendRequestFriend(Request $request, $id)
    {
        $this->friendRepository->sendRequestFriend($request, $id);
        return $this->responseSuccess(Lang::SEND_REQUEST_FRIEND_SUCCESS, Response::HTTP_OK);
    }

    public function removeFriend($id)
    {
        $this->friendRepository->removeFriend($id);
        return $this->responseSuccess(Lang::REMOVE_FRIEND_SUCCESS, Response::HTTP_OK);
    }

    public function acceptFriend($id)
    {
        $this->friendRepository->acceptFriend($id)
        return $this->responseSuccess(Lang::ADD_FRIEND_SUCCESS, Response::HTTP_OK);
    }

    public function removeRequestFriend($id)
    {
        $this->friendRepository->removeRequestFriend($id);
        return $this->responseSuccess(Lang::REMOVE_REQUEST_FRIEND_SUCCESS, Response::HTTP_OK);
    }
}
