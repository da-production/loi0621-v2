<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class Ticket extends Model
{
    //
    use SsmsDateTime;
    protected $fillable = [
        'code_employeur','objet','sujet','status','categorie_id','type_id','owner', 'administrateur_id'
    ];
    // public function getDateFormat()
    // {
    //     return 'Y-d-m H:i:s.v';
    // }


    public function employeur()
    {
        return $this->belongsTo(Employeur::class,'code_employeur','code_employeur');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'code_employeur','code_employeur');
    }

    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class,'administrateur_id','id');
    }
    public function motifs($motif)
    {
        $motifs = [
            1   => "Motif 1",
            2   => "Motif 2",
            3   => "Motif 3",
            4   => "Motif 4",
            5   => "Motif 5",
        ];
        if(is_null($motif)) return $motifs;
        return $motifs[$motif];
    }

    public static function Enum($stat){
        $status = [
            0   => [
                'classname' => 'orange',
                'icon'      => 'os-icon os-icon-clock',
            ],
            1   => [
                'classname' => 'greenyellow',
                'icon'      => 'os-icon os-icon-check'
            ],
            2   => [
                'classname' => 'red',
                'icon'      => 'os-icon os-icon-close'
            ],
        ];

        return $status[$stat];
    }

    public static function Status($s = null){
        $status = [
            0   => [
                'label'     => 'En attente',
                'class'     => 'green'
            ],
            1   => [
                'label'     => 'Clôturer',
                'class'     => 'red'
            ]
        ];

        return is_null($s) ? $status : $status[$s];
    }

    public function getStatAttribute()
    {
        return $this->Status($this->status)['label'];
    }

    public function getClassnameAttribute()
    {
        return $this->Status($this->status)['class'];
    }

    public function getReculeAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
