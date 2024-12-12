<?php

namespace App\Models;

use App\Traits\HasUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Formation extends Demande
{
    use HasUuid;
    //
    // public function getDateFormat()
    // {
    //     return 'Y-d-m H:i:s.v';
    // }
    protected $fillable = [
        'id', 'cod_demande', 'code_employeur', 'nbr_travailleurs',
        'reception_dos', 'intervenant', 'ref_reception', 'nature_depot_dos',
        'numero_enrg_registre', 'date_enrg_registre', 'traitement_dos',
        'date_traitement_dos', 'decision_dos', 'cod_rejet', 'date_rejet',
        'description_rejet', 'Expired', 'Expired_at','date_exercice','date_demande'
    ];

    public static function filter(){
        return [
            'cod_demande'=>true, 'code_employeur'=>true,'decision_dos'=>true,
            'reception_dos'=>[
                'autoload'=>true,
                'enums'=>[1,2]
            ]
        ];
    }

}
