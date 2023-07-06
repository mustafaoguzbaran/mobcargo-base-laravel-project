<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function getAllUsers()
    {
        if (Auth::user()->hasRole('API Manager')) {
            $getUsersAll = User::all();
            return response()->json([
                "status" => 'success',
                "message" => 'tüm kullanıcılar başarıyla getirildi.',
                "data" => $getUsersAll
            ], 200);
        } else {
            return response()->json([
                "status" => 'error',
                "message" => "yetkisiz giriş"
            ], 401);
        }
    }

    public function getUser(Request $request)
    {
        if (Auth::user()->hasRole('API Manager')) {
            $getUser = User::find($request->id);
            return response()->json([
                "status" => 'success',
                "message" => 'kullanıcı başarıyla çekildi',
                "data" => $getUser
            ]);
        } else {
            return response()->json([
                "status" => 'error',
                "message" => 'yetkisiz işlem'
            ], 401);
        }
    }

    public function destroy(Request $request)
    {
        if (Auth::user()->hasRole('API Manager')) {
            $deleteUser = User::findOrFail($request->id);
            $deleteUser->delete();
            return response()->json([
                "status" => "success",
                "message" => $request->id . "id'li kullanıcı başarıyla silindi",
            ], 200);
        } else {
            return response()->json([
                "status" => 'error',
                "message" => 'yetkisiz erişim'
            ], 401);
        }
    }

    public function store(RegisterRequest $request)
    {
        $userDataAddList = [
            "name" => $request->name_register,
            "username" => $request->username_register,
            "email" => $request->email_register,
            "phone_number" => $request->phone_register,
            "password" => $request->password_register
        ];
        if (Auth::user()->hasRole('API Manager')) {
            $user = User::create($userDataAddList);
            $user->syncRoles(Role::find(4));
            return response()->json([
                "status" => "success",
                "message" => "kullanıcı başarıyla oluşturuldu",
                "data" => $userDataAddList
            ], 200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "yetkisiz erişim",
            ], 401);
        }
    }

    public function update(Request $request)
    {
        if (Auth::user()->hasRole('API Manager')) {
            $userUpdateDataList = $request->only(["name", "username", "email", "phone_number", "password"]);
            User::find($request->id)->update($userUpdateDataList);
            return response()->json([
                "status" => 'success',
                "message" => 'kullanıcı verileri başarıyla güncellendi',
                "data" => $userUpdateDataList
            ], 200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "yetkisiz erişim",
            ], 401);
        }
    }
}
