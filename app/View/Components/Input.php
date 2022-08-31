<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $labelClass;
    public $inputClass;
    public $fieldClass;
    public $label;
    public $type;
    public $name;
    public $id;
    public $placeholder;
    public $disabled;
    public $required;
    public $prefix;
    public $postfix;
    public $hidden;
    public $value;
    public $readOnly;
    public $option;
    public $multiple;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $inputClass = null,
        $labelClass = null,
        $fieldClass = null,
        $label = null,
        $type = null,
        $name = null,
        $id = null,
        $placeholder = null,
        $disabled = null,
        $required = null,
        $prefix = null,
        $postfix = null,
        $hidden = null,
        $value = null,
        $readOnly = null,
        $option = null,
        $multiple = null,

    )
    {
        $this->inputClass = $inputClass;
        $this->labelClass = $labelClass;
        $this->fieldClass = $fieldClass;
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
        $this->required = $required;
        $this->prefix = $prefix;
        $this->postfix = $postfix;
        $this->hidden = $hidden;
        $this->value = $value;
        $this->readOnly = $readOnly;
        $this->option = $option;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
