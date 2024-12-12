<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'nom'               => ['required','min:2','max:250'],
            'prenom'            => ['required','min:2','max:250'],
            'email'             => ['required','min:2','max:250','email',Rule::unique('administrateurs','email')->ignore(request()->email,'email')],
            'username'          => ['required','min:2','max:250',Rule::unique('administrateurs','username')->ignore(request()->username,'username')],
            'fonction'          => ['required','min:2','max:250'],
            'password'          => ['nullable','min:8',
                                        'regex:/[a-z]/',      // must contain at least one lowercase letter
                                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                                        'regex:/[0-9]/',      // must contain at least one digit
                                        'regex:/[@$!%*#?&]/', // must contain a special character
                                    ],
            'cod_wilaya'        => ['required','exists:wilayas,cod_wilaya'],
        ];
    }
}
