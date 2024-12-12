<?php

namespace App\Policies;

use App\Models\Administrateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdministrateurPolicy
{
    use HandlesAuthorization;

    public function viewAny(Administrateur $user)
    {
        return mypolicy('administrateur','view-any');
    }

    public function view(Administrateur $user)
    {
        return mypolicy('administrateur','view');
    }

    public function create(Administrateur $user)
    {
        return mypolicy('administrateur','create');
    }

    public function update(Administrateur $user)
    {
        return mypolicy('administrateur','update');
    }

    public function delete(Administrateur $user, Administrateur $administrateur)
    {
        //
    }

    public function restore(Administrateur $user, Administrateur $administrateur)
    {
        //
    }

    public function forceDelete(Administrateur $user, Administrateur $administrateur)
    {
        //
    }
}
