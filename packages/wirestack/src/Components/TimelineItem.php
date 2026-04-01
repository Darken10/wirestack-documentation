<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class TimelineItem extends Component
{
    public function __construct(
        public ?string $date = null,
        public ?string $title = null,
        public ?string $description = null,
        public string $icon = 'circle-stack',
        public string $color = 'primary',
        public bool $last = false,
    ) {}

    public function dotColorClass(): string
    {
        return match ($this->color) {
            'primary' => 'bg-blue-600 ring-blue-50 dark:ring-blue-950',
            'secondary' => 'bg-violet-600 ring-violet-50 dark:ring-violet-950',
            'success' => 'bg-emerald-600 ring-emerald-50 dark:ring-emerald-950',
            'warning' => 'bg-amber-500 ring-amber-50 dark:ring-amber-950',
            'danger' => 'bg-red-600 ring-red-50 dark:ring-red-950',
            'neutral' => 'bg-zinc-500 ring-zinc-50 dark:ring-zinc-900',
            default => 'bg-blue-600 ring-blue-50 dark:ring-blue-950',
        };
    }

    public function render(): View
    {
        return view('ds::components.timeline-item');
    }
}
