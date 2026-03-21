<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Divider extends Component
{
    public function __construct(
        public string $orientation = 'horizontal',
        public string $variant     = 'solid',
        public string $color       = 'default',
        public string $align       = 'center',
    ) {}

    public function lineClasses(): string
    {
        $style = match ($this->variant) {
            'dashed' => 'border-dashed',
            'dotted' => 'border-dotted',
            default  => 'border-solid',
        };

        $color = match ($this->color) {
            'light'  => 'border-zinc-100 dark:border-zinc-800',
            'strong' => 'border-zinc-400 dark:border-zinc-500',
            default  => 'border-zinc-200 dark:border-zinc-700',
        };

        return "{$style} {$color}";
    }

    public function render(): View
    {
        return view('ds::components.divider');
    }
}
