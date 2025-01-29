<?php

namespace App\Models;

use App\Events\AdministrateurUpdatedEvent;
use App\Observers\AdministrateurObserver;
use App\Traits\SsmsDateTime;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrateur extends Authenticatable
{
    use Notifiable, SsmsDateTime;
    // public function getDateFormat()
    // {
    //     return 'Y-d-m H:i:s.v';
    // }
    //
    protected $fillable = [
        'cod_wilaya', 'nom', 'prenom',
        'username', 'fonction', 'status',
        'email', 'password', 'role_id', 'guide',
        'double_auth','expire','expire_at'
    ];

    protected $guard = 'admin';

    protected $dispatchesEvents = [
        'updated'       => AdministrateurUpdatedEvent::class
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
     * @param integer|null $role
     * @return array|string array = [key=>value]
     */
    public static function roles($role = null)
    {

        $roles = [
            1   => 'Administrateur (Root)',
            2   => 'Administrateur DG',
            3   => 'Administrateur Agence',
            4   => 'Charge Dossier',
            5   => 'Suppleant',
            6   => ''
        ];

        if (is_null($role)) {
            return $roles;
        }

        return $roles[$role];
    }

    /**
     * @param String $table
     * @param String $ability ['c','r','u','d']
     * @param intiger $role
     * @return Boolean
     */
    public static function permissions($table, $ability, $role)
    {
        $users = [
            'c'     => [2, 3],
            'r'     => [1, 2, 3],
            'u'     => [1, 2],
            'd'     => [1]
        ];

        switch ($table) {
            case 'users':
                if (\in_array($role, $users[$ability])) return true;
                break;
            default:
                return false;
                break;
        }

        return false;
    }

    public function users()
    {
        $where = [];
        if(auth()->user()->role_id != 1)
        {
            array_push($where,['cod_wilaya',auth()->user()->cod_wilaya]);
        }
        return $this->hasMany(User::class,'cod_wilaya','cod_wilaya')->where($where);
    }

    public function user()
    {
        $where = [];
        if(auth()->user()->role_id != 1)
        {
            array_push($where,['cod_wilaya',auth()->user()->cod_wilaya]);
        }
        return $this->hasOne(User::class,'cod_wilaya','cod_wilaya')->where($where);
    }

    public function wilaya()
    {
        return $this->hasOne(Wilaya::class,'cod_wilaya','cod_wilaya');
    }

    // Getters

    public function getInitialnameAttribute($value)
    {
        return strtoupper(substr($this->nom,0,1)) . strtoupper(substr($this->prenom,0,1));
    }

    public function getRoleAttribute($value){
        return Role::display($this->role_id);
    }
    // protected $attributes = ['initialname','role'];

    protected $casts = [
        "expire_at" => "datetime:Y-d-m H:i:s.v"
    ];

}
