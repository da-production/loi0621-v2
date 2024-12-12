<?php

namespace App\Policies;

use App\Models\Administrateur;
use App\Models\Option;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OptionPolicy
{
    use HandlesAuthorization;

    public function viewAny(Administrateur $user)
    {
        return mypolicy('option','view-any');
    }

    
}
