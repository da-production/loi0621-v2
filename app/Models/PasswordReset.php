<?php

namespace App\Models;

use App\Traits\SsmsDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory, SsmsDateTime;

    protected $table = 'password_resets';
}
