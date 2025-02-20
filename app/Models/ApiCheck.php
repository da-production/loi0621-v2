<?php

namespace App\Models;

use App\Traits\SsmsDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCheck extends Model
{
    use HasFactory, SsmsDateTime;

    protected $fillable = [
        'api_name',
        'status',
        'status_code',
        'response',
    ];
}
