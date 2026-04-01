<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Chip extends Component
{
    public string $colorClasses;

    public function __construct(
        public string $color = 'neutral',
        public string $size = 'md',
        public bool $dismissible = false,
        public string $icon = '',
        public bool $active = false,
    ) {
        $this->colorClasses = $this->resolveColor();
    }

    protected function resolveColor(): string
    {
        $active = $this->active;

        $map = [
            'neutral' => $active ? 'bg-zinc-700 text-white' : 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200 dark:bg-zinc-800 dark:text-zinc-300 dark:hover:bg-zinc-700',
            'primary' => $active ? 'bg-blue-600 text-white' : 'bg-blue-50 text-blue-700 hover:bg-blue-100 dark:bg-blue-950 dark:text-blue-300 dark:hover:bg-blue-900',
            'success' => $active ? 'bg-emerald-600 text-white' : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100 dark:bg-emerald-950 dark:text-emerald-300',
            'warning' => $active ? 'bg-amber-500 text-white' : 'bg-amber-50 text-amber-700 hover:bg-amber-100 dark:bg-amber-950 dark:text-amber-300',
            'danger' => $active ? 'bg-red-600 text-white' : 'bg-red-50 text-red-700 hover:bg-red-100 dark:bg-red-950 dark:text-red-300',
        ];

        return $map[$this->color] ?? $map['neutral'];
    }

    public function sizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'text-xs px-2 py-0.5 gap-1',
            'md' => 'text-sm px-2.5 py-1 gap-1.5',
            'lg' => 'text-sm px-3 py-1.5 gap-2',
            default => 'text-sm px-2.5 py-1 gap-1.5',
        };
    }

    public function render(): View
    {
        return view('ws::components.chip');
    }
}
