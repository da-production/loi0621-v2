<?php

namespace App\Listeners;

use App\Events\AdministrateurUpdatedEvent;
use App\Models\Administrateur;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class AdministrateurUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(AdministrateurUpdatedEvent $event)
    {
        $total = Administrateur::select('role_id')->paginate(10);
        for($i = 1; $i <= $total->perPage(); $i++){
            Cache::forget("users-administrator-".$i);
        }
    }
}
