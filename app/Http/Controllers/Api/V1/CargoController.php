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
        $cargoAddData = [
            "gonderen_username" => $request->gonderen_username,
            "gonderilen_username" => $request->gonderilen_username,
            "verici_sube" => $request->verici_sube,
            "alici_sube" => $request->alici_sube,
            "gonderilen_il" => $request->gonderilen_il,
            "gonderilen_ilce" => $request->gonderilen_ilce,
            "tam_adres" => $request->tam_adres,
            "kargo_durum" => "Verici Şubede"
        ];
        if (Auth::user()->hasRole("API Manager")) {
            $cargo = Cargo::create($cargoAddData);
            return response()->json([
                "status" => "success",
                "message" => "kargo başarıyla eklendi",
                "data" => $cargoAddData
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
            $cargoUpdateData = $request->only(["gonderen_username", "gonderilen_username", "verici_sube", "alici_sube", "gonderilen_il", "gonderilen_ilce", "tam_adres", "kargo_durum"]);
            Cargo::find($request->id)->update($cargoUpdateData);
            return response()->json([
                "status" => "success",
                "message" => "Kargo başarıyla güncellendi",
                "data" => $cargoUpdateData
            ], 200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "yetkisiz erişim"
            ], 401);
        }
    }
}
