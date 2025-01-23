<?php

namespace App\Http\Livewire\Employeur;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithPagination;

class FormationListeWire extends Component
{
    use WithPagination;
    protected $listeners  = ['fetchAll','fetchAll'];
    public function render()
    {
        $formations = $this->fetchAll();
        return view('livewire.employeur.formation-liste-wire', compact(['formations']));
    }

    
    public function fetchAll(){
        return Formation::where([
            ['code_employeur',auth()->user()->code_employeur],
            ['annuler','=', Null]
        ])
        ->orderBy('updated_at','DESC')
        ->paginate(2);
    }

    public function paginationView()
    {
        return 'vendor.pagination.livewire-paginate-sm';
    }
}
