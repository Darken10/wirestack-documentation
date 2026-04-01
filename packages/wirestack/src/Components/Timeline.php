<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Timeline extends Component
{
    public function __construct(
        public string $variant = 'default',
        public string $color = 'primary',
    ) {}

    public function render(): View
    {
        return view('ws::components.timeline');
    }
}
