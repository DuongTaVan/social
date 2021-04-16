<?php

namespace App\Repositories\User;

interface IUserRepository
{
    public function changePassword($request);

    public function isExistToken($query, $email, $check_time);

    public function storeToken($token, $email);

    public function checkToken($token);

    public function getListUsersBlock();

    public function addUserBlock($blog);

    public function removeUserBlock($blog);

    public function changeInfo($name, $password);

    public function searchUser($request);
}

