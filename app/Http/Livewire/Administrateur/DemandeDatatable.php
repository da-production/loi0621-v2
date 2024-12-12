<?php

namespace App\Http\Livewire\Administrateur;

use App\Models\Subvention;
use Livewire\Component;
use Livewire\WithPagination;

class DemandeDatatable extends Component
{
    use WithPagination;
    public $entity = 'subvention';
    public $model;

    public $paginate = 10;
    public $order;
    public $decision_dos;

    public function mount($entity = "subvention"){
        $this->model = "App\Models\\".ucfirst($entity);
        if (!class_exists($this->model)) {
            throw new \ErrorException("The Entity $entity does not exist");
        }
    }

    public function render()
    {
        $demandes = $this->fetchData();
        return view('livewire.administrateur.demande-datatable',[
            'demandes' => $demandes
        ]);
    }


    public function fetchData()
    {
        $auth = auth()->user();
        $where = [];
        $query = $this->model::query();
        
        if($auth->cannot('view-any',$this->model)){
            if($auth->can('view',$this->model)){
                array_push($where,['intervenant',$auth->cod_wilaya]);
            }else{
                abort(403);
            }
        }

        if(!is_null($this->decision_dos) && !empty($this->decision_dos)){
            $decisions = ['A'=>1,'R'=>0];
            if(key_exists($this->decision_dos,$decisions)){
                $query->where('decision_dos',(int)$decisions[$this->decision_dos]);
            }
        }
        if(!is_null($this->order) && !empty($this->order)){
            
            $query->orderBy('created_at',$this->order);
        }
        return $query->where($where)
        ->with(['employeur.branche','employeur.statuJuridique','files'])
        ->paginate($this->paginate);

    }

    public function paginationView()
    {
        return 'vendor/livewire/datatable';
    }
}
