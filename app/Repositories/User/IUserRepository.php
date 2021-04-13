<?php
namespace App\Repositories\User;
use Illuminate\Http\Request;

interface IUserRepository{
    public function changePassword($request);

    public function isExistToken($query, $email, $check_time);

    public function storeToken($token, $email);

    public function checkToken($token);
}

