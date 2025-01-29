<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    protected $casts = [
        "expire_at" => "datetime:Y-d-m H:i:s.v"
    ];
}
