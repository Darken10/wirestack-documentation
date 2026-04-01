<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Stack extends Component
{
    public function __construct(
        public string $gap = '4',
        public string $align = 'stretch',
    ) {}

    public function gapClass(): string
    {
        return "space-y-{$this->gap}";
    }

    public function alignClass(): string
    {
        return match ($this->align) {
            'start' => 'items-start',
            'center' => 'items-center',
            'end' => 'items-end',
            'stretch' => 'items-stretch',
            default => 'items-stretch',
        };
    }

    public function render(): View
    {
        return view('ds::components.stack');
    }
}
