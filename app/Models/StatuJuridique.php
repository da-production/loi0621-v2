<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatuJuridique extends Model
{
    //
    protected $table = 'statut_juridiques';
    public function getDateFormat()
    {
        return 'Y-d-m H:i:s.v';
    }
}
