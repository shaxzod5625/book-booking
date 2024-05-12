<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $merge = (array)['password' => Hash::make($request->password)];

        $ifUserExist = User::query()->where('std_email', $request->email)->first();
        if ($ifUserExist) {
            return response()->json(['message' => 'User already exists'], 403);
        }

        $user = User::query()->create(array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'std_email' => $request->email,
            'password' => $request->password,
            'std_id' => $request->std_id,
            'department' => $request->department,
            'book_limit' => 3,
        ));

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 201);
    }
}
