<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Lang;
use App\Http\Controllers\BaseController;
use App\Http\Resources\FriendResource;
use App\Repositories\Friend\FriendRepository;
use Symfony\Component\HttpFoundation\Response;

class FriendController extends BaseController
{
    /**
     * @var friendRepository
     */
    public $friendRepository;

    /**
     * @param FriendRepository $friendRepository
     */
    public function __construct(FriendRepository $friendRepository)
    {
        $this->friendRepository = $friendRepository;
    }

    /**
     * @return json //list friend
     */
    public function getFriends()
    {
        $users = $this->friendRepository->getFriends();
        return $users;
    }
    public function getFriendsChat()
    {
        $users = $this->friendRepository->getFriendsChat();
        return $users;
    }

    /**
     * @return json //list user request
     */
    public function request()
    {
        $users = $this->friendRepository->request();
        return FriendResource::collection($users);
    }

    /**
     * @param int $id //id friend
     * @return json $message
     */
    public function sendRequest($id)
    {
        $friend = $this->friendRepository->sendRequest($id);
        return $friend;
    }

    /**
     * @param int $id //id friend
     * @return json $message
     */
    public function remove($id)
    {
        $this->friendRepository->remove($id);
        return $this->responseSuccess(Lang::REMOVE_FRIEND_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id friend
     * @return json $message
     */
    public function accept($id)
    {
        $this->friendRepository->accept($id);
        return $this->responseSuccess(Lang::ADD_FRIEND_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id friend
     * @return json $message
     */
    public function removeRequest($id)
    {
        $this->friendRepository->removeRequest($id);
        return $this->responseSuccess(Lang::REMOVE_REQUEST_FRIEND_SUCCESS, Response::HTTP_OK);
    }
}
