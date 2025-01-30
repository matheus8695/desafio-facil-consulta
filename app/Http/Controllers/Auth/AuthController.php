<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::factory()->getTTL() * 60,
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->logout(true);

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me(): JsonResponse
    {
        return response()->json(Auth::user());
    }
}
