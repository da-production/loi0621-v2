<?php

namespace App\Http\Livewire\Employeur;

use App\Models\Subvention;
use Livewire\Component;
use Livewire\WithPagination;

class SubventionListeWire extends Component
{
    use WithPagination;
    protected $listeners  = ['fetchAll','fetchAll'];
    public function render()
    {
        $subventions = $this->fetchAll();
        return view('livewire.employeur.subvention-liste-wire', compact(['subventions']));
    }

    public function fetchAll(){
        return Subvention::where([
            ['code_employeur',auth()->user()->code_employeur],
            ['annuler','=', Null]
        ])
        ->orderBy('updated_at','DESC')
        ->paginate(2);
    }

    public function paginationView()
    {
        return 'livewire.pagination';
    }
}
