<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'string'],
                'password' => ['required', 'string'],
            ]
        );
        if ($credentials->fails()) {
            return 'validation error';
        }

        if (!FacadesAuth::attempt($request->only(['email', 'password']))) {
            return 'Email & Password does not match';
        } else {
            if (auth('sanctum')->check()) {
                $request->user()->tokens()->delete();
            }
            $user = User::where('email', $request->input('email'))->first();
            $myuser = $request->user();
            $token = $user->createToken('admin')->plainTextToken;
            $myuser->remember_token = $token;
            $myuser->save();

            return $token;
        }
    }

    public function logoutPasien(Request $request)
    {
        $user = $request->user()->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Logout Succesfully',
            'data' => $user,
            'token' => null,
        ]);
    }
}
