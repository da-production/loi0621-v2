<?php

namespace App\Policies;

use App\Models\Administrateur;
use App\Models\Formation;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationPolicy
{
    use HandlesAuthorization;

    public function viewAny(Administrateur $user)
    {
        return mypolicy('formation','view-any');
    }

    public function view(Administrateur $user)
    {
        return mypolicy('formation','view');
    }

    public function create(Administrateur $user)
    {
        return mypolicy('formation','create');
    }

    public function update(Administrateur $user)
    {
        return mypolicy('formation','update');
    }

    public function updateDossier(Administrateur $user, Formation $formation)
    {
        if(mypolicy('formation','update-dossier')){
            return $user->cod_wilaya == $formation->intervenant;
        }
    }

}
