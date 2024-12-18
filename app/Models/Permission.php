<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Traits\SsmsDateTime;

class Permission extends Model
{
    use HasFactory, SsmsDateTime;

    protected $fillable = [
        'name', 'slug',  
    ];

    public static function Permission($model = null,$action=null){
        $permissions = [
            'employeur'     => [
                'view-any'              => [1,2],
                'view'                  => [1,2,4,5,6],
                'create'                => [1],
                'update'                => [4,5],
                'send-an-email'         => [4,5]
            ],
            'formation'     => [
                'view-any'              => [1,2],
                'view'                  => [1,2,4,5,6],
                'create'                => [1],
                'update'                => [4,5],
                'update-dossier'        => [4,5]
            ],
            'subvention'     => [
                'view-any'              => [1,2],
                'view'                  => [1,2,4,5,6],
                'create'                => [1],
                'update'                => [4,5],
                'update-dossier'        => [4,5]
            ],

            'administrateur'          => [
                'view-any'              => [1,3],
                'view'                  => [3],
                'create'                => [1,3],
                'update'                => [1,3],
            ],

            'ticket'          => [
                'view-any'              => [1,2,7],
                'reply'                 => [7],
            ],

            'statistique'          => [
                'view-any'              => [1],
                'view'                  => [6],
            ],

            'option'            => [
                'view-any'              => [1]
            ],
        ];
        if(Auth::guard('admin')->check()){
            $admin = auth()->guard('admin')->user();
            if(in_array((int)$admin->role_id,$permissions[$model][$action])){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
