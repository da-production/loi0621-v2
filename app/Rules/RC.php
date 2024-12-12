<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RC implements Rule
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

    public function passes($attribute, $value)
    {
        //
        if (is_array($value) && count($value) == 1) {
            return true;
        } else {
            if(strlen($value) > 15){
                return false;
            }
            return true;
        }
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
