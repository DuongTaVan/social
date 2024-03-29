<?php

namespace App\Http\Controllers;

use App\Enums\Constants;
use App\Enums\Lang;
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

    /**
     * @param float $SendResetPasswordRequest //validate
     * @param float $token
     * @param float $email
     * @return json $result
     */
    public function sendPasswordResetEmail(SendResetPasswordRequest $request): object
    {
        // If email does not exist
        $email = $request->email ?? "";
        User::where('email', $email)->firstOrFail();
        $isExistToken = $this->userRepository->isExistToken('email', $email, Carbon::now()->subMinute(Constants::TIME_SEND_RESET_PASSWORD));
        if ($isExistToken) {
            return $this->responseError(Lang::CHECK_PASSWORD_5_MINUTES, Response::HTTP_NOT_FOUND);
        }
        // If email exists
        $this->sendMail($email);
        return $this->responseSuccess(Lang::CHECK_INBOX_MESSAGE, Response::HTTP_OK);

    }

    /**
     * @param float $email
     * @return json $result
     */

    public function sendMail($email)
    {

        $token = $this->generateToken($email);
        Mail::to($email)->send(new SendMail($token));
    }

    /**
     * @param float $email
     * @return json $result
     */
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

    /**
     * @param float $token
     * @param float $email
     * @return json $result
     */
    public function storeToken($token, $email)
    {
        $user = $this->userRepository->storeToken($token, $email);
    }

    /**
     * @param float $token
     * @return json $result
     */
    public function checkTokenResetPasswordAt($token)
    {
        $isExistToken = $this->userRepository->isExistToken('token_reset_password', $token, Carbon::now()->subMinute(Constants::TIME_RESET_PASSWORD));
        if (!$isExistToken) {
            return $this->responseError(Lang::CHECK_PASSWORD_OVER_TIME, Response::HTTP_OK);
        }
        $data = $isExistToken->email;
        return $this->responseSuccess($data, Response::HTTP_OK);
    }

    /**
     * @param int|float $request //data
     * @return json $result
     */
    public function changePassword(Request $request)
    {
        $this->userRepository->changePassword($request);
        return $this->responseSuccess(Lang::MESSAGE_SUCCESS, Response::HTTP_OK);
    }
}
