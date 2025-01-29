<?php

namespace App\Http\Livewire;

use App\Models\EmployeurMail;
use App\Models\User;
use App\Notifications\SendToEmployeurNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
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
        try{
            $user->notify(new SendToEmployeurNotification($this->object,$this->message));
            EmployeurMail::create([
                'code_employeur'    => $user->code_employeur,
                'title'             => $this->object,
                'payload'           => $this->message,
                'status'            => 'success',
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            EmployeurMail::create([
                'code_employeur'    => $user->code_employeur,
                'title'             => $this->object,
                'payload'           => $this->message,
                'status'            => 'fail',
            ]);
        }
        $this->resetVar();
    }

    public function resetVar()
    {
        $this->object ='';
        $this->message = '';
    }
}
