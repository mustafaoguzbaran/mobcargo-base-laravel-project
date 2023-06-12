<?php

use App\Http\Controllers\BackofficeHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CargoOperationsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"])->name("home");

Route::get('/login', [LoginController::class, "showLoginForm"])->name("login");

Route::post('/login', [LoginController::class, "login"])->name("login");

Route::post('/logout', [UsersController::class, "logout"])->name("logout");

Route::get('register', [RegisterController::class, "registerShowForm"])->name("register");

Route::post('register', [RegisterController::class, "store"])->name("register.store");

Route::get('/checkcargo', [HomeController::class, "checkCargo"])->name("checkCargo");

Route::post('/checkcargo', [HomeController::class, "checkCargo"]);

Route::get('/useredit', [UsersController::class, "userEditShow"])->name("useredit");

Route::patch('/useredit', [UsersController::class, "userEditUpdateFront"])->name('front.useredit');

Route::prefix("/backoffice")->group(function () {

    Route::get('/', [BackofficeHomeController::class, "index"])->name("backoffice");

    Route::get('/cargooperations', [CargoOperationsController::class, "index"])->name("backoffice.cargooperations.show");

    Route::post('/cargooperations', [CargoOperationsController::class, "store"])->name("backoffice.cargooperations.store");

    Route::delete('/cargooperations/{id}', [CargoOperationsController::class, "destroy"])->name("backoffice.cargooperations.destroy");

    Route::get('cargoedit/{id}', [CargoOperationsController::class, 'cargoEditShow'])->name("cargoedit");

    Route::patch('cargoedit/{id}', [CargoOperationsController::class, 'cargoEditPut']);

    Route::get('/users', [UsersController::class, "index"])->name("backoffice.users");

    Route::patch('/users/{id}', [UsersController::class, "userEditUpdateBackoffice"])->name('backoffice.useredit');

    Route::get('/users/{id}', [UsersController::class, "userEditBackofficeShow"])->name("backoffice.useredit");
});






