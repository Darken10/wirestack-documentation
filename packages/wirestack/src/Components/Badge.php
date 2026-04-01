<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Badge extends Component
{
    public array $variantClasses;

    public function __construct(
        public string $variant = '',
        public string $color = '',
        public string $size = '',
        public string $rounded = 'full',
        public string $icon = '',
        public bool $dot = false,
        public bool $dismiss = false,
    ) {
        $defaults = config('ds.defaults.badge', []);
        $this->variant = $variant ?: ($defaults['variant'] ?? 'soft');
        $this->color = $color ?: ($defaults['color'] ?? 'primary');
        $this->size = $size ?: ($defaults['size'] ?? 'sm');
        $this->variantClasses = $this->resolveClasses();
    }

    protected function resolveClasses(): array
    {
        $base = 'inline-flex items-center gap-1 font-medium whitespace-nowrap';

        $sizes = match ($this->size) {
            'xs' => 'text-xs px-1.5 py-0.5',
            'sm' => 'text-xs px-2 py-0.5',
            'md' => 'text-sm px-2.5 py-1',
            'lg' => 'text-sm px-3 py-1.5',
            default => 'text-xs px-2 py-0.5',
        };

        $radius = match ($this->rounded) {
            'none' => 'rounded-none',
            'sm' => 'rounded-sm',
            'md' => 'rounded-md',
            'lg' => 'rounded-lg',
            'full' => 'rounded-full',
            default => 'rounded-full',
        };

        $colorMap = [
            'primary' => ['soft' => 'bg-blue-50 text-blue-700 dark:bg-blue-950 dark:text-blue-300',        'solid' => 'bg-blue-600 text-white',   'outline' => 'border border-blue-600 text-blue-600',   'dot' => 'bg-blue-500'],
            'secondary' => ['soft' => 'bg-violet-50 text-violet-700 dark:bg-violet-950 dark:text-violet-300', 'solid' => 'bg-violet-600 text-white', 'outline' => 'border border-violet-600 text-violet-600', 'dot' => 'bg-violet-500'],
            'neutral' => ['soft' => 'bg-zinc-100 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-300',        'solid' => 'bg-zinc-600 text-white',   'outline' => 'border border-zinc-400 text-zinc-600 dark:border-zinc-600 dark:text-zinc-300', 'dot' => 'bg-zinc-500'],
            'success' => ['soft' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-300', 'solid' => 'bg-emerald-600 text-white', 'outline' => 'border border-emerald-600 text-emerald-600', 'dot' => 'bg-emerald-500'],
            'warning' => ['soft' => 'bg-amber-50 text-amber-700 dark:bg-amber-950 dark:text-amber-300',     'solid' => 'bg-amber-500 text-white',  'outline' => 'border border-amber-500 text-amber-600',  'dot' => 'bg-amber-500'],
            'danger' => ['soft' => 'bg-red-50 text-red-700 dark:bg-red-950 dark:text-red-300',             'solid' => 'bg-red-600 text-white',    'outline' => 'border border-red-600 text-red-600',      'dot' => 'bg-red-500'],
            'info' => ['soft' => 'bg-sky-50 text-sky-700 dark:bg-sky-950 dark:text-sky-300',             'solid' => 'bg-sky-600 text-white',    'outline' => 'border border-sky-600 text-sky-600',      'dot' => 'bg-sky-500'],
        ];

        $map = $colorMap[$this->color] ?? $colorMap['primary'];
        $colorCls = $map[$this->variant] ?? $map['soft'];
        $dotCls = $map['dot'];

        return compact('base', 'sizes', 'radius', 'colorCls', 'dotCls');
    }

    public function render(): View
    {
        return view('ds::components.badge');
    }
}
