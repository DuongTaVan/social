<?php

namespace App\Repositories\User;

interface IUserRepository
{
    public function changePassword($email, $password);

    public function isExistToken($query, $email, $check_time);

    public function storeToken($token, $email);

    public function checkToken($token);

    public function listUserBlock();

    public function addUserBlock($blog);

    public function removeUserBlock($blog);

    public function changeInfo($name, $password);
}

