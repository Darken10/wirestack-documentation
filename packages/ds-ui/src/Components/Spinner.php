<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Spinner extends Component
{
    public string $sizeClass;
    public string $colorClass;

    public function __construct(
        public string $size  = 'md',
        public string $color = 'current',
        public string $label = 'Loading...',
    ) {
        $this->sizeClass  = $this->resolveSize();
        $this->colorClass = $this->resolveColor();
    }

    protected function resolveSize(): string
    {
        return match ($this->size) {
            'xs'  => 'h-3 w-3',
            'sm'  => 'h-4 w-4',
            'md'  => 'h-5 w-5',
            'lg'  => 'h-6 w-6',
            'xl'  => 'h-8 w-8',
            '2xl' => 'h-10 w-10',
            default => 'h-5 w-5',
        };
    }

    protected function resolveColor(): string
    {
        return match ($this->color) {
            'primary'   => 'text-blue-600',
            'secondary' => 'text-violet-600',
            'success'   => 'text-emerald-600',
            'warning'   => 'text-amber-500',
            'danger'    => 'text-red-600',
            'info'      => 'text-sky-600',
            'white'     => 'text-white',
            'neutral'   => 'text-zinc-500',
            'current'   => 'text-current',
            default     => 'text-current',
        };
    }

    public function render(): View
    {
        return view('ds::components.spinner');
    }
}
