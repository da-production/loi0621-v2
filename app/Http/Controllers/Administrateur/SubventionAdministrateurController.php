<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetReceptionDossierRequest;
use App\Models\Subvention;
use Illuminate\Http\Request;
use App\Models\Employeur;
use App\Models\Formation;
use App\Http\Services\DecisionService;
use App\Http\Services\ReceptionDossierService;
use App\Repository\Demande\Detail;
use Carbon\Carbon;

class SubventionAdministrateurController extends Controller
{
    public $detail;
    public function __construct(Detail $detail)
    {
        $this->detail = $detail;
    } 
    public function index()
    {
        return view('administrateur.subvention.index');
    }

    public function detail($cod_demande)
    {
        return $this->detail->show('Subvention',$cod_demande);
    }
    
    public function DecisionAccordRejet(Request $request, DecisionService $decision)
    {
        $result = $decision->update(Subvention::class,$request);
        if($result){
            return back()->with('success','s');
        }else{
            return back()->with('error','e');
        }
    }

    public function storeReception(SetReceptionDossierRequest $request,ReceptionDossierService $reception)
    {
        $resultat = $reception->update(Subvention::class,$request);
        if($resultat){
            return back()->with('success','');
        }else{
            return back()->with('error','');
        }
    }

}
