<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class HasMessage extends Model
{
    //
    use SsmsDateTime;
}
