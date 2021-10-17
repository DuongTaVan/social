<?php

namespace App\Repositories\Friend;

interface IFriendRepository
{
    public function getFriends();

    public function getFriendsChat();

    public function request();

    public function sendRequest($id);

    public function remove($id);

    public function accept($id);

    public function removeRequest($id);
}
