<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Section extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public string $padding = 'lg',
        public string $align = 'left',
    ) {}

    public function paddingClass(): string
    {
        return match ($this->padding) {
            'sm' => 'py-8',
            'md' => 'py-12',
            'lg' => 'py-16',
            'xl' => 'py-24',
            default => 'py-16',
        };
    }

    public function render(): View
    {
        return view('ds::components.section');
    }
}
