<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckCargoRequest;
use App\Models\Cargo;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $systemInfos = Settings::all();
        return view("front.index", compact("systemInfos"));
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route("home");
        } else {
            return view("front.login");
        }
    }

    public function register()
    {
        return view("front.register");
    }

    public function checkCargo(CheckCargoRequest $request)
    {

        $checkCargo = Cargo::where("id", "=", $request->checkCargo)->get();
        if (empty($checkCargo[0])) {
            return redirect()->route("home");
        } else {
            return view("front.checkCargo", compact("checkCargo"));
        }
    }

    public function search(Request $request)
    {

        $searchResult = User::query()->where("username", "LIKE", "{$request->search}%")
            ->orWhere("email", "LIKE", "{$request->search}%")
            ->orWhere("phone_number", "LIKE", "{$request->search}%")
            ->get();
        return view("front.searchresult", compact("searchResult"));
    }


}
