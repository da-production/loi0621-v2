<?php

namespace App\Http\Livewire\Administrateur;

use App\Models\Steper;
use Livewire\Component;

class SteperWire extends Component
{
    public $content_fr;
    public $content_ar;
    public function render()
    {
        $stepers = $this->fetchAll();
        return view('livewire.administrateur.steper-wire',[
            'stepers'       => $stepers
        ]);
    }

    public function sort($item,$position){
        dd($item,$position);
        $step = $this->query()->findOrFail($item);
        $currentPosition = $step->position;
        $after = $position;
        if($currentPosition == $after){
            return;
        }else{

        }
    }
    
    protected function query(){
        return Steper::query();
    }
    protected function fetchAll()
    {
        return $this->query()->orderBy('position')->get();
    }
}
