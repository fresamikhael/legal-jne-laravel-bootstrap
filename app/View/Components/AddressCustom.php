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
    public $provinceExist;
    public $regencyExist;
    public $districtExist;
    public $villageExist;
    public $postCodeExist;
    public $addressExist;

    public function __construct($name, $label, $classLabel, $classField, $provinceExist = null, $regencyExist = null, $districtExist = null, $villageExist = null, $postCodeExist = null, $addressExist = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->classLabel = $classLabel;
        $this->classField = $classField;
        $this->provinceExist = $provinceExist;
        $this->regencyExist = $regencyExist;
        $this->districtExist = $districtExist;
        $this->villageExist = $villageExist;
        $this->postCodeExist = $postCodeExist;
        $this->addressExist = $addressExist;
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
