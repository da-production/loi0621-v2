<?php

namespace App\Models;

use App\Traits\SsmsDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeurMail extends Model
{
    use HasFactory, SsmsDateTime;

    protected $fillable = [
        'code_employeur', 'title', 'payload', 'status'
    ];

    public function employeur(){
        return $this->belongsTo(Employeur::class,'code_employeur','numero');
    }
}
