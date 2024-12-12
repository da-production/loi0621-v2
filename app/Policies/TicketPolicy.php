<?php

namespace App\Policies;

use App\Models\Administrateur;
use App\Models\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    public function viewAny(Administrateur $user)
    {
        
        return mypolicy('ticket','view-any');
    }

    
    public function reply(Administrateur $user)
    {
        return mypolicy('ticket','reply');
    }
}
