<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

    public function login() {
        return view('components.login');
    }

    public function processLogin(LoginRequest $request) {
            $credentials = $request->except(('_token'));

            if (Auth::attempt($credentials)) {
                return redirect()->route('/');
            } else {
                abort(401);
            }

        return redirect()->route('/');
    }

    public function register() {
        return view('components.register');
    }

    public function processRegister(RegisterRequest $request) {
        $user = new User($request->all());

        $user->password = bcrypt($request->password);

        $user->role = "user";

        $user->save();

        return redirect()->route('/');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('/');
    }
}
