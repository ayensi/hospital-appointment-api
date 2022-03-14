<?php

namespace App\Http\Api\Repositories;

use App\Http\Api\Contracts\IUserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRepository
{
    public function login(Request $request)
    {

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'message' => 'Logged in',
        ]);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required','unique:users'],
            'social_security_number' => ['required','unique:users'],
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
            ], 400);
        } else {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'social_security_number' => $request['social_security_number'],
                'password' => Hash::make($request['password']),
            ]);


            return response()->json([
                'message' => 'Registered',
            ]);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out.',
        ]);
    }
}
