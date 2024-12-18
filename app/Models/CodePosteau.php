<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class CodePosteau extends Model
{
    //
    use SsmsDateTime;
    protected $table = "code_posteaux";
    
}
