<?php

namespace App\Http\Livewire\Admin;

use App\Models\Formation;
use App\Models\Subvention;
use Carbon\Carbon;
use Livewire\Component;

class AnnulerDemandeWire extends Component
{
    public $type; // subvention ou formation
    public $cod_demande;
    protected $listeners = ['closeD'];
    
    public function mount($type, $cod_demande){
        $this->type = $type;
        $this->cod_demande = $cod_demande;
    }
    public function render()
    {
        return view('livewire.admin.annuler-demande-wire');
    }

    public function closeD(){
        if($this->type == 'subvention'){
            Subvention::where('cod_demande', $this->cod_demande)->update([
                'annuler'       => 1,
                'annuler_at'    => Carbon::now()->format('Y-d-m H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-d-m H:i:s'),
            ]);
            $this->dispatchBrowserEvent('demande-annuler');
        }else{
            Formation::where('cod_demande', $this->cod_demande)->update([
                'annuler'       => 1,
                'annuler_at'    => Carbon::now()->format('Y-d-m H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-d-m H:i:s'),
            ]);
            $this->dispatchBrowserEvent('demande-annuler');
        }
    }
}
