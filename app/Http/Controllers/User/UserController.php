<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Enums\Lang;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\User\UserRepository;

class UserController extends BaseController
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getListUsersBlock()
    {
        $users = $this->userRepository->getListUserBlock();
        return UserResource::collection($users);
    }

    public function addUserBlock(Request $request)
    {
        $this->userRepository->addUserBlock($request->block);
        return $this->responseSuccess(Lang::ADD_SUCCESS, Response::HTTP_OK);
    }

    public function removeUserBlock(Request $request)
    {
        $this->userRepository->removeUserBlock($request->block);
        return $this->responseSuccess(Lang::REMOVE_SUCCESS, Response::HTTP_OK);
    }

    public function changeInfo(Request $request)
    {
        $this->userRepository->changeInfo($request->name, $request->password);
        return $this->responseSuccess(Lang::CHANGE_INFOR_SUCCESS, Response::HTTP_OK);
    }

    public function searchUser(Request $request)
    {
        $users = $this->userRepository->searchUser($request);
        return UserResource::collection($users);
    }
}
