<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route("home");
        } else {
            return view("front.login");
        }

    }

    public function loginCheck(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        $remember = $request->remember;
        !is_null($remember) ? $remember = true : $remember = false;
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
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect()->route("home");
        } else {
            return view("front.register");
        }
    }

    public function store(RegisterRequest $request)
    {

        $userDataAddList = [
            "name" => $request->name_register,
            "username" => $request->username_register,
            "email" => $request->email_register,
            "phone_number" => $request->phone_register,
            "password" => $request->password_register,
        ];
        $user = User::create($userDataAddList);
        $user->syncRoles(Role::find(4));
        return redirect()->route("home");
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

    public function edit(Request $request)
    {
        if (Route::is("user.edit")) {
            return view("front.useredit");
        } elseif (Route::is("backoffice.user.edit")) {
            $getUserData = User::where("id", $request->id)->get();
            $getRoleData = Role::all();
            return view("admin.useredit", compact('getUserData', 'getRoleData'));
        }
    }

    public function update(Request $request)
    {
        $userDataUpdateList = array_filter([
            "name" => $request->name_edit,
            "username" => $request->username_edit,
            "email" => $request->email_edit,
            "phone_number" => $request->phone_edit,
        ]);
        if ($request->password_edit != null) {
            $userDataUpdateList['password'] = Hash::make($request->password_edit);
        }
        User::find($request->id)
            ->update($userDataUpdateList);
        if (Auth::user()->hasRole("Admin") && $request->role !== null) {
            $user = User::find($request->id);
            $user->syncRoles($request->role);
        }
        if (Route::is("backoffice.user.update")) {
            return redirect()->route("backoffice.user.edit", ["id" => $request->id]);
        } elseif (Route::is("user.update")) {
            return redirect()->route("user.edit", ["id" => $request->id]);
        }
    }

    public function index(Request $request)
    {
        if ($request->searchUserBackoffice == null) {
            $getUsersList = User::all();
            return view("admin.users", compact('getUsersList'));
        } else {
            $getUsersList = User::query()->where("username", "LIKE", "{$request->searchUserBackoffice}%")
                ->orWhere("email", "LIKE", "{$request->searchUserBackoffice}%")
                ->orWhere("phone_number", "LIKE", $request->searchUserBackoffice)
                ->get();
            return view("admin.users", compact("getUsersList"));
        }
    }

}
