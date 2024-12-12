<?php

namespace App\Http\Controllers\Administrateur;

use App\Models\Employeur;
use App\Models\Formation;
use App\Http\Controllers\Controller;
use App\Http\Requests\SetReceptionDossierRequest;
use App\Http\Requests\SetRejectRequest;
use App\Http\Services\DecisionService;
use App\Http\Services\ReceptionDossierService;
use App\Repository\Demande\Detail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormationAdministrateurController extends Controller
{
    public $detail;
    public function __construct(Detail $detail)
    {
        $this->detail = $detail;
    } 
    public function index()
    {
        return view('administrateur.formation.index');
    }

    public function detail($cod_demande)
    {
        
        return $this->detail->show('Formation',$cod_demande);
    }

    public function DecisionAccordRejet(SetRejectRequest $request,DecisionService $decision)
    {
        $result = $decision->update(Formation::class,$request);
        if($result){
            return back()->with('success','s');
        }else{
            return back()->with('error','e');
        }
    }

    public function storeReception(SetReceptionDossierRequest $request,ReceptionDossierService $reception)
    {
        $resultat = $reception->update(Formation::class,$request);
        if($resultat){
            return back()->with('success','');
        }else{
            return back()->with('error','');
        }
    }
}
