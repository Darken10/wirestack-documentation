<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Kbd extends Component
{
    public function __construct(
        public string $size = 'md',
    ) {}

    public function sizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'px-1.5 py-0.5 text-xs min-w-[1.25rem]',
            'md' => 'px-2 py-1 text-xs min-w-[1.5rem]',
            'lg' => 'px-2.5 py-1 text-sm min-w-[1.75rem]',
            default => 'px-2 py-1 text-xs min-w-[1.5rem]',
        };
    }

    public function render(): View
    {
        return view('ds::components.kbd');
    }
}
