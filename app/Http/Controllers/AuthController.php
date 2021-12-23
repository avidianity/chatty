<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        /**
         * @var \App\Models\User
         */
        $user = User::where('email', $data['username'])
            ->orWhere('username', $data['username'])
            ->first();

        if (!$user) {
            return response([
                'message' => __('auth.failed'),
            ], 404);
        }

        if (!Hash::check($data['password'], $user->password)) {
            return response([
                'message' => __('auth.password')
            ], 401);
        }

        $token = $user->createToken(Str::random(10));

        return [
            'token' => $token->plainTextToken,
            'user' => $user,
        ];
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        event(new Registered($user));

        return $user;
    }

    public function check(Request $request)
    {
        return $request->user();
    }
}
