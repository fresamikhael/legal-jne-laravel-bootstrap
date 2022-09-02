<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PermitType extends Component
{
    public $imb;
    public $slf;
    public $reklame;
    public $oss;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $imb = null,
        $slf = null,
        $reklame = null,
        $oss = null,
    )
    {
        $this->imb = $imb;
        $this->slf = $slf;
        $this->reklame = $reklame;
        $this->oss = $oss;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.permit-type');
    }
}
