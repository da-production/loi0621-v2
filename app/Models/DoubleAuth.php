<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoubleAuth extends Model
{
    //
    protected $fillable = [
        'id', 'administrateur_id','code','email','expire','token'
    ];
    // public function getDateFormat()
    // {
    //     return 'Y-d-m H:i:s.v';
    // }
}
