<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Avatar extends Component
{
    public string $sizeClasses;

    public string $shapeClasses;

    public string $statusClasses;

    public string $statusDotClasses;

    public string $bgClasses;

    public function __construct(
        public ?string $src = null,
        public string $alt = '',
        public string $initials = '',
        public string $size = '',
        public string $shape = '',
        public string $status = '',
        public string $color = 'neutral',
    ) {
        $defaults = config('ds.defaults.avatar', []);
        $this->size = $size ?: ($defaults['size'] ?? 'md');
        $this->shape = $shape ?: ($defaults['shape'] ?? 'circle');

        $this->sizeClasses = $this->resolveSize();
        $this->shapeClasses = $this->resolveShape();
        $this->statusClasses = $this->resolveStatusPosition();
        $this->statusDotClasses = $this->resolveStatusDot();
        $this->bgClasses = $this->resolveBackground();
    }

    protected function resolveSize(): string
    {
        return match ($this->size) {
            'xs' => 'h-6 w-6 text-xs',
            'sm' => 'h-8 w-8 text-xs',
            'md' => 'h-10 w-10 text-sm',
            'lg' => 'h-12 w-12 text-base',
            'xl' => 'h-16 w-16 text-lg',
            '2xl' => 'h-20 w-20 text-xl',
            default => 'h-10 w-10 text-sm',
        };
    }

    protected function resolveShape(): string
    {
        return match ($this->shape) {
            'circle' => 'rounded-full',
            'square' => 'rounded-none',
            'rounded' => 'rounded-xl',
            default => 'rounded-full',
        };
    }

    protected function resolveStatusPosition(): string
    {
        if (! $this->status) {
            return '';
        }

        $pos = match ($this->size) {
            'xs', 'sm' => 'h-1.5 w-1.5 ring-1',
            'lg', 'xl' => 'h-3.5 w-3.5 ring-2',
            '2xl' => 'h-4 w-4 ring-2',
            default => 'h-2.5 w-2.5 ring-2',
        };

        return "absolute bottom-0 right-0 {$pos} ring-white dark:ring-zinc-900 rounded-full";
    }

    protected function resolveStatusDot(): string
    {
        return match ($this->status) {
            'online' => 'bg-emerald-500',
            'offline' => 'bg-zinc-400',
            'busy' => 'bg-red-500',
            'away' => 'bg-amber-400',
            default => '',
        };
    }

    protected function resolveBackground(): string
    {
        $colors = [
            'neutral' => 'bg-zinc-200 text-zinc-600 dark:bg-zinc-700 dark:text-zinc-300',
            'primary' => 'bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300',
            'secondary' => 'bg-violet-100 text-violet-600 dark:bg-violet-900 dark:text-violet-300',
            'success' => 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900 dark:text-emerald-300',
            'warning' => 'bg-amber-100 text-amber-600 dark:bg-amber-900 dark:text-amber-300',
            'danger' => 'bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-300',
            'info' => 'bg-sky-100 text-sky-600 dark:bg-sky-900 dark:text-sky-300',
        ];

        return $colors[$this->color] ?? $colors['neutral'];
    }

    public function render(): View
    {
        return view('ds::components.avatar');
    }
}
