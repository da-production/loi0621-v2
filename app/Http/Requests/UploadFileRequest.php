<?php

namespace App\Http\Requests;

use App\Rules\CodeDemandeRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UploadFileRequest extends FormRequest
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
        // dd(request()->all());
        return [
            request('type')         => ['required',File::types(['pdf', 'jpg','jpeg','png'])->max(2* 1024)],
            'code_demande'          => ['required', new CodeDemandeRule()]
        ];
    }

    public function attributes()
    {
        return [
            'octroi'            => "Demande d’octroi de la subvention mensuelle à l’emploi",
        ];
    }
}
