<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AreaComponent extends Component
{
    public $area_data;
    /**
     * Create a new component instance.
     */
    public function __construct($area_data)
    {
        $this->area_data = $area_data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.area-component');
    }
}
