<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AssetType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $sertipikathgb = null,
        $sertipikathm = null,
        $pbb = null,
        $imb = null,
        $slf = null,
        $akta = null,
        $ppjb = null,
        $aph = null,
        $vehicle = null,
        $hkihm = null,
        $hkihc = null,
        $hkidi = null,
    )
    {
        $this->sertipikathgb = $sertipikathgb;
        $this->sertipikathm = $sertipikathm;
        $this->pbb = $pbb;
        $this->imb = $imb;
        $this->slf = $slf;
        $this->akta = $akta;
        $this->ppjb = $ppjb;
        $this->aph = $aph;
        $this->vehicle = $vehicle;
        $this->hkihm = $hkihm;
        $this->hkihc = $hkihc;
        $this->hkidi = $hkidi;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.asset-type');
    }
}
