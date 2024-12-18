<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\SsmsDateTime;

class User extends Authenticatable
{
    use Notifiable, SsmsDateTime;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nom', 'prenom', 'code_employeur', 'cod_wilaya', 'email', 'password', 'role_id', "Expired", "Expired_at"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employeur()
    {
        return $this->hasOne(Employeur::class, 'code_employeur', 'code_employeur');
    }

    public function wilaya()
    {
        return $this->hasOne(Wilaya::class, 'cod_wilaya', 'cod_wilaya');
    }

    public function subventions()
    {
        return $this->hasMany(Subvention::class, 'code_employeur', 'code_employeur');
    }
    public function subvention()
    {
        return $this->hasOne(Subvention::class, 'code_employeur', 'code_employeur')->latest();
    }
    public function formation()
    {
        return $this->hasOne(Formation::class, 'code_employeur', 'code_employeur')->latest();
    }

    public function formations()
    {
        return $this->hasMany(Formation::class, 'code_employeur', 'code_employeur');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'code_employeur', 'code_employeur');
    }

    public function fileOctroi()
    {
        return $this->hasOne(File::class, 'code_employeur', 'code_employeur')->where('code_file', 'se-1');
    }

    public function fileDecisionOctroi()
    {
        return $this->hasOne(File::class, 'code_employeur', 'code_employeur')->where('code_file', 'se-2');
    }

    public function listeTravailleurs()
    {
        return $this->hasOne(File::class, 'code_employeur', 'code_employeur')->where('code_file', 'se-3')->latest();
    }
    
    public function justificatif()
    {
        return $this->hasOne(File::class, 'code_employeur', 'code_employeur')->where('code_file', 'se-5')->latest();
    }

    public function lastSubvention()
    {
        return $this->hasOne(Subvention::class, 'code_employeur', 'code_employeur')->where('decision_dos', '!=', NULL)->latest();
    }

    public function lastFormation()
    {
        return $this->hasOne(Formation::class, 'code_employeur', 'code_employeur')->where('decision_dos', '!=', NULL)->latest();
    }

}
