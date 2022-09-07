<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AgencyType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $mainbranch = null,
        $branch = null,
        $agency = null,
    )
    {
        $this->mainbranch = $mainbranch;
        $this->branch = $branch;
        $this->agency = $agency;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.agency-type');
    }
}
