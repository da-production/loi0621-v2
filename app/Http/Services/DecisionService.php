<?php

namespace App\Http\Services;

class DecisionService{
    public function update($model,$request){
        $d = [
            'A' => 1, 'R' => 0
        ];
        if(key_exists($request->decision,$d)){
            $model::where([
                ['code_employeur',$request->code_employeur],
                ['cod_demande',$request->cod_demande]
            ])->update([
                "decision_dos"  => $d[$request->decision],
                'cod_rejet'     => $request->motif,
                'date_decision'  => Date('Y-m-d'),
                'description_rejet' => $request->description
            ]);
            return true;
        }
        return false;
    }
}