<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Steps extends Component
{
    public function __construct(
        public int $current = 1,
        public string $orientation = 'horizontal',
        public string $color = 'primary',
        public string $size = 'md',
    ) {}

    public function render(): View
    {
        return view('ws::components.steps');
    }
}
