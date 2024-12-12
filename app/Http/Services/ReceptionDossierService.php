<?php

namespace App\Http\Services;

class ReceptionDossierService {
    public function update($model,$request)
    {
        return $model::where([
            ['code_employeur',$request->code_employeur],
            ['cod_demande',$request->cod_demande]
        ])->update([
            'nature_depot_dos'  => $request->nature_depot_dos,
            'reception_dos'     => true,
            'date_reception_dos'=> $request->date,
            'traitement_dos'    => true,
            'ref_reception'     => $request->ref
        ]);
    }
}