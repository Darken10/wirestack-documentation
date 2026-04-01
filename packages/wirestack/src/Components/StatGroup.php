<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class StatGroup extends Component
{
    public function __construct(
        public int $cols = 4,
        public string $variant = 'bordered',
    ) {}

    public function gridClass(): string
    {
        return match ($this->cols) {
            1 => 'grid-cols-1',
            2 => 'grid-cols-1 sm:grid-cols-2',
            3 => 'grid-cols-1 sm:grid-cols-3',
            4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
            5 => 'grid-cols-2 sm:grid-cols-5',
            default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
        };
    }

    public function render(): View
    {
        return view('ws::components.stat-group');
    }
}
