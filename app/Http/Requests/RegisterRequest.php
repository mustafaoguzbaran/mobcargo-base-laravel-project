<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name_register" => ["required", "min:2"],
            "email_register" => ["required", "min:2", "unique:users,email"],
            "username_register" => ["required", "min:2", "unique:users,username"],
            "phone_register" => ["required", "min:2"],
            "password_register" => ["required", "min:2"]
        ];
    }

    public function messages()
    {
        return [
            "username_register.unique" => "böyle bir kullanıcı adı zaten alınmış!",
            "email_register.unique" => "bu eposta ile önceden kayıt olunmuş!"
        ];
    }
}
