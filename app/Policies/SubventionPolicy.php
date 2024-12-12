<?php

namespace App\Policies;

use App\Models\Administrateur;
use App\Models\Subvention;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubventionPolicy
{
    use HandlesAuthorization;

    public function viewAny(Administrateur $user)
    {
        return mypolicy('subvention','view-any');
    }

    public function view(Administrateur $user)
    {
        return mypolicy('subvention','view');
    }

    public function create(Administrateur $user)
    {
        return mypolicy('subvention','create');
    }

    public function update(Administrateur $user)
    {
        return mypolicy('subvention','update');
    }

    public function updateDossier(Administrateur $user, Subvention $formation)
    {
        if(mypolicy('formation','update-dossier')){
            return $user->cod_wilaya == $formation->intervenant;
        }
    }
}
