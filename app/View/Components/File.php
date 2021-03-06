<?php

namespace App\View\Components;

use Illuminate\View\Component;

class File extends Component
{
    public $labelClass;
    public $inputClass;
    public $fieldClass;
    public $label;
    public $type;
    public $name;
    public $required;
    public $option;
    public $multiple;
    public $path;
    public $blank;
    public $hidden;
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
        $required = null,
        $option = null,
        $multiple = null,
        $path = null,
        $blank = null,
        $hidden = null,
    )
    {
        $this->inputClass = $inputClass;
        $this->labelClass = $labelClass;
        $this->fieldClass = $fieldClass;
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->required = $required;
        $this->option = $option;
        $this->multiple = $multiple;
        $this->path = $path;
        $this->blank = $blank;
        $this->hidden = $hidden;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file');
    }
}
