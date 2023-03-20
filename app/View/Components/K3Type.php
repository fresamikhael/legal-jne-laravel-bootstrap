<?php

namespace App\View\Components;

use App\Models\Province;
use Illuminate\View\Component;

class K3Type extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $province = Province::orderBy('name', 'ASC')->get();
        return view('components.k3-type', compact('province'));
    }
}
