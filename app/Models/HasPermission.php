<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class HasPermission extends Model
{
    use HasFactory, SsmsDateTime;

    protected $fillable = [
        'role_id', 'permission_id'
    ];
}
