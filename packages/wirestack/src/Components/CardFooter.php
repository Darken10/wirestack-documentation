<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CardFooter extends Component
{
    public function __construct(
        public string $padding = 'md',
        public bool $separator = true,
        public string $align = 'right',
    ) {}

    public function paddingClass(): string
    {
        return match ($this->padding) {
            'sm' => 'px-4 py-3',
            'md' => 'px-6 py-4',
            'lg' => 'px-8 py-5',
            default => 'px-6 py-4',
        };
    }

    public function alignClass(): string
    {
        return match ($this->align) {
            'left' => 'justify-start',
            'center' => 'justify-center',
            'right' => 'justify-end',
            'between' => 'justify-between',
            default => 'justify-end',
        };
    }

    public function render(): View
    {
        return view('ds::components.card-footer');
    }
}
