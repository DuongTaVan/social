<?php

namespace App\Http\Controllers;

use App\Enums\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\SendResetPasswordRequest;
use App\Repositories\User\UserRepository;

class PasswordResetRequestController extends BaseController
{

    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function sendPasswordResetEmail(SendResetPasswordRequest $request): object
    {
        // If email does not exist
        $email = $request->email ?? "";
        User::where('email', $email)->firstOrFail();
        $isExistToken = $this->userRepository->isExistToken('email', $email, Carbon::now()->subMinute(Constants::TIME_SEND_RESET_PASSWORD));
        if ($isExistToken) {
            $err = 'change password every 5 minutes';
            return $this->responseError($err, Response::HTTP_NOT_FOUND);
        }
        // If email exists
        $this->sendMail($email);
        $data = 'Check your inbox, we have sent a link to reset email.';
        return $this->responseSuccess($data, Response::HTTP_OK);

    }


    public function sendMail($email)
    {

        $token = $this->generateToken($email);
        Mail::to($email)->send(new SendMail($token));
    }

    public function generateToken($email): string
    {

        $checkToken = false;
        while (!$checkToken) {
            $token = Str::random(80);
            $user = $this->userRepository->checkToken($token);
            if (!$user) {
                $checkToken = true;
            }
        }
        $this->storeToken($token, $email);
        return $token;
    }

    public function storeToken($token, $email)
    {
        $user = $this->userRepository->storeToken($token, $email);
    }

    public function checkTokenResetPasswordAt($token)
    {
        $isExistToken = $this->userRepository->isExistToken('token_reset_password', $token, Carbon::now()->subMinute(Constants::TIME_RESET_PASSWORD));
        if (!$isExistToken) {
            $err = 'password change over time';
            return $this->responseError($err, Response::HTTP_NOT_FOUND);
        }
        $data = $isExistToken->email;
        return $this->responseSuccess($data, Response::HTTP_OK);

    }

    public function changePassword(Request $request)
    {
        $this->userRepository->changePassword($request->email);
        return $this->responseSuccess('change password success !', Response::HTTP_OK);
    }
}
