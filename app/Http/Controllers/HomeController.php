<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckCargoRequest;
use App\Models\Cargo;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        if (Route::is("home")) {
            $systemInfos = Settings::all();
            return view("front.index", compact("systemInfos"));
        } elseif (Route::is("backoffice")) {
            //Here the total number of registered users is displayed in order of month.
            $getUsersData = User::select(DB::raw('MONTH(created_at) as users_month'), DB::raw("COUNT(*) as total_user"))
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->get();
            //Here the total number of shipments is displayed in month order.
            $getCargosData = Cargo::select(DB::raw('MONTH(created_at) as cargo_month'), DB::raw("COUNT(*) as total_cargo"))
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->get();
            return view("admin.index", compact("getUsersData", "getCargosData"));
        }
    }

    public function checkCargo(CheckCargoRequest $request)
    {

        $getCheckCargo = Cargo::where("id", "=", $request->checkCargo)->get();
        if (empty($getCheckCargo[0])) {
            return redirect()->route("home");
        } else {
            return view("front.checkCargo", compact("getCheckCargo"));
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
