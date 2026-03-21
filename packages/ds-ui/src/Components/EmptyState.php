<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class EmptyState extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public string $icon = 'inbox',
        public string $size = 'md',
    ) {}

    public function iconSizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'h-8 w-8',
            'md' => 'h-12 w-12',
            'lg' => 'h-16 w-16',
            default => 'h-12 w-12',
        };
    }

    public function render(): View
    {
        return view('ds::components.empty-state');
    }
}
