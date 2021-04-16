<?php

namespace App\Repositories\Friend;

interface IFriendRepository
{
    public function getListFriends();

    public function requestFriend();

    public function sendRequestFriend($request, $id);

    public function removeFriend($id);

    public function acceptFriend($id);

    public function removeRequestFriend($id);
}
