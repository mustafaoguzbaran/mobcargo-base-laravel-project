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
            "posted_by_username" => ["required", "min:1"],
            "sender_by_username" => ["required", "min:1"],
            "donor_branch"=>["required", "min:2"],
            "receiving_branch"=>["required", "min:2"],
            "sent_province"=>["required", "min:2"],
            "sent_district"=>["required", "min:2"],
            "full_adress" => ["required", "min:2"]
        ];
    }
}
