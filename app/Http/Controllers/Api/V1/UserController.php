<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
