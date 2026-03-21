<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ProgressBar extends Component
{
    public function __construct(
        public array $segments = [],
        public string $size = 'md',
    ) {}

    public function heightClass(): string
    {
        return match ($this->size) {
            'sm' => 'h-2',
            'md' => 'h-3',
            'lg' => 'h-4',
            default => 'h-3',
        };
    }

    public function render(): View
    {
        return view('ds::components.progress-bar');
    }
}
