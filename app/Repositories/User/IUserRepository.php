<?php

namespace App\Repositories\User;

interface IUserRepository
{
    public function changePassword($request);

    public function isExistToken($query, $email, $check_time);

    public function storeToken($token, $email);

    public function checkToken($token);

    public function getUsersBlock();

    public function addUserBlock($block);

    public function removeUserBlock($block);

    public function changeInfo($request);

    public function search($request);

    public function profileFriend($id);

    public function getFollowers();

    public function getListFollowing();
}

