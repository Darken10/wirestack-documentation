<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Panel extends Component
{
    public function __construct(
        public ?string $title = null,
        public string $variant = 'bordered',
        public string $color = 'neutral',
        public string $padding = 'md',
    ) {}

    public function panelClasses(): string
    {
        $base = 'rounded-lg overflow-hidden';

        $variant = match ($this->variant) {
            'bordered' => 'border border-zinc-200 dark:border-zinc-800',
            'filled' => '',
            default => 'border border-zinc-200 dark:border-zinc-800',
        };

        $color = match ($this->color) {
            'neutral' => 'bg-zinc-50 dark:bg-zinc-900',
            'white' => 'bg-white dark:bg-zinc-900',
            'primary' => 'bg-blue-50 dark:bg-blue-950/50 border-blue-200 dark:border-blue-800',
            'success' => 'bg-emerald-50 dark:bg-emerald-950/50 border-emerald-200 dark:border-emerald-800',
            'warning' => 'bg-amber-50 dark:bg-amber-950/50 border-amber-200 dark:border-amber-800',
            'danger' => 'bg-red-50 dark:bg-red-950/50 border-red-200 dark:border-red-800',
            default => 'bg-zinc-50 dark:bg-zinc-900',
        };

        return "{$base} {$variant} {$color}";
    }

    public function paddingClass(): string
    {
        return match ($this->padding) {
            'none' => '',
            'sm' => 'p-3',
            'md' => 'p-4',
            'lg' => 'p-6',
            default => 'p-4',
        };
    }

    public function render(): View
    {
        return view('ws::components.panel');
    }
}
