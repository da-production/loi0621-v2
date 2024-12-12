<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserStepOneRequest extends FormRequest
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
            'nom'               => ['required', 'string', 'max:255'],
            'prenom'            => ['required', 'string', 'max:255'],
            'code_employeur'    => ['required', 'string', 'max:10', 'regex:/[0-9]{10}/','unique:users'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8', 'confirmed', 'regex:/[@$!%*#?&]/', 'regex:/[0-9]/', 'regex:/[a-z]/', 'regex:/[A-Z]/'],
            
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Veuillez saisir votre email',
            'email.unique' => 'Cet email a déjà été pris',
            'code_employeur.required' => 'Veuillez saisir votre code employeur',
            'code_employeur.unique' => 'Ce Code Employeur a déjà été pris',
            'code_employeur.regex'   => "Le format du code employeur non valide.",
            'g-recaptcha-response.required' => 'Le Captcha est obligatoire',
            'nom.unique' => 'Veuillez saisir votre nom',
            'prenom.unique' => ' Veuillez saisir votre Prenom',
            'password.regex'    => ' Mot de passe non complexe (miniscule/majuscule/caractere/chiffres)',
        ];
    }
}
