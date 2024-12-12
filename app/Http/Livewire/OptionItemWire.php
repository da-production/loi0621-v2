<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class OptionItemWire extends Component
{
    public $name;
    public $value;

    public $option;

    public function mount()
    {
        if($this->option->value == '1' || $this->option->value == '0'){
            $this->value = $this->option->value ? true : false;
        }else{
            $this->value = $this->option->value;
        }
        
    }

    public function render()
    {
        return view('livewire.option-item-wire');
    }

    public function update()
    {
        Option::where([
            ['name',$this->option->name],
            ['instance',$this->option->instance]
        ])
        ->update([
            'value' => $this->value
        ]);
        Cache::forget('options');
    }
}
