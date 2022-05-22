<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules =  [
            'email'=>['required','email'],
            'password'=> ['required',Password::min(6)
                            // ->letters()
                            // ->mixedCase()
                            // ->numbers()
                            // ->symbols()
                            // ->uncompromised()
            ],
        ];

        return  $rules;
    }

    public function messages()
    {
        return [
            'email.required' => 'E-Mail adresini girmelisiniz',
            'email.email'    => 'Email formatında olmalıdır.',
            'password.required' => 'Şifre girmelisiniz',
            'password.min' => 'En az 6 karakter olmalıdır.',
            'password.number' => 'En az 1 rakam içermelidir.',
        ];
    }
}
