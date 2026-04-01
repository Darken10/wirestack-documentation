<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Accordion extends Component
{
    public function __construct(
        public bool $multiple = false,
        public string $variant = 'bordered',
    ) {}

    public function render(): View
    {
        return view('ws::components.accordion');
    }
}
