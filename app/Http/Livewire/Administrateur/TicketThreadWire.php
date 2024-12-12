<?php

namespace App\Http\Livewire\Administrateur;

use App\Models\Ticket;
use App\Rules\IfLastTicketClosed;
use Livewire\Component;

class TicketThreadWire extends Component
{
    public $tickets;
    protected $listeners = ['employeurTicket'];
    public $code;
    public $message;
    public $object;

    public function mount()
    {
        if(auth()->guard('web')->check()){
            $this->code = auth()->user()->code_employeur;
            $this->tickets = Ticket::where('code_employeur',$this->code)->get();
        }
    }
    public function render()
    {
        return view('livewire.administrateur.ticket-thread-wire');
    }

    public function employeurTicket($code)
    {
        $this->code = $code;
        $this->tickets = Ticket::where('code_employeur',$code)->get();
    }

    public function send()
    {
        $data = [
            'code_employeur'        => $this->code,
            'objet'                 => $this->object,
            'sujet'                 => $this->message,
            'categorie_id'          => 1,
            'type_id'               => 1,
        ];
        if(auth()->guard('web')->check()){
            $this->validate([
                'object'        => 'required|min:3|max:250',
                'message'         => ['required','min:10','max:250', new IfLastTicketClosed()],
            ]);
            $data['owner'] = 1;
        }

        if(auth()->guard('admin')->check()){
            $this->validate([
                'object'        => 'required|min:3|max:250',
                'message'         => 'required|min:3',
            ]);
            $data['owner'] = 0;
            $data['administrateur_id'] = auth()->user()->id;
        }


        Ticket::create($data);
        $this->resetAll();
    }

    public function resetAll(){
        $this->message = '';
        $this->object = '';
        $this->employeurTicket($this->code);
    }

    public function closeTicket($id)
    {
        Ticket::where('id',$id)->update(['status' => 1]);
        $this->resetAll();
    }
}
