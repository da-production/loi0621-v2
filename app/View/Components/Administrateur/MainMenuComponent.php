<?php

namespace App\View\Components\Administrateur;

use Illuminate\View\Component;

class MainMenuComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.administrateur.main-menu-component');
    }
}
