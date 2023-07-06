<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CargoController extends Controller
{
    public function getAllCargos()
    {
        if (Auth::user()->hasRole('API Manager')) {
            $getCargosAll = Cargo::all();
            return response()->json([
                "status" => "success",
                "message" => "kullancılar başarıyla çekildi.",
                "data" => $getCargosAll
            ], 200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "yetkisiz erişim"
            ], 401);
        }
    }

    public function getCargo(Request $request)
    {
        if (Auth::user()->hasRole('API Manager')) {
            $getCargo = Cargo::find($request->id);
            return response()->json([
                "status" => "success",
                "message" => $request->id . " id'li kullanıcı başarıyla çekildi",
                "data" => $getCargo
            ], 200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "yetkisiz giriş"
            ], 401);
        }
    }

    public function destroy(Request $request)
    {
        if (Auth::user()->hasRole('API Manager')) {
            $deleteCargo = Cargo::findOrFail($request->id);
            $deleteCargo->delete();
            return response()->json([
                "status" => "success",
                "message" => $request->id . " id'li kullanıcı başarıyla silindi",
            ], 200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "yetkisiz giriş"
            ], 401);
        }
    }

    public function store(Request $request)
    {
        $cargoDataAddList = [
            "gonderen_username" => $request->posted_by_username,
            "gonderilen_username" => $request->sender_by_username,
            "verici_sube" => $request->donor_branch,
            "alici_sube" => $request->receiving_branch,
            "gonderilen_il" => $request->sent_province,
            "gonderilen_ilce" => $request->sent_district,
            "tam_adres" => $request->full_address,
            "kargo_durum" => "Verici Şubede"
        ];
        if (Auth::user()->hasRole("API Manager")) {
            $cargo = Cargo::create($cargoDataAddList);
            return response()->json([
                "status" => "success",
                "message" => "kargo başarıyla eklendi",
                "data" => $cargoDataAddList
            ], 200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "yetkisiz erişim"
            ], 401);
        }
    }

    public function update(Request $request)
    {
        if (Auth::user()->hasRole('API Manager')) {
            $cargoDataUpdateList = [
                "gonderen_username" => $request->posted_by_username,
                "gonderilen_username" => $request->sender_by_username,
                "verici_sube" => $request->donor_branch,
                "alici_sube" => $request->receiving_branch,
                "gonderilen_il" => $request->sent_province,
                "gonderilen_ilce" => $request->sent_district,
                "tam_adres" => $request->full_address,
                "kargo_durum" => $request->cargo_status,
            ];
            Cargo::where("id", $request->id)->update(array_filter($cargoDataUpdateList));
            return response()->json([
                "status" => "success",
                "message" => "Kargo başarıyla güncellendi",
                "data" => $cargoDataUpdateList
            ], 200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "yetkisiz erişim"
            ], 401);
        }
    }
}
