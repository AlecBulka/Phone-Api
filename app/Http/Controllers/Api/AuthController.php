<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request) {
        $request->validated($request->all());

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Credentials do not Match'
            ], 401);
        }

        $user = User::Where('email', $request->email)->first();

        return response()->json([
            'status' => 'Success',
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
        ]);
    }

    public function register(StoreUserRequest $request) {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => 'Success',
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
        ]);
    }

    public function logout() {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'User Logged Out Successfully'
        ]);
    }
}
