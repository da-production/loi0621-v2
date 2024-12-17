<?php

namespace App\Repository\Employeur;
use Illuminate\Http\Request;

class TaskEmployeur implements TaskEmployeurInterface{

    public function storeFormation($request, $model){
        return $model::create([
            'cod_demande'        => Date("Ymdhis"),
            'nbr_travailleurs'   => $request->nbr_travailleurs,
            'intervenant'        => auth()->user()->cod_wilaya,
            'code_employeur'     => auth()->user()->code_employeur,
            'date_exercice'      => $request->date_exercice,
            'date_demande'       => Date("Y-m-d"),
        ]);
    }


    public function storeSubvention($request, $model){
        return $model::create([
            'cod_demande'        => Date("Ymdhis"),
            'nbr_travailleurs'   => $request->nbr_travailleurs,
            'intervenant'        => auth()->user()->cod_wilaya,
            'code_employeur'     => auth()->user()->code_employeur,
            'date_exercice'      => $request->date_exercice,
            'date_demande'       => Date("Y-m-d"),
        ]);
    }

    public function store($request, $model){
        $numbers = \substr(auth()->user()->code_employeur, 0, 8);
        return $model::create([
            'numero'                        => auth()->user()->cod_wilaya . $numbers,
            'cod_wilaya'                    => auth()->user()->cod_wilaya,
            'code_employeur'                => auth()->user()->code_employeur,
            ...$request->only(['cod_stat','cod_branche','date_debut_activite','adresse','adresseAr',
            'raison_social','raison_social_Ar','sigle','representant','representantAr','qualite','qualiteAr',
            'tel','mob','email_entreprise','RIB','NIF','NIS','RC','nbr_travailleurs','condition_accepte']),
        ]);
    }
}