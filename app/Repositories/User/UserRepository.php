<?php

namespace App\Repositories\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepository implements IUserRepository
{
    public function changePassword($request)
    {
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->token_reset_password = NULL;
        $user->token_reset_password_at = NULL;
        $user->save();
    }

    public function isExistToken($query, $email, $check_time)
    {
        $user = User::where($query, $email)->where('token_reset_password_at', '>', $check_time)->first();
        return $user;
    }

    public function storeToken($token, $email)
    {
        $user = User::where('email', $email)->first();
        $user->token_reset_password = $token;
        $user->token_reset_password_at = Carbon::now();
        $user->save();
    }

    public function checkToken($token)
    {
        $user = User::where("token_reset_password", $token)->first();
        return $user;
    }

}
