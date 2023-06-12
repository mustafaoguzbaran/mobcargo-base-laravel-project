<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function index()
    {
        $usersList = User::all();
        return view("admin.users", compact('usersList'));
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route("login");
        }
    }

    public function userEditShow()
    {
        return view("front.useredit");
    }

    public function userEditBackofficeShow(Request $request)
    {
        $userData = User::where("id", $request->id)->get();
        return view("admin.useredit", compact('userData'));
    }

    public function userEditUpdateFront(Request $request)
    {
        $userDataUpdateFront = array_filter([
            "name" => $request->name_edit,
            "username" => $request->username_edit,
            "email" => $request->email_edit,
            "phone_number" => $request->phone_number_edit,
        ]);
        if ($request->password_edit != null) {
            $userDataUpdateFront['password'] = Hash::make($request->password_edit);
        }
        User::where("id", auth()->user()->id)
            ->update($userDataUpdateFront);
        return redirect()->route("useredit");
    }
    public function userEditUpdateBackoffice(Request $request) {
        $userDataUpdateBackoffice = array_filter([
           "name" => $request->name_edit,
           "username" => $request->username_edit,
           "email" => $request->email_edit,
           "phone_number" => $request->phone_number_edit
        ]);
        if($request->password_edit != null) {
            $userDataUpdateBackoffice["password"] = Hash::make($request->password_edit);
            User::where("id", $request->id)
                ->update($userDataUpdateBackoffice);
            return redirect()->route("useredit.backoffice");
        }
    }
}
