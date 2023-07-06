<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoOperationsCreateRequest;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->cargoOperationsSearch == null) {
            $getCargoList = Cargo::all();
            return view("admin.cargooperations", compact('getCargoList'));
        } else {
            $getCargoList = Cargo::query()->where("gonderen_username", "LIKE", "{$request->cargoOperationsSearch}%")
                ->orWhere("gonderilen_username", "LIKE", "{$request->cargoOperationsSearch}%")
                ->get();
            return view("admin.cargooperations", compact("getCargoList"));
        }
    }

    public function store(CargoOperationsCreateRequest $request)
    {
        $cargoDataCreateList = [
            "gonderen_username" => $request->posted_by_username,
            "gonderilen_username" => $request->sender_by_username,
            "verici_sube" => $request->donor_branch,
            "alici_sube" => $request->receiving_branch,
            "gonderilen_il" => $request->sent_province,
            "gonderilen_ilce" => $request->sent_district,
            "tam_adres" => $request->full_adress,
            "kargo_durum" => "Verici Şubede"
        ];
        Cargo::create($cargoDataCreateList);
        return redirect()->route("backoffice.cargooperations.show");
    }

    public function destroy(Request $request)
    {
        Cargo::destroy(intval($request->id));
        return redirect(route("backoffice.cargooperations.show"));
    }

    public function edit(Request $request)
    {
        $getCargoInfo = Cargo::where("id", $request->id)->get();
        return view("admin.cargoedit", compact("getCargoInfo"));
    }

    public function update(Request $request)
    {
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
        return redirect()->route("cargos.edit", ['id' => $request->id]);
    }
}
