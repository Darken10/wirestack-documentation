<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Popover extends Component
{
    public function __construct(
        public string $position = 'bottom',
        public string $align = 'start',
        public string $width = '72',
        public ?string $title = null,
    ) {}

    public function positionClass(): string
    {
        $base = match ($this->position) {
            'top' => 'bottom-full mb-2',
            'bottom' => 'top-full mt-2',
            'left' => 'right-full mr-2 top-0',
            'right' => 'left-full ml-2 top-0',
            default => 'top-full mt-2',
        };

        $align = match ($this->align) {
            'start' => 'left-0',
            'center' => 'left-1/2 -translate-x-1/2',
            'end' => 'right-0',
            default => 'left-0',
        };

        return "{$base} {$align}";
    }

    public function render(): View
    {
        return view('ds::components.popover');
    }
}
