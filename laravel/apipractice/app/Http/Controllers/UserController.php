<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{    
    public function login(UserLoginRequest $request) 
    {
        $credentials = $request->only('login','password');
        
        if(Auth::attempt($credentials)) 
        {
            $user = Auth::user();

            return response()->json([
                'data' => [
                    'token' => $user->generateToken(),
                    'full_name' => $user->full_name
                ]
            ], 200);
        }
        
        return response()->json([
            'error' => [
                'code' => 401,
                'message' => 'Unauthorized',
                'errors' => [
                    'login' => 'invalid credentials'
                ]
            ]
        ], 401);

    }
}
