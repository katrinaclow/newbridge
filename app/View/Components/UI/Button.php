<?php

namespace App\View\Components\UI;

use Illuminate\View\Component;
use function view;

class Button extends Component
{
    public function render()
    {
        return view('components.ui.button');
    }
}