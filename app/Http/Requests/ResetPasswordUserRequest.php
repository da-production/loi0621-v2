<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordUserRequest extends FormRequest
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
        return [
            //
            'token'     => ['required','exists:password_resets,token'],
            'password'  => ['required', 'string', 'min:8', 'confirmed', 'regex:/[@$!%*#?&]/', 'regex:/[0-9]/', 'regex:/[a-z]/', 'regex:/[A-Z]/'],
        ];
    }

    public function messages(){
        return [
            'token.required'    => 'Token requis',
            'token.exists'      => 'Token invalide',
            'password.regex'    => ' Mot de passe non complexe (miniscule/majuscule/caractere/chiffres)',
        ];
    }
}
