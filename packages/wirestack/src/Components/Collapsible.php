<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Collapsible extends Component
{
    public function __construct(
        public ?string $label = null,
        public bool $open = false,
        public string $icon = '',
    ) {}

    public function render(): View
    {
        return view('ws::components.collapsible');
    }
}
