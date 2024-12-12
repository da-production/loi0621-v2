<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function Index(){
        abort_unless(auth()->user()->can('view-any',Ticket::class),403);
        return view('administrateur.tickets');
    }
    public function Chat()
    {
        $message = request('content');
        $id = request('id');
        $owner = request('owner');
        event(new ChatMessageEvent($message,$id,$owner));
    }
}
