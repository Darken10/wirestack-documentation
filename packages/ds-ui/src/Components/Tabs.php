<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Tabs extends Component
{
    public function __construct(
        public array $tabs = [],
        public string $variant = 'underline',
        public string $size = 'md',
        public string $color = 'primary',
        public string $align = 'start',
        public bool $full = false,
    ) {}

    public function tabListClasses(): string
    {
        $align = match ($this->align) {
            'center' => 'justify-center',
            'end' => 'justify-end',
            default => 'justify-start',
        };

        $full = $this->full ? 'w-full' : '';

        return match ($this->variant) {
            'underline' => "flex {$align} {$full} border-b border-zinc-200 dark:border-zinc-700",
            'pills' => "flex {$align} {$full} gap-1",
            'boxed' => "flex {$align} {$full} bg-zinc-100 dark:bg-zinc-800 p-1 rounded-lg gap-1",
            default => "flex {$align} {$full} border-b border-zinc-200 dark:border-zinc-700",
        };
    }

    public function activeTabClass(): string
    {
        $color = match ($this->color) {
            'primary' => 'text-blue-600 border-blue-600 dark:text-blue-400 dark:border-blue-400',
            'secondary' => 'text-violet-600 border-violet-600',
            default => 'text-blue-600 border-blue-600',
        };

        return match ($this->variant) {
            'underline' => "border-b-2 {$color}",
            'pills' => 'bg-white dark:bg-zinc-700 shadow-sm text-zinc-900 dark:text-zinc-100',
            'boxed' => 'bg-white dark:bg-zinc-700 shadow-sm rounded-md text-zinc-900 dark:text-zinc-100',
            default => "border-b-2 {$color}",
        };
    }

    public function inactiveTabClass(): string
    {
        return match ($this->variant) {
            'underline' => 'border-b-2 border-transparent text-zinc-500 hover:text-zinc-700 dark:text-zinc-400 dark:hover:text-zinc-200 hover:border-zinc-300',
            'pills' => 'text-zinc-500 hover:text-zinc-700 dark:text-zinc-400 dark:hover:text-zinc-200 hover:bg-white/50 dark:hover:bg-zinc-700/50',
            'boxed' => 'text-zinc-500 hover:text-zinc-700 dark:text-zinc-400 hover:bg-white/50 dark:hover:bg-zinc-700/50 rounded-md',
            default => 'border-b-2 border-transparent text-zinc-500',
        };
    }

    public function tabSizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'text-xs px-2.5 py-1.5',
            'md' => 'text-sm px-4 py-2',
            'lg' => 'text-base px-5 py-2.5',
            default => 'text-sm px-4 py-2',
        };
    }

    public function render(): View
    {
        return view('ds::components.tabs');
    }
}
