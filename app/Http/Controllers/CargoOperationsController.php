<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoOperationsCreateRequest;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoOperationsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->cargoOperationsSearch == null) {
            $cargoList = Cargo::all();
            return view("admin.cargooperations", compact('cargoList'));
        } else {
            $cargoList = Cargo::query()->where("gonderen_username", "LIKE", "{$request->cargoOperationsSearch}%")
                ->orWhere("gonderilen_username", "LIKE", "{$request->cargoOperationsSearch}%")
                ->get();
            return view("admin.cargooperations", compact("cargoList"));
        }
    }

    public function store(CargoOperationsCreateRequest $request)
    {
        $data = [
            "gonderen_username" => $request->gonderen_username,
            "gonderilen_username" => $request->gonderilen_username,
            "verici_sube" => $request->verici_sube,
            "alici_sube" => $request->alici_sube,
            "gonderilen_il" => $request->gonderilen_il,
            "gonderilen_ilce" => $request->gonderilen_ilce,
            "tam_adres" => $request->tam_adres,
            "kargo_durum" => "Verici Şubede"
        ];
        Cargo::create($data);
        return redirect()->route("backoffice.cargooperations.show");
    }

    public function destroy(Request $request)
    {
        Cargo::destroy(intval($request->id));
        return redirect(route("backoffice.cargooperations.show"));
    }

    public function cargoEditShow(Request $request)
    {
        $cargoInfo = Cargo::where("id", $request->id)->get();
        return view("admin.cargoedit", compact("cargoInfo"));
    }

    public function cargoEditPut(Request $request)
    {
        $data = [
            "gonderen_username" => $request->gonderen_username,
            "gonderilen_username" => $request->gonderilen_username,
            "verici_sube" => $request->verici_sube,
            "alici_sube" => $request->alici_sube,
            "gonderilen_il" => $request->gonderilen_il,
            "gonderilen_ilce" => $request->gonderilen_ilce,
            "tam_adres" => $request->tam_adres,
            "kargo_durum" => $request->kargo_durum,
        ];
        Cargo::where("id", $request->id)->update(array_filter($data));
        return redirect()->route("cargoedit", ['id' => $request->id]);
    }
}
