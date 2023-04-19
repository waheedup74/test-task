<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid login credentials.',
            ], 401);
        }

        $user = $request->user();

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Successfully logged in.',
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
       $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out.',
        ], 200);
    }
}
