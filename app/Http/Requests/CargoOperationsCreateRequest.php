<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoOperationsCreateRequest extends FormRequest
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
            "gonderen_username" => ["required", "min:1"],
            "gonderilen_username" => ["required", "min:1"],
            "verici_sube"=>["required", "min:2"],
            "alici_sube"=>["required", "min:2"],
            "gonderilen_il"=>["required", "min:2"],
            "gonderilen_ilce"=>["required", "min:2"],
            "tam_adres" => ["required", "min:2"]
        ];
    }
}
