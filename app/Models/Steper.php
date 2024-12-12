<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steper extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_fr', 'content_ar', 'position'
    ];
}
