<?php

namespace App\Rules;

use App\Models\Formation;
use App\Models\Subvention;
use Illuminate\Contracts\Validation\Rule;

class CodeDemandeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $s = Subvention::where('cod_demande',$value)->first('cod_demande');
        $f = Formation::where('cod_demande',$value)->first('cod_demande');
        $error = [];
        if(is_null($s)){
            $error['s']     = 'S';
        }
        if(is_null($f)){
            $error['f']     = 'F';
        }
        return count($error) > 1 ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
