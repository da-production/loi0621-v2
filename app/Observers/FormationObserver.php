<?php

namespace App\Observers;

use App\Mail\NewDemandeMail;
use App\Models\Administrateur;
use App\Models\Formation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FormationObserver
{
    //
    public function creating(Formation $demande)

    {
        $users = Administrateur::where('cod_wilaya',$demande->intervenant)->pluck('email');
        try{

            foreach ($users as $user) {
                Mail::to($user)->send(new NewDemandeMail(route('administrateur.formations.detail',['cod_demande'=>$demande->cod_demande]),
                "Nouvelle demande de formation enregistrée",
                "Notification de nouvelle demande de formation",'formation'));
            }
            
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
