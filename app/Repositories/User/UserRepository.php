<?php

namespace App\Repositories\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
use App\Enums\Lang;
use Symfony\Component\HttpFoundation\Response;

class UserRepository extends BaseController implements IUserRepository
{
    public function changePassword($email, $password)
    {
        $user = User::where('email', $email)->first();
        $user->password = bcrypt($password);
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

    public function listUserBlock()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $id_users = json_decode($user->block);
        if ($id_users == null) {
            return $this->checkUserExit($id_users);
        }
        $list_user_block = [];
        foreach ($id_users as $id_user) {
            $user = User::find($id_user);
            $list_user_block[] = $user;
        }
        return UserResource::collection($list_user_block);
    }

    public function addUserBlock($blog)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $id_users = json_decode($user->block);
        if ($id_users != null && in_array((int)$blog, $id_users)) {
            return $this->responseError(Lang::USER_ALREADY_EXIST, Response::HTTP_NOT_FOUND);
        }
        $id_users[] = (int)$blog;
        $user->block = json_encode($id_users);
        $user->save();
        return $this->responseSuccess(Lang::ADD_SUCCESS, Response::HTTP_OK);
    }

    public function removeUserBlock($blog)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $id_users = json_decode($user->block);
        if ($id_users == null) {
            return $this->checkUserExit($id_users);
        }
        if (!in_array((int)$blog, $id_users)) {
            return $this->responseError(Lang::USER_NOT_IN_THE_LIST, Response::HTTP_NOT_FOUND);
        }
        $key = array_search($blog, $id_users);
        unset($id_users[$key]);
        $id_users = array_values($id_users);
        $user->block = json_encode($id_users);
        $user->save();
        return $this->responseSuccess(Lang::REMOVE_SUCCESS, Response::HTTP_OK);
    }

    public function changeInfo($name, $password)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $name;
        $user->password = bcrypt($password);
        $user->save();
        return $this->responseSuccess(Lang::CHANGE_INFOR_SUCCESS, Response::HTTP_OK);
    }

}
