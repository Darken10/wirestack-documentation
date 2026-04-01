<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CardBody extends Component
{
    public function __construct(
        public string $padding = 'md',
    ) {}

    public function paddingClass(): string
    {
        return match ($this->padding) {
            'none' => '',
            'sm' => 'p-4',
            'md' => 'p-6',
            'lg' => 'p-8',
            default => 'p-6',
        };
    }

    public function render(): View
    {
        return view('ds::components.card-body');
    }
}
