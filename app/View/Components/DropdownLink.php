<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownLink extends Component
{
    public $href;

    public function __construct($href)
    {
        $this->href = $href;
    }

    public function render()
    {
        return view('components.dropdown-link');
    }
}