<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function tokenRequest(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('token')->accessToken;
            return response()->json([
                "status" => 'success',
                "message" => 'token başarıyla verildi!',
                "data" => $success
            ]);
        }
        return response()->json([
            "status" => 'error',
            "message" => "yetkisiz giriş",
        ], 401);
    }
}
