<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $request->validate([
           'name' => 'required|string',
           'email' => 'required|string|email|unique:users',
           'password' => 'required|string|confirmed',
           'password_confirmation' => 'string',
        ]);// all field are required.

        event(new Registered($user = $this->create($request->all())));

        Auth::guard()->login($user);
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user) {
        $user->generateToken();
        return response()->json(['data' => $user->toArray()], 201);
    }

    protected function create($data) {
         return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
         ]);
    }
}
