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


class PasswordResetRequestController extends Controller
{
    public function sendPasswordResetEmail(SendResetPasswordRequest $request) : object
    {
        // If email does not exist
        $email = $request->email ?? "";
        if (!$this->validEmail($email)) {
            return response()->json([
                'message' => 'Email does not exist.'
            ], Response::HTTP_NOT_FOUND);
        } else {
            $isOtherToken = DB::table('users')->where('email', $email)->where('token_reset_password_at', '>', Carbon::now()->subMinute(Constants::TIME_SEND_RESET_PASSWORD))->first();
            if ($isOtherToken ) {
                return response()->json([
                    'message' => 'change password every 5 minutes'
                ], Response::HTTP_NOT_FOUND);
            }
            // If email exists
            $this->sendMail($email);
            return response()->json([
                'message' => 'Check your inbox, we have sent a link to reset email.',
            ], Response::HTTP_OK);
        }
    }


    public function sendMail($email)
    {
        $token = $this->generateToken($email);
        Mail::to($email)->send(new SendMail($token));
    }

    public function validEmail($email)
    {
        return !!User::where('email', $email)->first();
    }

    public function generateToken($email) : string
    {
        $token = Str::random(80);
        $checkToken = false;
        while (!$checkToken) {
            $user = User::where("token_reset_password", $token)->first();
            if (!$user) {
                $checkToken = true;
            } else {
                $token = Str::random(80);
            }
        }
        $this->storeToken($token, $email);
        return $token;
    }

    public function storeToken($token, $email)
    {
        $user = User::where('email', $email)->first();
        $user->token_reset_password = $token;
        $user->token_reset_password_at = Carbon::now();
        $user->save();
        //dd($user);
    }

    public function checkTokenResetPasswordAt($token)
    {
        //dd(Carbon::now()->subMinute(Constants::TIME_RESET_PASSWORD));
        $isOtherToken = DB::table('users')->where('token_reset_password', $token)->where('token_reset_password_at', '>', Carbon::now()->subMinute(Constants::TIME_RESET_PASSWORD))->first();
        //dd($isOtherToken);
        if (!$isOtherToken) {
            return response()->json([
                'message' => 'password change over time'
            ], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'message' => $isOtherToken->email
        ], Response::HTTP_OK);
    }

    public function changePassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->token_reset_password = NULL;
        $user->token_reset_password_at = NULL;
        $user->save();
        //dd($user);
        return response()->json([
            'message' => 'change password success !'
        ], Response::HTTP_OK);
    }
}
