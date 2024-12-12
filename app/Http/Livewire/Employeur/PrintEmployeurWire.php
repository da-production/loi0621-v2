<?php

namespace App\Http\Livewire\Employeur;

use Livewire\Component;

class PrintEmployeurWire extends Component
{
    public $employeur;

    public function mount($employeur)
    {
        $this->employeur = $employeur;
    }
    public function render()
    {
        return view('livewire.employeur.print-employeur-wire');
    }
}
