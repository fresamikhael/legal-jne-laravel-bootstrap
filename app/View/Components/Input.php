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
    public $placeholder;
    public $disabled;
    public $required;
    public $prefix;

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
        $placeholder = null, 
        $disabled = null, 
        $required = null,
        $prefix = null
    )
    {
        $this->inputClass = $inputClass;
        $this->labelClass = $labelClass;
        $this->fieldClass = $fieldClass;
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
        $this->required = $required;
        $this->prefix = $prefix;
    }

    // public function labelClass()
    // {
    //     if ($this->label) {
    //         return $this->label;
    //     }

    //     return '';
    // }

    // public function typeClass()
    // {
    //     if ($this->type) {
    //         return $this->type;
    //     }

    //     return 'text';
    // }

    // public function nameClass()
    // {
    //     if ($this->name) {
    //         return $this->name;
    //     }

    //     return '';
    // }

    // public function placeholderClass()
    // {
    //     if ($this->placeholder) {
    //         return $this->placeholder;
    //     }

    //     return '';
    // }

    // public function disabledClass()
    // {
    //     if ($this->disabled) {
    //         return 'disabled';
    //     }

    //     return '';
    // }

    // public function requiredClass()
    // {
    //     if ($this->required) {
    //         return 'required';
    //     }

    //     return '';
    // }

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
