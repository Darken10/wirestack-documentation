<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CardHeader extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public string $padding = 'md',
        public bool $separator = true,
    ) {}

    public function paddingClass(): string
    {
        return match ($this->padding) {
            'sm' => 'px-4 py-3',
            'md' => 'px-6 py-4',
            'lg' => 'px-8 py-5',
            default => 'px-6 py-4',
        };
    }

    public function render(): View
    {
        return view('ds::components.card-header');
    }
}
