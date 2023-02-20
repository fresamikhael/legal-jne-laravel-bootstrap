<?php

namespace App\View\Components;

use App\Models\Province;
use Illuminate\View\Component;

class AdsType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $skpd = null,
        $tlbbr = null,
        $ipr = null,
        $imbbr = null,
    )
    {
        $this->skpd = $skpd;
        $this->tlbbr = $tlbbr;
        $this->ipr = $ipr;
        $this->imbbr = $imbbr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $province = Province::orderBy('name', 'ASC')->get();
        return view('components.ads-type', compact('province'));
    }
}
