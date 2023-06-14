<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route("home");
        } else {
            return view("front.login");
        }

    }

    public function login(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        $remember = $request->remember;
        !is_null($remember) ? $rememberme = true : $remember = false;
        $user = User::where("username", $username)->first();
        if ($username && Hash::check($password, $user->password)) {
            Auth::login($user, $remember);
            return redirect()->route("home");
        } else {
            return redirect()
                ->route("login")
                ->withErrors([
                    "password" => "bilgilerinizi kontrol edin!"
                ])
                ->onlyInput("username");
        }

        dd($request->all());
    }
}
