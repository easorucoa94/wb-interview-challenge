<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class ApiAuthController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|string|max:100',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $user = User::where('user_name', $request->user_name)->first();
        if ($user) {
            if ($user->status != 'active') {
                $response = ['message' => 'User is inactive'];
                return response($response, 422);
            }
            if ($request->password === $user->password) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ['message' => 'Password mismatch'];
                return response($response, 422);
            }
        } else {
            $response = ['message' => 'User does not exist'];
            return response($response, 422);
        }
    }
}
