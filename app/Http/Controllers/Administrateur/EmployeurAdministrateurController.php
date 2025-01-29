<?php

namespace App\Http\Controllers\Administrateur;

use App\Models\Employeur;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class EmployeurAdministrateurController extends Controller
{
    public function index()
    {
        //
        $auth = auth()->user();
        $where = [];
        if($auth->cannot('view-any',Employeur::class)){
            if($auth->can('view',Employeur::class)){
                array_push($where,['cod_wilaya',$auth->cod_wilaya]);
            }else{
                abort(403);
            }
        }
        $employeurs = User::with(['employeur','employeur.branche','employeur.statuJuridique','employeur.formations','employeur.subventions','wilaya'])->where($where)->paginate(15);

        return view('administrateur.employeurs.index', compact(['employeurs']));
    }

    public function detail($code_emloyeur)
    {
        $auth = auth()->user();
        $where = [
            ['code_employeur',$code_emloyeur]
        ];

        if($auth->role_id != 1){
            array_push($where,['employeurs.cod_wilaya',$auth->cod_wilaya]);
        }
        $employeur = Employeur::with(['tickets','mails'])->where($where)->firstOrFail();
        // dd($employeur);
        $expired_at = Carbon::parse($employeur->created_at)->addYear(3)->timestamp;
        $created_at = Carbon::parse($employeur->created_at)->timestamp; 
        $now        = Carbon::now()->timestamp;
        $devided = (($expired_at - $now) * 100 ) / ($expired_at - $created_at);
        
        return view('administrateur.employeurs.detail', compact(['employeur','devided']));
    }
}
