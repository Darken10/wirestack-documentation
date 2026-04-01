<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Nav extends Component
{
    public function __construct(
        public string $orientation = 'horizontal',
        public string $variant = 'pills',
        public string $size = 'md',
    ) {}

    public function render(): View
    {
        return view('ds::components.nav');
    }
}
