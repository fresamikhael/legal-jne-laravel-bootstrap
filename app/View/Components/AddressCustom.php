<?php

namespace App\View\Components;

use App\Models\Province;
use Illuminate\View\Component;

class AddressCustom extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $label;
    public $classLabel;
    public $classField;

    public function __construct($name, $label, $classLabel, $classField)
    {
        $this->name = $name;
        $this->label = $label;
        $this->classLabel = $classLabel;
        $this->classField = $classField;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $province = Province::orderBy('name', 'ASC')->get();
        return view('components.address-custom', compact('province'));
    }
}
