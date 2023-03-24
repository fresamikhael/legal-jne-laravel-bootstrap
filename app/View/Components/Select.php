<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $name;
    public $labelClass;
    public $option;
    public $inputClass;
    public $fieldClass;
    public $required;
    public $disabled;
    public $value;
    public $hidden;
    public $multiple;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label = null,
        $name = null,
        $labelClass = null,
        $inputClass = null,
        $fieldClass = null,
        $required = null,
        $disabled = null,
        $option = null,
        $value = null,
        $hidden = null,
        $multiple = null,

    )
    {
        $this->label = $label;
        $this->name = $name;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
        $this->fieldClass = $fieldClass;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->option = $option;
        $this->value = $value;
        $this->hidden = $hidden;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select');
    }
}
