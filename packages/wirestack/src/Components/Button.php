<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Button extends Component
{
    public string $tag;

    public string $type;

    public array $variantClasses;

    public function __construct(
        public string $variant = '',
        public string $color = '',
        public string $size = '',
        public string $rounded = 'md',
        public bool $loading = false,
        public bool $disabled = false,
        public bool $full = false,
        public bool $square = false,
        public string $icon = '',
        public string $iconTrailing = '',
        public ?string $href = null,
        public string $buttonType = 'button',
        public ?string $confirm = null,
    ) {
        $defaults = config('ds.defaults.button', []);
        $this->variant = $variant ?: ($defaults['variant'] ?? 'solid');
        $this->color = $color ?: ($defaults['color'] ?? 'primary');
        $this->size = $size ?: ($defaults['size'] ?? 'md');
        $this->tag = $href ? 'a' : 'button';
        $this->type = $buttonType;
        $this->variantClasses = $this->resolveClasses();
    }

    protected function resolveClasses(): array
    {
        $base = 'inline-flex items-center justify-center font-medium transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 select-none cursor-pointer';
        $full = $this->full ? 'w-full' : '';
        $disabledCls = $this->disabled || $this->loading ? 'opacity-60 pointer-events-none' : '';

        $sizes = match ($this->size) {
            'xs' => 'text-xs px-2.5 py-1 gap-1',
            'sm' => 'text-sm px-3 py-1.5 gap-1.5',
            'md' => 'text-sm px-4 py-2 gap-2',
            'lg' => 'text-base px-5 py-2.5 gap-2',
            'xl' => 'text-base px-6 py-3 gap-2.5',
            default => 'text-sm px-4 py-2 gap-2',
        };

        $squareSizes = match ($this->size) {
            'xs' => 'h-6 w-6',
            'sm' => 'h-8 w-8',
            'md' => 'h-9 w-9',
            'lg' => 'h-10 w-10',
            'xl' => 'h-12 w-12',
            default => 'h-9 w-9',
        };

        $radius = match ($this->rounded) {
            'none' => 'rounded-none',
            'sm' => 'rounded-sm',
            'md' => 'rounded-md',
            'lg' => 'rounded-lg',
            'xl' => 'rounded-xl',
            'full' => 'rounded-full',
            default => 'rounded-md',
        };

        $colors = [
            'primary' => ['solid' => 'bg-blue-600 text-white hover:bg-blue-700 active:bg-blue-800 focus-visible:ring-blue-500',      'outline' => 'border border-blue-600 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-950 focus-visible:ring-blue-500', 'ghost' => 'text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-950 focus-visible:ring-blue-500', 'soft' => 'bg-blue-50 text-blue-700 hover:bg-blue-100 dark:bg-blue-950 dark:text-blue-300 dark:hover:bg-blue-900 focus-visible:ring-blue-500', 'link' => 'text-blue-600 hover:underline p-0 focus-visible:ring-blue-500'],
            'secondary' => ['solid' => 'bg-violet-600 text-white hover:bg-violet-700 active:bg-violet-800 focus-visible:ring-violet-500',  'outline' => 'border border-violet-600 text-violet-600 hover:bg-violet-50 dark:hover:bg-violet-950 focus-visible:ring-violet-500', 'ghost' => 'text-violet-600 hover:bg-violet-50 dark:hover:bg-violet-950 focus-visible:ring-violet-500', 'soft' => 'bg-violet-50 text-violet-700 hover:bg-violet-100 dark:bg-violet-950 dark:text-violet-300 focus-visible:ring-violet-500', 'link' => 'text-violet-600 hover:underline p-0 focus-visible:ring-violet-500'],
            'neutral' => ['solid' => 'bg-zinc-800 text-white hover:bg-zinc-900 active:bg-zinc-950 dark:bg-zinc-200 dark:text-zinc-900 dark:hover:bg-zinc-100 focus-visible:ring-zinc-500',  'outline' => 'border border-zinc-300 text-zinc-700 hover:bg-zinc-50 dark:border-zinc-600 dark:text-zinc-300 dark:hover:bg-zinc-800 focus-visible:ring-zinc-500', 'ghost' => 'text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-800 focus-visible:ring-zinc-500', 'soft' => 'bg-zinc-100 text-zinc-800 hover:bg-zinc-200 dark:bg-zinc-800 dark:text-zinc-200 dark:hover:bg-zinc-700 focus-visible:ring-zinc-500', 'link' => 'text-zinc-700 dark:text-zinc-300 hover:underline p-0 focus-visible:ring-zinc-500'],
            'success' => ['solid' => 'bg-emerald-600 text-white hover:bg-emerald-700 active:bg-emerald-800 focus-visible:ring-emerald-500', 'outline' => 'border border-emerald-600 text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-950 focus-visible:ring-emerald-500', 'ghost' => 'text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-950 focus-visible:ring-emerald-500', 'soft' => 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100 dark:bg-emerald-950 dark:text-emerald-300 focus-visible:ring-emerald-500', 'link' => 'text-emerald-600 hover:underline p-0 focus-visible:ring-emerald-500'],
            'warning' => ['solid' => 'bg-amber-500 text-white hover:bg-amber-600 active:bg-amber-700 focus-visible:ring-amber-400',   'outline' => 'border border-amber-500 text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-950 focus-visible:ring-amber-400', 'ghost' => 'text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-950 focus-visible:ring-amber-400', 'soft' => 'bg-amber-50 text-amber-700 hover:bg-amber-100 dark:bg-amber-950 dark:text-amber-300 focus-visible:ring-amber-400', 'link' => 'text-amber-600 hover:underline p-0 focus-visible:ring-amber-400'],
            'danger' => ['solid' => 'bg-red-600 text-white hover:bg-red-700 active:bg-red-800 focus-visible:ring-red-500',       'outline' => 'border border-red-600 text-red-600 hover:bg-red-50 dark:hover:bg-red-950 focus-visible:ring-red-500', 'ghost' => 'text-red-600 hover:bg-red-50 dark:hover:bg-red-950 focus-visible:ring-red-500', 'soft' => 'bg-red-50 text-red-700 hover:bg-red-100 dark:bg-red-950 dark:text-red-300 focus-visible:ring-red-500', 'link' => 'text-red-600 hover:underline p-0 focus-visible:ring-red-500'],
            'info' => ['solid' => 'bg-sky-600 text-white hover:bg-sky-700 active:bg-sky-800 focus-visible:ring-sky-500',        'outline' => 'border border-sky-600 text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-950 focus-visible:ring-sky-500', 'ghost' => 'text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-950 focus-visible:ring-sky-500', 'soft' => 'bg-sky-50 text-sky-700 hover:bg-sky-100 dark:bg-sky-950 dark:text-sky-300 focus-visible:ring-sky-500', 'link' => 'text-sky-600 hover:underline p-0 focus-visible:ring-sky-500'],
        ];

        $colorMap = $colors[$this->color] ?? $colors['primary'];
        $colorCls = $colorMap[$this->variant] ?? $colorMap['solid'];

        return [
            'base' => $base,
            'size' => $this->square ? $squareSizes : $sizes,
            'radius' => $radius,
            'color' => $colorCls,
            'full' => $full,
            'disabled' => $disabledCls,
        ];
    }

    public function render(): View
    {
        return view('ds::components.button');
    }
}
