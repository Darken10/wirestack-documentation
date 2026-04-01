<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AvatarGroup extends Component
{
    public function __construct(
        public int $max = 4,
        public string $size = 'md',
        public string $overlap = 'md',
    ) {}

    public function overlapClass(): string
    {
        return match ($this->overlap) {
            'sm' => '-space-x-2',
            'md' => '-space-x-3',
            'lg' => '-space-x-4',
            default => '-space-x-3',
        };
    }

    public function render(): View
    {
        return view('ws::components.avatar-group');
    }
}
