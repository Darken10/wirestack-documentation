<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class InputGroup extends Component
{
    public function __construct(
        public ?string $prefix = null,
        public ?string $suffix = null,
        public string $size = 'md',
    ) {}

    public function addonClasses(): string
    {
        $size = match ($this->size) {
            'sm' => 'px-2.5 py-1.5 text-xs',
            'md' => 'px-3 py-2 text-sm',
            'lg' => 'px-4 py-2.5 text-base',
            default => 'px-3 py-2 text-sm',
        };

        return "inline-flex items-center {$size} bg-zinc-50 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 border-zinc-300 dark:border-zinc-700";
    }

    public function render(): View
    {
        return view('ws::components.input-group');
    }
}
