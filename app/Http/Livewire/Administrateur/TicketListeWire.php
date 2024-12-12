<?php

namespace App\Http\Livewire\Administrateur;

use App\Models\Employeur;
use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class TicketListeWire extends Component
{
    use WithPagination;
    public $status;
    public $code_employeur;
    public function render()
    {
        $employeurs = $this->getEmployeurList();
        return view('livewire.administrateur.ticket-liste-wire',compact(['employeurs']));
    }

    public function rules()
    {
        return [
            'code_employeur'        => 'numeric|between:10,10'
        ];
    }
    public function getEmployeurList()
    {
        $admin = auth()->guard('admin')->user();
        $where = [];
        if(!is_null($this->status) && $this->status != ""){
            array_push($where,['status',(int)$this->status]);
        }

        $code = [];

        if(!is_null($this->code_employeur) && !empty($this->code_employeur)){
            // TODO: fix issues with this rules
            // $this->validateOnly('code_employeur', $this->rules());
            array_push($code,['code_employeur',$this->code_employeur]);
        }

        if($admin->role_id != 1){
            array_push($code,['cod_wilaya',$admin->cod_wilaya]);
        }
        
        return Employeur::with(['user','lastTicket'=>function($r) use ($where){
            $r->where($where);
        }])
        ->whereHas('tickets', function($r) use ($where){
            $r->where($where);
        })
        ->where($code)
        
        ->paginate(1);
    }

    public function paginationView()
    {
        return 'vendor.livewire.datatable';
    }
}
