<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalHistory extends Component
{
    public $id;
    public $header;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(

        $id = null,
        $header = null,

    ) {
        $this->id = $id;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-history');
    }
}
