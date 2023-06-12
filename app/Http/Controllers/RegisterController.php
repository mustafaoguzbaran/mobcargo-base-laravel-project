<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function registerShowForm()
    {
        if (Auth::check()) {
            return redirect()->route("home");
        } else {
            return view("front.register");
        }
    }

    public function store(RegisterRequest $request)
    {
        $data = [
            "name" => $request->name_register,
            "username" => $request->username_register,
            "email" => $request->email_register,
            "phone_number" => $request->phone_register,
            "password" => $request->password_register,
            "auth" => "kullanıcı"
        ];
        User::create($data);
        return redirect()->route("home");
    }
}
