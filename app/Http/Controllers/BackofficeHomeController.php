<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BackofficeHomeController extends Controller
{
    public function index()
    {
        //Here the total number of registered users is displayed in order of month.
        $usersData = User::select(DB::raw('MONTH(created_at) as users_month'), DB::raw("COUNT(*) as total_user"))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
        //Here the total number of shipments is displayed in month order.
        $cargosData = Cargo::select(DB::raw('MONTH(created_at) as cargo_month'), DB::raw("COUNT(*) as total_cargo"))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
        return view("admin.index", compact("usersData", "cargosData"));
    }

}
