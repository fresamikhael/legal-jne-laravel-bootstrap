<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CorporateType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $budget = null,
        $minister = null,
        $director = null,
        $commissioner = null,
        $share = null,
        $npwp = null,
        $nib = null,
        $sipp = null,
    )
    {
        $this->budget = $budget;
        $this->minister = $minister;
        $this->director = $director;
        $this->commissioner = $commissioner;
        $this->share = $share;
        $this->npwp = $npwp;
        $this->nib = $nib;
        $this->sipp = $sipp;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.corporate-type');
    }
}
