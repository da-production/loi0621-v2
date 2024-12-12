<?php

namespace App\Providers;

use App\Models\Administrateur;
use App\Models\Formation;
use App\Models\Subvention;
use App\Policies\AdministrateurPolicy;
use App\Policies\EmployeurPolicy;
use App\Policies\FormationPolicy;
use App\Policies\SubventionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Employeur::class => EmployeurPolicy::class,
        Subvention::class => SubventionPolicy::class,
        Formation::class => FormationPolicy::class,
        Administrateur::class => AdministrateurPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
