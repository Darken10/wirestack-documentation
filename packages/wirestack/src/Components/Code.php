<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Code extends Component
{
    public function __construct(
        public ?string $language = null,
        public bool $inline = false,
        public bool $copy = false,
    ) {}

    public function render(): View
    {
        return view('ws::components.code');
    }
}
