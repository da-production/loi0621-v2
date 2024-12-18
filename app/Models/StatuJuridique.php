<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class StatuJuridique extends Model
{
    //
    use SsmsDateTime;
    protected $table = 'statut_juridiques';
    
}
