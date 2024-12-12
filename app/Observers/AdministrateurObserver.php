<?php

namespace App\Observers;

use App\Models\Administrateur;
use Illuminate\Support\Facades\Cache;

class AdministrateurObserver
{
    private function cleaCache()
    {
        $total = Administrateur::select('role_id')->paginate(10);
        for($i = 1; $i <= $total->perPage(); $i++){
            Cache::forget("users-administrator-".$i);
        }
    }
    public function created(Administrateur $administrateur)
    {
        //
        $this->cleaCache();
    }

    public function updated(Administrateur $administrateur)
    {
        //
        $this->cleaCache();
    }

    public function deleted(Administrateur $administrateur)
    {
        //
    }

    /**
     * Handle the Administrateur "restored" event.
     *
     * @param  \App\Models\Administrateur  $administrateur
     * @return void
     */
    public function restored(Administrateur $administrateur)
    {
        //
    }

    /**
     * Handle the Administrateur "force deleted" event.
     *
     * @param  \App\Models\Administrateur  $administrateur
     * @return void
     */
    public function forceDeleted(Administrateur $administrateur)
    {
        //
    }
}
