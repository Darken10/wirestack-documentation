<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Breadcrumb extends Component
{
    public function __construct(
        public array $items = [],
        public string $separator = '/',
        public string $size = 'sm',
    ) {}

    public function sizeClass(): string
    {
        return match ($this->size) {
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'md' => 'text-base',
            default => 'text-sm',
        };
    }

    public function render(): View
    {
        return view('ds::components.breadcrumb');
    }
}
