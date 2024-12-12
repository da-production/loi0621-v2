<?php

namespace App\Http\Livewire\Employeur;

use App\Models\Employeur;
use Livewire\Component;

class UpdateInformationWire extends Component
{
    public $success = false;
    public $email;
    public $mob;
    public $tel;

    public function __construct(){}

    public function mount()
    {
        $this->email = auth()->user()->employeur->email_entreprise;
        $this->mob = auth()->user()->employeur->mob;
        $this->tel = auth()->user()->employeur->tel;
    }
    public function render()
    {
        return view('livewire.employeur.update-information-wire');
    }

    public function updating()
    {
        $this->success = false;
    }

    public function update()
    {
        $this->validate([
            'email'     => 'required|email',
            'mob'       => 'max:255',
            'tel'       => 'max:255'
        ]);
        $employeur = Employeur::where('code_employeur',auth()->user()->code_employeur)
        ->update([
            'email_entreprise'     => $this->email,
            'mob'       => $this->mob,
            'tel'       => $this->tel
        ]);
        
        if($employeur){
            $this->success = true;
            $this->emit('get');
        }
    }
}
