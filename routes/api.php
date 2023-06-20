<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->middleware('auth:api')->group(function () {

    Route::post("tokenrequest", [\App\Http\Controllers\Api\V1\TokenController::class, 'tokenRequest']);

    Route::get('/users', [\App\Http\Controllers\Api\V1\UserController::class, "getAllUsers"]);

    Route::get('/user/{id}', [\App\Http\Controllers\Api\V1\UserController::class, "getUser"]);

    Route::delete('/user/{id}/delete', [\App\Http\Controllers\Api\V1\UserController::class, "destroy"]);

    Route::post('/user/add', [\App\Http\Controllers\Api\V1\UserController::class, "store"]);

    Route::patch('/user/{id}/update', [\App\Http\Controllers\Api\V1\UserController::class, "update"]);
});
