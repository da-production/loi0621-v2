<?php

namespace App\View\Components\Employeur\formation\notifications\arabe;

use Illuminate\View\Component;

class ConfirmationComponent extends Component
{
    public $demande;
    public $employeur;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($demande, $employeur)
    {
        $this->demande      = $demande;
        $this->employeur    = $employeur;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.employeur.formation.notifications.arabe.confirmation-component');
    }
}
