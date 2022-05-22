<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserSaveRequest extends FormRequest
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
        $id = $this->route()->parameter('id');

        $rules=  [
            'name' => ['required','min:4','max:150'],
            'role' => ['required','in:"super-admin","user"'],
            'email' => ['required','email','min:3','max:150'],
        ];

        if(is_null($id)){
            array_push( $rules['email'],Rule::unique('users')->ignore($this->id));
            $rules['password'] =  [ 'required',
                                    Password::min(6)
                                    // ->letters()
                                    // ->mixedCase()
                                    ->numbers()
                                    // ->symbols()
                                    // ->uncompromised()
                                ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'     => 'Ad-Soyad girmelisiniz.',
            'name.min'          => 'Ad-Soyad en az 4 karakter olabilir.',
            'name.max'          => 'Ad-Soyad en fazla 150 karakter olabilir.',
            'role.required'     => 'Role seçmelisiniz',
            'role.in'           => 'Super Admin veya Kullanıcı seçmelisiniz',
            'email.required'    => 'Email girmelisiniz.',
            'email.email'       => 'Email formatında olmalıdır.',
            'email.min'         => 'Email en az 3 karakter olabilir',
            'email.unique'      => 'Bu email adresiyle kayıt bulunmaktadır.',
            'email.max'         => 'Email en fazla 150 karakter olabilir.',
            'password.required' => 'Şifre girmelisiniz.',
            'password.min'      => 'Şifre minimum 6 karakter olmalıdır.',
        ];
    }

}
