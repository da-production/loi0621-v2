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
            'cod_stat'                      => $request->cod_stat,
            'cod_branche'                   => $request->cod_branche,
            'date_debut_activite'           => $request->date_debut_activite,
            'cod_wilaya'                    => auth()->user()->cod_wilaya,
            'adresse'                       => $request->adresse,
            'adresseAr'                     => $request->adresseAr,
            'raison_social'                 => $request->raison_social,
            'raison_social_Ar'              => $request->raison_social_Ar,
            'sigle'                         => $request->sigle,
            'code_employeur'                => auth()->user()->code_employeur,
            'representant'                  => $request->representant,
            'representantAr'                => $request->representantAr,
            'qualite'                       => $request->qualite,
            'qualiteAr'                     => $request->qualiteAr,
            'tel'                           => $request->tel,
            'mob'                           => $request->mob,
            'email_entreprise'              => $request->email_entreprise,
            'RIB'                           => $request->RIB,
            'NIF'                           => $request->NIF,
            'NIS'                           => $request->NIS,
            'RC'                            => $request->RC,
            'nbr_travailleurs'              => $request->nbr_travailleurs,
            'condition_accepte'             => $request->condition_accepte,
        ]);
    }
}