<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Notifications\SendToEmployeurNotification;
use Livewire\Component;

class SendMailToEmployeurWire extends Component
{
    public $code_employeur;
    public $object;
    public $message;

    public function mount($code_employeur)
    {
        $this->code_employeur = $code_employeur;
    }
    public function render()
    {
        return view('livewire.send-mail-to-employeur-wire');
    }



    public function send()
    {
        $this->validate([
            'object'        => 'required|min:3',
            'message'       => 'required|min:10'
        ]);
        $user = User::where('code_employeur',$this->code_employeur)->first();
        $user->notify(new SendToEmployeurNotification($this->object,$this->message));
        $this->resetVar();
    }

    public function resetVar()
    {
        $this->object ='';
        $this->message = '';
    }
}
