<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Friend\FriendRepository;

class FriendController extends Controller
{
    public $friendRepository;

    public function __construct(FriendRepository $friendRepository)
    {
        $this->friendRepository = $friendRepository;
    }

    public function getListFriends()
    {
        $users = $this->friendRepository->getListFriends();
        return $users;
    }

    public function requestFriend()
    {
        $user = $this->friendRepository->requestFriend();
        return $user;
    }

    public function sendRequestFriend(Request $request, $id)
    {
        $user = $this->friendRepository->sendRequestFriend($request, $id);
        return $user;
    }

    public function removeFriend($id)
    {
        $user = $this->friendRepository->removeFriend($id);
        return $user;
    }

    public function acceptFriend($id)
    {
        $user = $this->friendRepository->acceptFriend($id)
        return $user;
    }

    public function removeRequestFriend($id)
    {
        $user = $this->friendRepository->removeRequestFriend($id);
        return $user;
    }
}
