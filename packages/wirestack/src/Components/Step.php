<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Step extends Component
{
    public function __construct(
        public int $number = 1,
        public ?string $title = null,
        public ?string $description = null,
        public string $status = 'pending',
        public string $icon = '',
        public bool $last = false,
    ) {}

    public function render(): View
    {
        return view('ws::components.step');
    }
}
