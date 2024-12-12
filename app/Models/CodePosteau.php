<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodePosteau extends Model
{
    //
    protected $table = "code_posteaux";
    public function getDateFormat()
    {
        return 'Y-d-m H:i:s.v';
    }
}
