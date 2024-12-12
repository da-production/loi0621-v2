<?php

namespace App\View\Components\Employeur;

use Illuminate\View\Component;

class Inscription2Component extends Component
{
    public $status;
    public $branches;
    public $wilaya;
    public $type;
    public $employeur;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status, $branches, $wilaya, $type, $employeur)
    {
        //
        $this->status       = $status;
        $this->branches     = $branches;
        $this->wilaya       = $wilaya;
        $this->type         = $type;
        $this->employeur    = $employeur;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.employeur.inscription2-component');
    }
}
