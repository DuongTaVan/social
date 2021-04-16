<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
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
        return $users;
    }

    public function addUserBlock(Request $request)
    {
        $userBlock = $this->userRepository->addUserBlock($request->block);
        return $userBlock;
    }

    public function removeUserBlock(Request $request)
    {
        $userBlock = $this->userRepository->removeUserBlock($request->block);
        return $userBlock;
    }

    public function changeInfo(Request $request)
    {
        $inFo = $this->userRepository->changeInfo($request->name, $request->password);
        return $inFo;
    }

    public function searchUser(Request $request)
    {
        $user = $this->userRepository->searchUser($request);
        return $user;
    }
}
