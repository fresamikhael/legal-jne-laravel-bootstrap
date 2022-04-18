<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $href;
    public $href2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $href = null,
        $href2 = null
    )
    {
        $this->href = $href;
        $this->href2 = $href2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
