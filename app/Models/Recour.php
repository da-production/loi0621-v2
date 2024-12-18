<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class Recour extends Model
{
    use HasFactory, SsmsDateTime;
}
