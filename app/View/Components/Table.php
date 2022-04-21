<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $id;
    public $header;
    public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id = null,
        $header = null,
        $data = null,
    )
    {
        $this->id = $id;
        $this->header = $header;
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
