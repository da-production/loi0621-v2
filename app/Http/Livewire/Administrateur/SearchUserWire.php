<?php

namespace App\Http\Livewire\Administrateur;

use App\Models\Administrateur;
use Livewire\Component;

class SearchUserWire extends Component
{
    public $message;
    public $s;
    public function render()
    {
        $users = $this->fetchAll($this->s);
        return view('livewire.administrateur.search-user-wire', compact(['users']));
    }

    public function updated(){
        $this->validate([
            's'     => 'min:4'
        ]);
    }

    public function fetchAll($s)
    {
        if(is_null($this->s) || strlen($this->s) <= 3){
            return [];
        }
        $where= [
            ['email','LIKE','%'.$s.'%']
        ];
        return Administrateur::where($where)
        ->orWhere([
            ['username','LIKE','%'.$s.'%'],
        ])
        ->get();
    }
}
