<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;
class Message extends Model
{
    //
    use SsmsDateTime;
    public $timestamps = false;
}
