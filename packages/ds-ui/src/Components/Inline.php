<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Inline extends Component
{
    public function __construct(
        public string $gap = '3',
        public string $align = 'center',
        public string $justify = 'start',
        public bool $wrap = true,
    ) {}

    public function render(): View
    {
        return view('ds::components.inline');
    }
}
