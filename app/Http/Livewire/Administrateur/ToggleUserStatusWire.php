<?php

namespace App\Http\Livewire\Administrateur;

use App\Models\Administrateur;
use Livewire\Component;

class ToggleUserStatusWire extends Component
{
    public $text;
    public $user;
    public $status;

    public function mount()
    {
        $this->text = $this->user->status ? 'Desactiver':'Activer';
        $this->status = $this->user->status;
    }
    public function render()
    {
        return view('livewire.administrateur.toggle-user-status-wire');
    }

    public function toggle()
    {
        Administrateur::where('username',$this->user->username)
        ->update([
            'status'    => $this->status ? 0 : 1
        ]);
        $this->status = !$this->status;
        $this->text = $this->status ? 'Desactiver' : 'Activer';
    }
}
