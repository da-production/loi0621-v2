<?php

namespace App\Http\Livewire\Employeur;

use App\Models\Employeur;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SidebarInformationWire extends Component
{
    public $employeur;
    public $status;
    public $message;

    protected $listeners  = ['get','get'];
    public function mount()
    {
        // check CNAS Status
        // $response = Http::post("https://teledeclaration.cnas.dz/srv/cnas/cotisant/cnac/".auth()->user()->code_employeur."?usr=cnac&pwd=FD@85_GKwsD01");
        
        // if (is_null($response->json()['cotisant'])) {
        //     $this->status = false;
        //     $this->message = $response->json()['message'];
        // } else {
        //     $this->status = true;
        // }

        $this->get();
    }

    public function get()
    {
        $this->employeur = Employeur::where('code_employeur',auth()->user()->code_employeur)->first();
    }
    public function render()
    {
        return view('livewire.employeur.sidebar-information-wire');
    }
}
