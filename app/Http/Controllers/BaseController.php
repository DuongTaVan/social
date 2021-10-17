<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    public function responseSuccess($data, $code)
    {
        return response()->json(
            $data, $code);
    }

    public function responseError($err, $code)
    {
        return response()->json([
            'error' => $err
        ], $code);
    }
}
