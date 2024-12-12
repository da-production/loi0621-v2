<?php

namespace App\Http\Livewire\Employeur;

use Livewire\Component;
use App\Models\Wilaya;

class InscriptionEtapeUneWire extends Component
{
    public $code_employeur;
    public function render()
    {
        $wilayas = Wilaya::all();
        return view('livewire.employeur.inscription-etape-une-wire', compact(['wilayas']));
    }

    public function cnas(){
        dd($this->code_employeur);
    }

    public function updatedCodeEmployeur()
    {
        dd($this->code_employeur);
    }
}
