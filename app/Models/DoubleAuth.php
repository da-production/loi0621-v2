<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class DoubleAuth extends Model
{
    //
    use SsmsDateTime;
    protected $fillable = [
        'id', 'administrateur_id','code','email','expire','token'
    ];
    // public function getDateFormat()
    // {
    //     return 'Y-d-m H:i:s.v';
    // }
}
