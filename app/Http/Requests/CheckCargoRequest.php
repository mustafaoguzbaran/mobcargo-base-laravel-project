<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class CheckCargoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //This is where request checks happen on the backend.
            "checkCargo" => ["required", "exists:cargos,id", "min:1"]
        ];
    }

    public function messages()
    {
        //If we want to display a user-specific error message on the frontend, we use this function.
        return [
            "checkCargo.exists" => "girdiğiniz takip numarasına ait kargo bilgileri bulunamadı!",
            "checkCargo.required" => "lütfen kargo numaranızı giriniz!"
        ];
    }
}
