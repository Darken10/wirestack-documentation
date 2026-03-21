<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Progress extends Component
{
    public function __construct(
        public int $value = 0,
        public int $max = 100,
        public string $color = 'primary',
        public string $size = 'md',
        public bool $striped = false,
        public bool $animated = false,
        public bool $showValue = false,
        public ?string $label = null,
    ) {}

    public function percentage(): int
    {
        if ($this->max === 0) {
            return 0;
        }

        return (int) min(100, max(0, ($this->value / $this->max) * 100));
    }

    public function heightClass(): string
    {
        return match ($this->size) {
            'xs' => 'h-1',
            'sm' => 'h-1.5',
            'md' => 'h-2.5',
            'lg' => 'h-4',
            'xl' => 'h-6',
            default => 'h-2.5',
        };
    }

    public function barColorClass(): string
    {
        return match ($this->color) {
            'primary' => 'bg-blue-600',
            'secondary' => 'bg-violet-600',
            'success' => 'bg-emerald-600',
            'warning' => 'bg-amber-500',
            'danger' => 'bg-red-600',
            'info' => 'bg-sky-600',
            default => 'bg-blue-600',
        };
    }

    public function render(): View
    {
        return view('ds::components.progress');
    }
}
