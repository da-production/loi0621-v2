<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetReceptionDossierRequest extends FormRequest
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
            'code_employeur'            =>['required','exists:employeurs,code_employeur'],
            'cod_demande'               =>['required','exists:'.request('type_demande','subventions').',cod_demande'],
            'type_demande'              => ['required','in:subventions,formations'],
            'nature_depot_dos'          =>['required','in:1,2,3'],
            'date'                      =>['required','date'],
            'ref'                       =>['required','string','max:250','unique:'.request('type_demande','subventions').',ref_reception'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->isNotEmpty()) {
                $validator->errors()->add('reception_dos', 'receptionOpen');
            }
        });
    }
}
