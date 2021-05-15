<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Enums\Lang;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\User\UserRepository;

class UserController extends BaseController
{
    /**
     * @var userRepository
     */
    public $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return json // list user block
     */
    public function getUsersBlock()
    {
        $users = $this->userRepository->getUsersBlock();
        return UserResource::collection($users);
    }

    /**
     * @param int|string $request //get data
     * @return json //message
     */
    public function addUserBlock(Request $request)
    {
        $user = $this->userRepository->addUserBlock($request->block);
        return $user;
    }

    /**
     * @param int|string $request //get data
     * @return json //message
     */
    public function removeUserBlock(Request $request)
    {
        $this->userRepository->removeUserBlock($request->block);
        return $this->responseSuccess(Lang::REMOVE_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int|string $request //get data
     * @return json //message
     */
    public function changeInfo(Request $request)
    {
        $this->userRepository->changeInfo($request);
        return $this->responseSuccess(Lang::CHANGE_INFOR_SUCCESS, Response::HTTP_OK);
    }

    /**
     * @param int|string $request //get data
     * @return json //list user search
     */
    public function search(Request $request)
    {
        $users = $this->userRepository->search($request);
        return UserResource::collection($users);
    }

    /**
     * @param int $id //id user
     * @return json //detail user
     */
    public function profileFriend($id)
    {
        $user = $this->userRepository->profileFriend($id);
        return new UserResource($user);
    }

    /**
     * @return json //list user follower
     */
    public function getFollowers()
    {
        $user = $this->userRepository->getFollowers();
        return new UserResource($user);
    }

    /**
     * @return json //list user following
     */
    public function getListFollowing()
    {
        $user = $this->userRepository->getListFollowing();
        return new UserResource($user);
    }
}
