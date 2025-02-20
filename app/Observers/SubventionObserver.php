<?php

namespace App\Observers;

use App\Mail\NewDemandeMail;
use App\Models\Administrateur;
use App\Models\Subvention;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SubventionObserver
{
    //
    public function creating(Subvention $demande)

    {
        $users = Administrateur::where('cod_wilaya',$demande->intervenant)->pluck('email');
        try{

            foreach ($users as $user) {
                Mail::to($user)->send(new NewDemandeMail(route('administrateur.subventions.detail',['cod_demande'=>$demande->cod_demande]),
                "Nouvelle demande de subvention enregistrée",
                "Notification de nouvelle demande de subvention",'subvention'));
            }
            
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
