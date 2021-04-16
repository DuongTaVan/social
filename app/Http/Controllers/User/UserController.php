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

    public function listUserBlock()
    {
        return $this->userRepository->listUserBlock();
    }

    public function addUserBlock(Request $request)
    {
        return $this->userRepository->addUserBlock($request->block);
    }

    public function removeUserBlock(Request $request)
    {
        return $this->userRepository->removeUserBlock($request->block);
    }

    public function changeInfo(Request $request)
    {
        return $this->userRepository->changeInfo($request->name, $request->password);
    }

}
