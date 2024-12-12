<?php

namespace App\Traits\Employeur;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

trait UpdateProfile {
    public function myProfile(Request $request,$model)
    {
        $data = [
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
        ];
        if($request->filled('password'))
        {
            $data['password']= bcrypt($request->password);
        }
        return $model::where('code_employeur',auth()->user()->code_employeur)
        ->update($data);
        
    }
}