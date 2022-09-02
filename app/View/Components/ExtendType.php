<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ExtendType extends Component
{
    public $slf;
    public $reklame;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $slf = null,
        $reklame = null,
    )
    {
        $this->slf = $slf;
        $this->reklame = $reklame;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.extend-type');
    }
}
