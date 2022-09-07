<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PartnerType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $budget = null,
        $ham = null,
        $director = null,
        $share = null,
        $npwp = null,
        $nib = null,
        $commissioner = null,
        $budget1 = null,
        $ham1 = null,
        $director1 = null,
        $share1 = null,
        $npwp1 = null,
        $nib1 = null,
        $commissioner1 = null,
        $budget2 = null,
        $ham2 = null,
        $director2 = null,
        $share2 = null,
        $npwp2 = null,
        $nib2 = null,
        $commissioner2 = null,
    )
    {
        $this->budget = $budget;
        $this->ham = $ham;
        $this->director = $director;
        $this->share = $share;
        $this->npwp = $npwp;
        $this->nib = $nib;
        $this->commissioner = $commissioner;
        $this->budget1 = $budget1;
        $this->ham1 = $ham1;
        $this->director1 = $director1;
        $this->share1 = $share1;
        $this->npwp1 = $npwp1;
        $this->nib1 = $nib1;
        $this->commissioner1 = $commissioner1;
        $this->budget2 = $budget2;
        $this->ham2 = $ham2;
        $this->director2 = $director2;
        $this->share2 = $share2;
        $this->npwp2 = $npwp2;
        $this->nib2 = $nib2;
        $this->commissioner2 = $commissioner2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partner-type');
    }
}
