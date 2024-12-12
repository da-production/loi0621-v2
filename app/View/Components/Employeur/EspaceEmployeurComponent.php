<?php

namespace App\View\Components\Employeur;

use Illuminate\View\Component;

class EspaceEmployeurComponent extends Component
{
    public $employeur;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeur)
    {
        //
        $this->employeur = $employeur;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.employeur.espace-employeur-component');
    }
}
