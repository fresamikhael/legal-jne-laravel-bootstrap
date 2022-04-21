<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $name;
    public $labelClass;
    public $fieldClass;
    public $inputClass;
    public $placeholder;
    public $disabled;
    public $required;
    public $hidden;
    public $value;
    public $readOnly;
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
        $placeholder = null,
        $disabled = null,
        $required = null,
        $fieldClass = null,
        $hidden = null,
        $value = null,
        $readOnly = null,
    )
    {
        $this->label = $label;
        $this->name = $name;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
        $this->required = $required;
        $this->fieldClass = $fieldClass;
        $this->hidden = $hidden;
        $this->value = $value;
        $this->readOnly = $readOnly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
