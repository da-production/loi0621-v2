<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'fonction'      => ['required', 'string'],
            'nom'           => ['required', 'string', 'max:255'],
            'prenom'        => ['required', 'string', 'max:255'],
            'username'      => ['required', 'string', 'max:255', 'unique:administrateurs'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:administrateurs'],
            'password'      => ['required', 'string', 'min:8', 'confirmed', 'regex:/[@$!%*#?&]/', 'regex:/[0-9]/', 'regex:/[a-z]/', 'regex:/[A-Z]/'],
            'cod_wilaya'    => ['required'],
            'role_id'       => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'fonction.required' => 'fonction est obligatoire',
            'email.required' => 'Veuillez saisir votre email',
            'email.unique' => 'Cet email a déjà été pris',
            'username.required' => 'Veuillez saisir le nom d\'Utilisateur',
            'username.unique' => 'Nom d\'Utilisateur a déjà été pris',
            'nom.unique' => 'Veuillez saisir votre nom',
            'prenom.unique' => ' Veuillez saisir votre Prenom',
            'password.required'     => 'mot de passe est obligatoire',
            'password.regex'    => ' Mot de passe non complexe (miniscule/majuscule/caractere/chiffres)',
            'cod_wilaya.required'  => 'Veuillez saisir votre Wilaya',
        ];
    }
}
