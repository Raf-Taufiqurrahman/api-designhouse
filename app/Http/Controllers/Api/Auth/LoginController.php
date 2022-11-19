<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if(!$token = Auth::guard('api')->attempt($credentials)){
            return response()->json([
                'success' => 'false',
                'message' => 'Invalid Email or Password'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'user' => Auth::guard('api')->user(),
            'token' => $token
        ], 200);
    }
}
