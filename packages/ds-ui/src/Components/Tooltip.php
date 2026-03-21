<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Tooltip extends Component
{
    public function __construct(
        public string  $text      = '',
        public string  $position  = 'top',
        public string  $color     = 'dark',
        public bool    $arrow     = true,
        public int     $delay     = 0,
    ) {}

    public function positionClass(): string
    {
        return match ($this->position) {
            'top'    => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
            'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
            'left'   => 'right-full top-1/2 -translate-y-1/2 mr-2',
            'right'  => 'left-full top-1/2 -translate-y-1/2 ml-2',
            default  => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        };
    }

    public function colorClass(): string
    {
        return match ($this->color) {
            'dark'  => 'bg-zinc-900 text-white dark:bg-zinc-100 dark:text-zinc-900',
            'light' => 'bg-white text-zinc-900 border border-zinc-200 shadow-lg',
            default => 'bg-zinc-900 text-white dark:bg-zinc-100 dark:text-zinc-900',
        };
    }

    public function render(): View
    {
        return view('ds::components.tooltip');
    }
}
