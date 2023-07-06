<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "username" => ["required", "exists:users"],
            "password" => ["required"]
        ];
    }
    public function messages()
    {
        //If we want to display a user-specific error message on the frontend, we use this function.
        return [
            "username.exists" => "bilgilerinizi kontrol edin!"
        ];
    }
}
