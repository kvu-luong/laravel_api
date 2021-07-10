<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $this->validateLogin($request);
        $email = $request['email'];
        $password = $request['password'];
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $user = Auth::guard()->user();
            $user->generateToken();

            return response()->json(['data' => $user->toArray(),]);
        }
    }

    protected function validateLogin($request) {
         $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
        ]);
    }

    public function logout(Request $request) {
        $user = Auth::guard('api')->user();
        if($user) {
            $user->api_token = null;
            $user->save();
        }
        return response()->json(['data' => 'USER_LOGGED_OUT'], 200);
    }

}
