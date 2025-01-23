<?php

namespace App\Http\Livewire\Employeur;

use App\Models\Formation;
use App\Models\Subvention;
use Livewire\Component;
use Illuminate\Validation\Rule;

class DemandeWire extends Component
{
    public $canMakeNewRequest = false;
    public $subvention = null;
    public $subAnnuler = null;
    public $formAnnuler = null;
    public $formation = null;

    public $type;

    public $date_exercice;

    public $nbr_travailleurs;
    public function mount()
    {
        $this->canMakeNewRequest = $this->checkAbility();
    }

    public function render()
    {
        return view('livewire.employeur.demande-wire');
    }

    public function checkAbility()
    {
        $subvention = Subvention::where([
            ['code_employeur',auth()->user()->code_employeur],
            ['decision_dos','=',NULL]
        ])->latest()->first();
        $this->subvention = is_null($subvention) ? null : true;
        $this->subAnnuler = $subvention?->annuler;
        $formation = Formation::where([
            ['code_employeur',auth()->user()->code_employeur],
            ['decision_dos','=',NULL]
        ])->latest()->first();
        $this->formation = is_null($formation) ? null : true;
        $this->formAnnuler = $formation?->annuler;

        if(is_null($subvention) || is_null($formation) || !is_null($subvention?->annuler) || !is_null($formation?->annuler)) return $this->canMakeNewRequest = true;
        return $this->canMakeNewRequest = false;
    }

    public function store()
    {
        // *1*- check can
        if($this->checkAbility()){

            // *2*- validation
            $this->validate([
                'type'              => ['required',Rule::in([1, 2])],
                'nbr_travailleurs'  => 'required|numeric',
                'date_exercice'     => 'required|date_format:Y-m-d'
            ]);

            // *2*- add the request || *3*- checkAbility
            switch($this->type){
                case 1:
                    $this->storeSubvention();
                    $this->checkAbility();
                    $this->emit('fetchAll');
                    return;
                case 2:
                    $this->storeFormation();
                    $this->checkAbility();
                    $this->emit('fetchAll');
                    return;
                default:
                    return;
            }
        }
    }

    private function clear()
    {
        $this->nbr_travailleurs     = null;
        $this->date_exercice        = null;
        $this->type                 = null;
    }
    private function storeSubvention()
    {
        Subvention::create([
            'cod_demande'        => Date("Ymdhis"),
            'nbr_travailleurs'   => $this->nbr_travailleurs,
            'intervenant'        => auth()->user()->cod_wilaya,
            'code_employeur'     => auth()->user()->code_employeur,
            'date_exercice'      => $this->date_exercice,
            'date_demande'       => Date("Y-m-d"),
        ]);
        $this->clear();
    }

    private function storeFormation()
    {
        Formation::create([
            'cod_demande'        => Date("Ymdhis"),
            'nbr_travailleurs'   => $this->nbr_travailleurs,
            'intervenant'        => auth()->user()->cod_wilaya,
            'code_employeur'     => auth()->user()->code_employeur,
            'date_exercice'      => $this->date_exercice,
            'date_demande'       => Date("Y-m-d"),
        ]);
        $this->clear();
    }
}
