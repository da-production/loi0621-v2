<?php

namespace App\Http\Requests;

use App\Rules\RC;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class InscriptionEtapeDeuxRequest extends FormRequest
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
            'cod_branche'   => 'required',
            'cod_stat'   => 'required',
            'raison_social'   => 'required',
            'raison_social_Ar'   => 'required',
            'sigle'   => 'required',
            'code_employeur'   => 'required',
            'adresse'   => 'required',
            'cod_wilaya'   => 'required',
            'adresseAr'   => 'required',
            'tel'   => 'required',
            'mob'   => 'required',
            'email_entreprise'   => 'required|email',
            'RIB'   => 'required|min:20|max:20',
            'NIF'   => 'required|numeric',
            'NIS'   => 'required|numeric',
            'RC'    => ['required'],
            'representant'   => 'required',
            'representantAr'   => 'required',
            'qualite'   => 'required',
            'qualiteAr'   => 'required',
            'nbr_travailleurs'   => 'required|numeric',
            'condition_accepte'      => "accepted",
            'date_debut_activite'   => 'required'
        ];
    }

    public function messages(){
        return [
            'cod_branche.required' => "'La selection d'une Branche est obligatoire'",
            'RIB.required'   => 'Le RIB est un champs obligatoire',
            'RIB.min'   => 'Le RIB min 20',
            'RIB.max'   => 'Le RIB max 20',
            'condition_accepte' => 'Condition error'
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     dd($validator->errors()->getMessages());
    //     if ($this->expectsJson()) {
    //         return response()->json([
    //             'message' => "Validation Errors",
    //             'status' => false,
    //             'errors' => $validator->errors()->getMessages()
    //         ]);
    //     }
    //     parent::failedValidation($validator);
    // }
}
