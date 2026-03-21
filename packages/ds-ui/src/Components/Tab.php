<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Tab extends Component
{
    public function __construct(
        public string  $id     = '',
        public string  $label  = '',
        public string  $icon   = '',
        public ?string $badge  = null,
    ) {}

    public function render(): View
    {
        return view('ds::components.tab');
    }
}
