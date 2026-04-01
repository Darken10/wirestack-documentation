<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Card extends Component
{
    public string $cardClasses;

    public function __construct(
        public string $variant = '',
        public string $padding = '',
        public string $rounded = 'xl',
        public bool $hover = false,
        public bool $shadow = false,
        public string $color = 'white',
    ) {
        $defaults = config('ds.defaults.card', []);
        $this->variant = $variant ?: ($defaults['variant'] ?? 'bordered');
        $this->padding = $padding ?: ($defaults['padding'] ?? 'md');
        $this->cardClasses = $this->resolveClasses();
    }

    protected function resolveClasses(): string
    {
        $base = 'overflow-hidden transition-all';

        $radius = match ($this->rounded) {
            'none' => 'rounded-none',
            'sm' => 'rounded-sm',
            'md' => 'rounded-md',
            'lg' => 'rounded-lg',
            'xl' => 'rounded-xl',
            '2xl' => 'rounded-2xl',
            default => 'rounded-xl',
        };

        $variant = match ($this->variant) {
            'bordered' => 'border border-zinc-200 dark:border-zinc-800',
            'elevated' => 'shadow-lg',
            'flat' => 'bg-zinc-50 dark:bg-zinc-900',
            'ghost' => '',
            default => 'border border-zinc-200 dark:border-zinc-800',
        };

        $bg = match ($this->color) {
            'white' => 'bg-white dark:bg-zinc-900',
            'neutral' => 'bg-zinc-50 dark:bg-zinc-900',
            'primary' => 'bg-blue-50 dark:bg-blue-950 border-blue-200 dark:border-blue-800',
            default => 'bg-white dark:bg-zinc-900',
        };

        $shadow = $this->shadow ? 'shadow-md' : '';
        $hoverCls = $this->hover ? 'hover:shadow-md hover:-translate-y-0.5 cursor-pointer' : '';

        return implode(' ', array_filter([$base, $radius, $variant, $bg, $shadow, $hoverCls]));
    }

    public function paddingClass(): string
    {
        return match ($this->padding) {
            'none' => '',
            'sm' => 'p-4',
            'md' => 'p-6',
            'lg' => 'p-8',
            'xl' => 'p-10',
            default => 'p-6',
        };
    }

    public function render(): View
    {
        return view('ds::components.card');
    }
}
