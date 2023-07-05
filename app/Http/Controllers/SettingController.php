<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $getSettingsData = Settings::all();
        return view("admin.settings", compact("getSettingsData"));
    }

    public function update(Request $request)
    {
        $updateDataList = array_filter([
            "logo" => $request->logo_update,
            "main_header" => $request->main_header_update,
            "main_info_title" => $request->main_info_title_update,
            "main_info_content" => $request->main_info_content_update
        ]);
        Settings::query()->update($updateDataList);
        return redirect()->route("backoffice.settings");
    }
}
