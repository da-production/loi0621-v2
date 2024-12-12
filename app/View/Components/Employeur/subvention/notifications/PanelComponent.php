<?php

namespace App\View\Components\Employeur\subvention\notifications;

use Illuminate\View\Component;

class PanelComponent extends Component
{
    public $demande;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($demande)
    {
        //
        $this->demande  = $demande;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.employeur.subvention.notifications.panel-component');
    }
}
