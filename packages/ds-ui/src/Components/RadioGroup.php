<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class RadioGroup extends Component
{
    public function __construct(
        public ?string $label       = null,
        public ?string $hint        = null,
        public ?string $error       = null,
        public string  $orientation = 'vertical',
    ) {}

    public function render(): View
    {
        return view('ds::components.radio-group');
    }
}
