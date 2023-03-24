<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JenisVendor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $value;
     public $valueNew;
    public function __construct($value = null, $valueNew = null)
    {
        //
        $this->value = $value;
        $this->valueNew = $valueNew;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.jenis-vendor');
    }
}
