<?php

namespace App\View\Components\Employeur\formation\notifications;

use Illuminate\View\Component;

class TraitementComponent extends Component
{
    public $demande;
    public $employeur;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeur, $demande)
    {
        $this->employeur        = $employeur;
        $this->demande          = $demande;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.employeur.formation.notifications.traitement-component');
    }
}
