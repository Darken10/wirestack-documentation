<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Checkbox extends Component
{
    public function __construct(
        public string $color = 'primary',
        public string $size = 'md',
        public ?string $label = null,
        public ?string $hint = null,
        public ?string $error = null,
        public bool $disabled = false,
        public bool $required = false,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $value = null,
    ) {}

    public function colorClasses(): string
    {
        return match ($this->color) {
            'primary' => 'text-blue-600 focus:ring-blue-500',
            'secondary' => 'text-violet-600 focus:ring-violet-500',
            'success' => 'text-emerald-600 focus:ring-emerald-500',
            'danger' => 'text-red-600 focus:ring-red-500',
            default => 'text-blue-600 focus:ring-blue-500',
        };
    }

    public function sizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'h-3.5 w-3.5',
            'md' => 'h-4 w-4',
            'lg' => 'h-5 w-5',
            default => 'h-4 w-4',
        };
    }

    public function render(): View
    {
        return view('ds::components.checkbox');
    }
}
