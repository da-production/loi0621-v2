<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscriptionEtapeDeuxRequest;
use App\Http\Requests\StoreNewDemandeRequest;
use App\Models\Employeur;
use App\Models\Branche;
use App\Models\StatuJuridique;
use App\Models\Ticket;
use App\Models\Wilaya;
use App\Repository\Employeur\TaskEmployeurInterface;
use Illuminate\Http\Request;

use App\Traits\Employeur\UpdateProfile;
use Illuminate\Support\Facades\Cache;

class EmployeurController extends Controller
{
    use UpdateProfile;
    private TaskEmployeurInterface $tasks;

    public function __construct(TaskEmployeurInterface $tasks){
        $this->tasks = $tasks;
    }
    public function inscription()
    {
        $employeur = Employeur::where([
            ['code_employeur', auth()->user()->code_employeur],
        ])->first();
        
        if (!is_null($employeur)) return redirect()->route('employeur.profile');

        $branches = Cache::rememberForever('inscription-Branche', function(){
            return Branche::select('cod_branche', 'des_fr', 'des_ar')
            ->orderBy('des_fr', 'asc')
            ->get();
        });
        $status = Cache::rememberForever('inscription-StatuJuridique', function () {
            return StatuJuridique::select('cod_stat', 'des_fr', 'des_ar')
            ->orderBy('des_fr', 'desc')
            ->get();
        });

        $wilaya = Wilaya::where('cod_wilaya', '=', auth()->user()->cod_wilaya)->first();
        return view('employeur.inscription-2', \compact(['branches', 'status', 'wilaya']));
    }

    public function profile()
    {
        $tickets = Ticket::where('code_employeur',auth()->user()->code_employeur)->get();
        return view('employeur.profile', compact(['tickets']));
    }

    public function store(InscriptionEtapeDeuxRequest $request)
    {
        $this->tasks->store($request, 'App\\Models\\Employeur');
        return redirect()->route('employeur.profile');
    }
}
