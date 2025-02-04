<?php

namespace App\Http\Livewire\Employeur;

use App\Models\Subvention;
use Livewire\Component;

class SearchSubventionAdminWire extends Component
{
    public $s;
    public function render()
    {
        $subventions = $this->fetchAll($this->s);
        return view('livewire.employeur.search-subvention-admin-wire',compact(['subventions']));
    }

    public function updated(){
        $this->validate([
            's'     => 'min:4'
        ]);
    }

    public function fetchAll($s)
    {
        $owner = null;
        if(auth()->user()->role_id != 1){
            $owner = ['code_employeur','LIKE',auth()->user()->cod_wilaya.'%'];
        }
        if(is_null($this->s) || strlen($this->s) <= 3){
            return [];
        }
        return Subvention::when($owner, function($query) use($owner){
            $query->where([$owner]);
        })->where([
            ['cod_demande','LIKE','%'.$s.'%'],
        ])->orWhere('code_employeur','LIKE','%'.$s.'%')
        ->get();
    }
}

