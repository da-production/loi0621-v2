<?php

namespace App\Http\Controllers\Ajax\Employeur;

use App\Http\Controllers\Controller;
use App\Models\Administrateur;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function codeEmployeur($codeEmployeur){
        echo $codeEmployeur;
    }

    public function ajax(Request $request){
        if($request->filled('code')){
            $user = User::where('code_employeur',$request->code)->first();
            if(!is_null($user)){
                return [
                    'code'=> "true",
                    'message'=> 'Ce Code Employeur a déjà été pris'
                ];
            }else{
                return [
                    'code'=> "false",
                    'message'=> 'Code Valide'
                ];
            }
        }
    }
}