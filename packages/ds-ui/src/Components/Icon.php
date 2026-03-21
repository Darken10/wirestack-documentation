<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Icon extends Component
{
    public string $sizeClass;

    public function __construct(
        public string $name,
        public string $size = 'md',
        public string $variant = 'outline',
    ) {
        $this->sizeClass = $this->resolveSize();
    }

    protected function resolveSize(): string
    {
        return match ($this->size) {
            'xs' => 'h-3 w-3',
            'sm' => 'h-4 w-4',
            'md' => 'h-5 w-5',
            'lg' => 'h-6 w-6',
            'xl' => 'h-8 w-8',
            default => 'h-5 w-5',
        };
    }

    public function render(): View
    {
        return view('ds::components.icon');
    }
}
