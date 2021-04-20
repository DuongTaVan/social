<?php

namespace App\Repositories\Friend;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Friend;
use App\Http\Controllers\BaseController;
use App\Http\Resources\PostResource;
use App\Http\Resources\FriendResource;
use App\Enums\Constants;
use App\Enums\Lang;
use Symfony\Component\HttpFoundation\Response;

class FriendRepository extends BaseController implements IFriendRepository
{
    /**
     * @return json $result
     */
    public function getListFriends()
    {
        $friends = User::where('id', Auth::user()->id)->with(['userTo' => function ($query) {
            $query->where('status', Constants::STATUS_FRIEND);
        }, 'userFrom' => function ($query) {
            $query->where('status', Constants::STATUS_FRIEND);
        }])->get();

        return $friends;
    }

    /**
     * @return json $result
     */
    public function requestFriend()
    {
        $listUserRequests = User::where('id', Auth::user()->id)->with('userTo', function ($query) {
            $query->where('status', Constants::STATUS_REQUEST_FRIEND);
        })->get();
        return $listUserRequests;
    }

    /**
     * @param int $id //id user friend
     * @param int|string $request //data
     * @return json $result
     */
    public function sendRequestFriend($request, $id)
    {
        $idUser = Auth::user()->id;
        $checkRequestFriend = Friend::where('from_id', $idUser)->where('to_id', $id)->orWhere(function ($query) use ($id, $idUser) {
            $query->where('from_id', $id)
                ->where('to_id', $idUser);
        })->get();
        if (count($checkRequestFriend) != 0) {
            return $this->responseError(Lang::SENT_FRIEND_REQUEST, Response::HTTP_NOT_FOUND);
        }
        $friend = new Friend;
        $friend->from_id = Auth::user()->id;
        $friend->to_id = $id;
        $friend->save();
    }

    /**
     * @param int $id //id user friend
     * @return json $result
     */
    public function removeFriend($id)
    {
        $checkExistFriend = $this->checkExistFriend($id, Constants::STATUS_FRIEND);
        $checkExistFriend->delete();
    }

    /**
     * @param int $id //id user friend
     * @return json $result
     */
    public function acceptFriend($id)
    {
        $checkExistFriend = $this->checkExistFriend($id, Constants::STATUS_REQUEST_FRIEND);
        $checkExistFriend->status = Constants::STATUS_FRIEND;
        $checkExistFriend->save();
    }

    /**
     * @param int $id //id user friend
     * @return json $result
     */
    public function removeRequestFriend($id)
    {
        $checkExistFriend = $this->checkExistFriend($id, Constants::STATUS_REQUEST_FRIEND);
        $checkExistFriend->delete();
    }

    /**
     * @param int $id //id user friend
     * @param int $status //status relationship friend
     * @return json $result
     */
    public function checkExistFriend($id, $status)
    {

        $idUser = Auth::user()->id;
        $checkExistFriend = Friend::where('from_id', $idUser)->where('to_id', $id)->where('status', $status)->orWhere(function ($query) use ($id, $idUser, $status) {
            $query->where('from_id', $id)
                ->where('to_id', $idUser)
                ->where('status', $status);
        })->firstOrFail();
        return $checkExistFriend;
    }
}
