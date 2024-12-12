<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetRejectRequest extends FormRequest
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
            'decision'                  =>['required','in:A,R'],
            'motif'                     => request()->decision == 'R' ? 'required|in:1,2,3,4,5' : 'nullable',
            'description_rejet'         => request()->decision == 'R' ? ['nullable','string','min:10','max:250']: 'nullable',
            'code_employeur'            =>['required','exists:employeurs,code_employeur'],
            'cod_demande'               =>['required','exists:'.request('type_demande','subventions').',cod_demande'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->isNotEmpty()) {
                $validator->errors()->add('decision', request()->decision);
            }
        });
    }
}
