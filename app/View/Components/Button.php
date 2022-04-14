<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $buttonClass;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $type = null,
        $buttonClass = null,
        $name = null,
    )
    {
        $this->type = $type;
        $this->buttonClass = $buttonClass;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
