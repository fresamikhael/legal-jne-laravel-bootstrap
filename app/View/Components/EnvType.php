<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EnvType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $ukl = null,
        $amdal = null,
        $sppl = null,
    )
    {
        $this->ukl = $ukl;
        $this->amdal = $amdal;
        $this->sppl = $sppl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.env-type');
    }
}