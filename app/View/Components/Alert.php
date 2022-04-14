<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $type = null)
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function typeClass()
    {
        if ($this->type == 'danger') {
            return 'alert-danger';
        } elseif ($this->type == 'warning') {
            return 'alert-warning';
        } elseif ($this->type == 'info') {
            return 'alert-primary';
        } else {
            return 'alert-success';
        }
    }

    public function iconClass()
    {
        if ($this->type == 'danger' || $this->type == 'warning') {
            return 'fa-exclamation-triangle';
        } elseif ($this->type == 'info') {
            return 'fa-info-circle';
        } else {
            return 'fa-check-circle';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
