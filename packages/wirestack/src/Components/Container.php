<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Container extends Component
{
    public function __construct(
        public string $size = 'xl',
        public bool $center = true,
        public string $padding = 'md',
    ) {}

    public function maxWidthClass(): string
    {
        return match ($this->size) {
            'sm' => 'max-w-sm',
            'md' => 'max-w-2xl',
            'lg' => 'max-w-4xl',
            'xl' => 'max-w-6xl',
            '2xl' => 'max-w-7xl',
            'full' => 'max-w-full',
            default => 'max-w-6xl',
        };
    }

    public function paddingClass(): string
    {
        return match ($this->padding) {
            'none' => '',
            'sm' => 'px-4',
            'md' => 'px-4 sm:px-6 lg:px-8',
            'lg' => 'px-6 sm:px-8 lg:px-12',
            default => 'px-4 sm:px-6 lg:px-8',
        };
    }

    public function render(): View
    {
        return view('ds::components.container');
    }
}
