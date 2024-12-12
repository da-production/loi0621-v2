<?php

namespace App\View\Components\Employeur\subvention\notifications;

use Illuminate\View\Component;

class ConfirmationARComponent extends Component
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
        return view('components.employeur.subvention.notifications.confirmation-a-r-component');
    }
}
