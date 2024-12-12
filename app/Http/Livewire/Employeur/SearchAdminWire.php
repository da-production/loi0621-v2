<?php

namespace App\Http\Livewire\Employeur;

use App\Models\Employeur;
use App\Models\User;
use Livewire\Component;

class SearchAdminWire extends Component
{
    public $s;
    public $checkbox;

    public function mount()
    {
        $this->checkbox = true;
    }
    public function render()
    {
        $employeurs = $this->fetchAll($this->s);
        return view('livewire.employeur.search-admin-wire',compact(['employeurs']));
    }

    public function fetchAll($s)
    {
        if(is_null($this->s) || strlen($this->s) <= 3){
            return [];
        }
        if($this->checkbox){
            $where= [
                ['code_employeur','LIKE','%'.$s.'%']
            ];
            if(auth()->user()->role_id != 1){
                array_push($where,['cod_wilaya',auth()->user()->cod_wilaya]);
            }
            return Employeur::where($where)
            ->orWhere([
                ['raison_social','LIKE','%'.$s.'%'],
            ])
            ->get();
        }else{
            $where= [
                ['code_employeur','LIKE','%'.$s.'%']
            ];
            if(auth()->user()->role_id != 1){
                array_push($where,['cod_wilaya',auth()->user()->cod_wilaya]);
            }
            return User::where($where)
            ->orWhere([
                ['email','LIKE','%'.$s.'%'],
            ])
            ->get();
        }
    }
}
