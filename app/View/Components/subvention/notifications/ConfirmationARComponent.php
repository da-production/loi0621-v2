<?php

namespace App\View\Components\subvention\notifications;

use Illuminate\View\Component;

class ConfirmationARComponent extends Component
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
        return view('components.subvention.notifications.confirmation-a-r-component');
    }
}
