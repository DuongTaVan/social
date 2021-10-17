<?php

namespace App\Repositories\Friend;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Message;
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
    public function getFriends()
    {
        $friends = User::where('id', Auth::user()->id)->with(['userTo' => function ($query) {
            $query->where('status', Constants::STATUS_FRIEND)->with('userFrom');
        }, 'userFrom' => function ($query) {
            $query->where('status', Constants::STATUS_FRIEND)->with('userTo');
        }])->get();
        $arrUser = [];
        foreach ($friends as $friend) {
            if (isset($friend->userTo)) {
                foreach ($friend->userTo as $friend1) {
                    $arrUser[] = $friend1->userFrom->toArray();
                }
            }
            if (isset($friend->userFrom)) {
                foreach ($friend->userFrom as $friend2) {
                    $arrUser[] = $friend2->userTo->toArray();
                }
            }
        }
        return $arrUser;
    }

    public function getFriendsChat()
    {
        $messages = Message::with('userTo', 'userFrom')->where('from_id', Auth::user()->id)->orWhere('to_id', Auth::user()->id)->orderByDesc('id')->get();
        $arrUser = [];
        foreach ($messages as $message) {
            $dataUser = $message->userTo->id !== Auth::user()->id ? $message->userTo : $message->userFrom;
            if (!isset($arrUser[$dataUser->id])) {
                $arrUser[$dataUser->id] = $dataUser->toArray();
            }
        }
        return array_values($arrUser);
    }

    /**
     * @return json $result
     */
    public function request()
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
    public function sendRequest($id)
    {
        $idUser = Auth::user()->id;
        $user = User::find($idUser);
        $idUsersBlock = json_decode($user->block); //list id block of user
        //check user exist in array user blocks
        if (is_array($idUsersBlock) && in_array((int)$id, $idUsersBlock)) {
            return $this->responseError(Lang::USER_WAS_BLOCK, Response::HTTP_NOT_FOUND);
        }
        $requestFriendPending = Friend::where('from_id', $idUser)->where('to_id', $id)->orWhere(function ($query) use ($id, $idUser) {
            $query->where('from_id', $id)
                ->where('to_id', $idUser);
        })->get();
        //check user exist in array request friend pending
        if (count($requestFriendPending) != 0) {
            return $this->responseError(Lang::SENT_FRIEND_REQUEST, Response::HTTP_NOT_FOUND);
        }
        $friend = new Friend;
        $friend->from_id = Auth::user()->id;
        $friend->to_id = $id;
        $friend->save();
        return $this->responseSuccess(Lang::SEND_REQUEST_FRIEND_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int $id //id user friend
     * @return json $result
     */
    public function remove($id)
    {
        $friend = $this->isExistFriend($id, Constants::STATUS_FRIEND);
        $friend->delete();
    }

    /**
     * @param int $id //id user friend
     * @return json $result
     */
    public function accept($id)
    {
        $friend = $this->isExistFriend($id, Constants::STATUS_REQUEST_FRIEND);
        $friend->status = Constants::STATUS_FRIEND;
        $friend->save();
    }

    /**
     * @param int $id //id user friend
     * @return json $result
     */
    public function removeRequest($id)
    {
        $friend = $this->isExistFriend($id, Constants::STATUS_REQUEST_FRIEND);
        $friend->delete();
    }

    /**
     * @param int $id //id user friend
     * @param int $status //status relationship friend
     * @return json $result
     */
    public function isExistFriend($id, $status)
    {
        $idUser = Auth::user()->id;
        $friend = Friend::where('from_id', $idUser)->where('to_id', $id)->where('status', $status)->orWhere(function ($query) use ($id, $idUser, $status) {
            $query->where('from_id', $id)
                ->where('to_id', $idUser)
                ->where('status', $status);
        })->firstOrFail();
        return $friend;
    }
}
