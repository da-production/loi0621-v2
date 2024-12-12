<?php

namespace App\Policies;

use App\Models\Administrateur;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeurPolicy
{
    use HandlesAuthorization;

    public function viewAny(Administrateur $user)
    {
        return mypolicy('employeur','view-any');
    }

    public function view(Administrateur $user)
    {
        return mypolicy('employeur','view');
    }

    public function create(User $user)
    {
        return mypolicy('employeur','create');
    }
    
    public function update(Administrateur $user)
    {
        return mypolicy('employeur','update');
    }

    public function sendAnEmail()
    {
        return mypolicy('employeur','send-an-email');
    }

}
