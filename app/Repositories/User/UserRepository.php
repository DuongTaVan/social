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
use App\Enums\Constants;
use Symfony\Component\HttpFoundation\Response;

class UserRepository extends BaseController implements IUserRepository
{
    /**
     * @param int|string $request //data
     */
    public function changePassword($request)
    {
        $user = User::where('email', $request->email)->where('user->token_reset_password', $request->token_reset_password)->firstOrFail();
        $user->password = bcrypt($request->password);
        $user->token_reset_password = NULL;
        $user->token_reset_password_at = NULL;
        $user->save();
        return $this->responseSuccess(Lang::CHANGE_PASSWORD_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int|string $request //data
     * @param string $email //email user
     * @param int $check_time //time
     */
    public function isExistToken($query, $email, $check_time)
    {
        $user = User::where($query, $email)->where('token_reset_password_at', '>', $check_time)->first();
        return $user;
    }

    /**
     * @param json $token
     * @param string $email //email user
     */
    public function storeToken($token, $email)
    {
        $user = User::where('email', $email)->first();
        $user->token_reset_password = $token;
        $user->token_reset_password_at = Carbon::now();
        $user->save();
    }

    /**
     * @param json $token
     */
    public function checkToken($token)
    {
        $user = User::where("token_reset_password", $token)->first();
        return $user;
    }

    /**
     * @param json $token
     * @param string $email //email user
     * @return json $result
     */
    public function getListUsersBlock()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $idUsers = json_decode($user->block);
        if ($idUsers == null) {
            return $this->checkUserExit($idUsers);
        }
        $listUserBlock = [];
        foreach ($idUsers as $id_user) {
            $user = User::find($id_user);
            $listUserBlock[] = $user;
        }
        return UserResource::collection($listUserBlock);
    }

    /**
     * @param int $blog // id of post
     * @return json $result
     */
    public function addUserBlock($blog)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $idUsers = json_decode($user->block);
        if ($idUsers != null && in_array((int)$blog, $idUsers)) {
            return $this->responseError(Lang::USER_ALREADY_EXIST, Response::HTTP_NOT_FOUND);
        }
        $idUsers[] = (int)$blog;
        $user->block = json_encode($idUsers);
        $user->save();
        return $this->responseSuccess(Lang::ADD_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $blog // id of post
     * @return json $result
     */
    public function removeUserBlock($blog)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $idUsers = json_decode($user->block);
        if ($idUsers == null) {
            return $this->checkUserExit($idUsers);
        }
        if (!in_array((int)$blog, $idUsers)) {
            return $this->responseError(Lang::USER_NOT_IN_THE_LIST, Response::HTTP_NOT_FOUND);
        }
        $key = array_search($blog, $idUsers);
        unset($idUsers[$key]);
        $idUsers = array_values($idUsers);
        $user->block = json_encode($idUsers);
        $user->save();
        return $this->responseSuccess(Lang::REMOVE_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $name // name after change
     * @param int $password // password after change
     * @return json $result
     */
    public function changeInfo($name, $password)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $name;
        $user->password = bcrypt($password);
        $user->save();
        return $this->responseSuccess(Lang::CHANGE_INFOR_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param string $request // name of user
     * @return json $result
     */
    public function searchUser($request)
    {
        $idUserBlocks = User::findOrFail(Auth::user()->id)->block;
        $idUserBlocks = json_decode($idUserBlocks);
        $users = User::where('name', 'like', '%' . $request->name . '%')->whereNotIn('id', $idUserBlocks)->paginate(Constants::PAGINATE_SEARCH_USER);
        return UserResource::collection($users);
    }
}
