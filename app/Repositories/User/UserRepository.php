<?php

namespace App\Repositories\User;

use App\Models\Friend;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
use App\Enums\Lang;
use App\Enums\Constants;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class UserRepository extends BaseController implements IUserRepository
{
    /**
     * @return json $result
     */
    public function getFollowers()
    {
        $users = Friend::where('to_id', Auth::user()->id)->where('status', 0)->with('userFrom')->get();
        return $users;
    }

    /**
     * @return json $result
     */
    public function getListFollowing()
    {
        $users = Friend::where('from_id', Auth::user()->id)->where('status', 0)->with('userTo')->get();
        return $users;
    }

    /**
     * @param int|string $request //data
     * @return json $result
     */
    public function changePassword($request)
    {
        $user = User::where('email', $request->email)->where('token_reset_password', $request->token_reset_password)->firstOrFail();
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
     * @return json $result
     */
    public function isExistToken($query, $email, $check_time)
    {
        $user = User::where($query, $email)->where('token_reset_password_at', '>', $check_time)->first();
        return $user;
    }

    /**
     * @param json $token
     * @param string $email //email user
     * @return json $result
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
     * @return json $result
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
    public function getUsersBlock()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $idUsers = json_decode($user->block);
        $listUserBlock = [];
        if ($idUsers != null) {
            foreach ($idUsers as $id_user) {
                $user = User::find($id_user);
                $listUserBlock[] = $user;
            }
        }
        return $listUserBlock;
    }

    /**
     * @param int $blog // id of user
     * @return json $result
     */
    public function addUserBlock($block)
    {
        DB::beginTransaction();
        try {
            $id = Auth::user()->id;
            $user = User::find($id);
            $idUsers = json_decode($user->block);
            if ($idUsers != null && in_array((int)$block, $idUsers)) {
                return $this->responseError(Lang::USER_ALREADY_EXIST, Response::HTTP_NOT_FOUND);
            }
            $idUsers[] = (int)$block;
            $user->block = json_encode($idUsers);
            $user->save();
            $checkFriend = Friend::where(['to_id' => $id, 'from_id' => $block, 'status' => 1])->orWhere(function ($q) use ($block, $id) {
                $q->where(['to_id' => $block, 'from_id' => $id, 'status' => 1]);
            })->first();
            if ($checkFriend) {
                $checkFriend->delete();
            }
            \DB::commit();
        } catch (Throwable $e) {
            \DB::rollback();
            return $this->responseError(Lang::ADD_USER_BLOCK_ERR, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param int $blog // id of post
     * @return json $result
     */
    public function removeUserBlock($block)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $idUsers = json_decode($user->block);
        if ($idUsers == null) {
            return $this->responseError(Lang::LIST_USER_BLOCK, Response::HTTP_NOT_FOUND);
        }
        if (!in_array((int)$block, $idUsers)) {
            return $this->responseError(Lang::USER_NOT_IN_THE_LIST, Response::HTTP_NOT_FOUND);
        }
        $key = array_search($block, $idUsers);
        unset($idUsers[$key]);
        $idUsers = array_values($idUsers);
        $user->block = json_encode($idUsers);
        $user->save();
    }

    /**
     * @param int $name // name after change
     * @param int $password // password after change
     * @return json $result
     */
    public function changeInfo($request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->newPassword);
//        if ($user->avatar) {
//            $file_path = $user->avatar;
//            unlink(storage_path('app/public/' . $file_path));
//        }
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            //check extension image
            $ext = $file->getClientOriginalExtension();
            $extend = [
                'png', 'jpg', 'jpeg', 'PNG', 'JPG'
            ];
            if (!in_array($ext, $extend)) {
                return $this->responseError(Lang::FILE_UPLOAD_NOT_IMAGE, Response::HTTP_NOT_FOUND);
            }

            $name = "/avatars/" . time() . Str::random(Constants::RANDOM_NAME_FILE) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($name, file_get_contents($file->getRealPath()));
            $user->avatar = $name;
        }
        $user->save();
    }

    /**
     * @param string $request // name of user
     * @return json $result
     */
    public function search($request)
    {
        $userId = Auth::user()->id;
        $idUserBlocks = User::findOrFail(Auth::user()->id)->block;
        $idUserBlocks = json_decode($idUserBlocks) ?? [];
        $users = User::with(['userFrom' => function ($q) use ($userId) {
            $q->where('to_id', $userId);
        },
            'userTo' => function ($q) use ($userId) {
                $q->where('from_id', $userId);
            }])
            ->where('id', '<>', $userId)
            ->whereNotIn('id', $idUserBlocks)
            ->where(function ($query) use ($request) {
                $query->where('phone', $request->q)->orWhere('name', 'like', '%' . $request->q . '%')->orWhere('email', $request->q);
            })
            ->paginate(Constants::PAGINATE_SEARCH_USER);
        return $users;
    }

    /**
     * @param int $id // $id friend
     * @return Status
     */
    public function profileFriend($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }
}
