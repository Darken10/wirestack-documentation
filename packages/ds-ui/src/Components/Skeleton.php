<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Skeleton extends Component
{
    public function __construct(
        public string $variant = 'line',
        public string $width = 'full',
        public string $height = '4',
        public int $lines = 3,
        public bool $circle = false,
        public ?string $class = null,
    ) {}

    public function baseClasses(): string
    {
        return 'animate-pulse bg-zinc-200 dark:bg-zinc-700 rounded';
    }

    public function dimensionClasses(): string
    {
        $w = match ($this->width) {
            'full' => 'w-full',
            '3/4' => 'w-3/4',
            '1/2' => 'w-1/2',
            '1/4' => 'w-1/4',
            default => "w-{$this->width}",
        };

        $h = "h-{$this->height}";

        return "{$w} {$h}";
    }

    public function render(): View
    {
        return view('ds::components.skeleton');
    }
}
