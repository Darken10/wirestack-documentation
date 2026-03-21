<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Range extends Component
{
    public function __construct(
        public string  $color    = 'primary',
        public ?string $label    = null,
        public ?string $hint     = null,
        public int     $min      = 0,
        public int     $max      = 100,
        public int     $step     = 1,
        public bool    $showValue = false,
        public bool    $disabled = false,
        public ?string $id       = null,
        public ?string $name     = null,
    ) {}

    public function accentClass(): string
    {
        return match ($this->color) {
            'primary'   => 'accent-blue-600',
            'secondary' => 'accent-violet-600',
            'success'   => 'accent-emerald-600',
            'warning'   => 'accent-amber-500',
            'danger'    => 'accent-red-600',
            default     => 'accent-blue-600',
        };
    }

    public function render(): View
    {
        return view('ds::components.range');
    }
}
