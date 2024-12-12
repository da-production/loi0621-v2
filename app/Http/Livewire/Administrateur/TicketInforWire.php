<?php

namespace App\Http\Livewire\Administrateur;

use App\Models\Employeur;
use App\Models\User;
use Livewire\Component;

class TicketInforWire extends Component
{
    public $employeur;
    public $users;

    protected $listeners = ['employeurTicket'];

    public function render()
    {
        return view('livewire.administrateur.ticket-infor-wire');
    }

    public function employeurTicket($code)
    {
        $this->employeur = Employeur::with(['tickets','agents'])->where('code_employeur',$code)->first();
    }
}
