<?php

namespace App\Http\Livewire\Administrateur;

use App\Models\EmployeurMail;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeurMailsWire extends Component
{
    use WithPagination;
    public $code_employeur;
    public function render()
    {
        $mails = EmployeurMail::where('code_employeur',$this->code_employeur)->paginate(5);
        return view('livewire.administrateur.employeur-mails-wire', compact('mails'));
    }

    public function paginationView()
    {
        return 'vendor/livewire/datatable';
    }
}
