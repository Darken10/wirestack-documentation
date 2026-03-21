<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Dropdown extends Component
{
    public function __construct(
        public string $align = 'left',
        public string $width = '48',
        public bool $arrow = false,
        public string $trigger = 'click',
    ) {}

    public function alignClass(): string
    {
        return match ($this->align) {
            'right' => 'right-0 left-auto',
            'center' => 'left-1/2 -translate-x-1/2',
            default => 'left-0',
        };
    }

    public function widthClass(): string
    {
        return "w-{$this->width}";
    }

    public function render(): View
    {
        return view('ds::components.dropdown');
    }
}
