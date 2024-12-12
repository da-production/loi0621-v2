<?php


namespace App\Repository\Demande;

class Detail implements DetailInterface{

    public function show($model,$cod_demande)
    {
        $model = ucfirst($model);
        $modelName = "App\Models\\".ucfirst($model);
        $query = $modelName::query();
        $auth = auth()->user();
        $where = [
            ['cod_demande',$cod_demande]
        ];
        if($auth->cannot('view-any',"App\Models\\$model")){
            if($auth->can('view',"App\Models\\$model")){
                array_push($where,['intervenant',$auth->cod_wilaya]);
            }
        }
        $demande = $query->where($where)
            ->with(['employeur'])
            ->firstOrFail();

        return view("administrateur.$model.detail", compact(['demande']));
    }
}