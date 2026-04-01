<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CopyButton extends Component
{
    public function __construct(
        public string $text = '',
        public string $size = 'sm',
    ) {}

    public function render(): View
    {
        return view('ws::components.copy-button');
    }
}
