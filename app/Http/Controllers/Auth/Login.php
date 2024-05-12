<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::query()->where('std_email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Wrong password',
            ], 401);
        }

        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user' => $user,
        ]);
    }
}
