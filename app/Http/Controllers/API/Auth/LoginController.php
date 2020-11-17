<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\Controller;
use Illuminate\Http\Request;
use App\Log;
use Illuminate\Support\Facades\Validator;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['login', 'password']);

        return (!$token = auth()->attempt($creds)) ?
            response()->json(['error' => true, 'message' => "Incorrect Login, Password"], 401) :
            response()->json(['token' => $token]);
    }


    public function register(Request $request)
    {
        $rules = [
            'login' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];

        $creds = $request->only('login', 'password');
        $validator = Validator::make($creds, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 203);
        }

        $user = User::create(['login' => $request->login, 'password' => bcrypt($request->password)]);

        return (!$user) ? response()->json(['error' => true]) :  response()->json(['token' => auth()->attempt($creds)]);
    }


    public function refresh() {
        try {
            $token = auth()->refresh();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 401);
        }
        return response()->json(['token' => $token]);
    }
}

