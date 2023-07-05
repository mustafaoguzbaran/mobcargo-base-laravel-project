<?php

use App\Http\Controllers\BackofficeHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [UserController::class, "login"])->name("login.index");

Route::post('/login', [UserController::class, "loginCheck"])->name("login");

Route::get('/register', [UserController::class, "register"])->name("register.index");

Route::post('/register', [UserController::class, "store"])->name("register.store");

Route::post('/logout', [UserController::class, "logout"])->name("logout");

Route::get('/checkcargo', [HomeController::class, "checkCargo"])->name("checkCargo");

Route::post('/checkcargo', [HomeController::class, "checkCargo"]);

Route::get('user/{id}/edit', [UserController::class, "edit"])->name("user.edit");

Route::patch('/user/{id}', [UserController::class, "update"])->name('user.update');

Route::get('/search', [HomeController::class, "search"])->name("search");


Route::prefix("/backoffice")->middleware("role:Admin")->group(function () {

    Route::get('/', [HomeController::class, "index"])->name("backoffice");

    Route::get('/cargos', [CargoController::class, "index"])->name("cargos.index");

    Route::post('/cargos', [CargoController::class, "store"])->name("cargos.store");

    Route::delete('/cargos/{id}', [CargoController::class, "destroy"])->name("cargos.destroy");

    Route::get('cargos/{id}/edit', [CargoController::class, 'edit'])->name("cargos.edit");

    Route::patch('/cargos/{id}', [CargoController::class, 'update'])->name("cargos.update");

    Route::get('/users', [UserController::class, "index"])->name("backoffice.users");

    Route::get('/users/{id}/edit', [UserController::class, "edit"])->name("backoffice.user.edit");

    Route::patch('/users/{id}', [UserController::class, "update"])->name('backoffice.user.update');

    Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name("backoffice.logs");

    Route::get('/userlogs', [HomeController::class, "index"])->name("backoffice.userlogs");

    Route::get('/settings', [SettingController::class, "index"])->name("backoffice.settings");

    Route::patch('/settings', [SettingController::class, "update"])->name("backoffice.settings");

});





