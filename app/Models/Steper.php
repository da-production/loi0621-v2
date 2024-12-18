<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class Steper extends Model
{
    use HasFactory, SsmsDateTime;

    protected $fillable = [
        'content_fr', 'content_ar', 'position'
    ];
}
