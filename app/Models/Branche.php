<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    //
    public function getDateFormat()
    {
        return 'Y-d-m H:i:s.v';
    }
}
