<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Toggle extends Component
{
    public string $trackClasses;

    public string $thumbClasses;

    public function __construct(
        public string $color = 'primary',
        public string $size = 'md',
        public ?string $label = null,
        public ?string $hint = null,
        public ?string $error = null,
        public bool $disabled = false,
        public ?string $id = null,
        public ?string $name = null,
        public bool $checked = false,
    ) {
        $this->trackClasses = $this->resolveTrack();
        $this->thumbClasses = $this->resolveThumb();
    }

    protected function resolveTrack(): string
    {
        $size = match ($this->size) {
            'sm' => 'w-8 h-4',
            'md' => 'w-10 h-5',
            'lg' => 'w-12 h-6',
            default => 'w-10 h-5',
        };

        $color = match ($this->color) {
            'primary' => 'peer-checked:bg-blue-600',
            'secondary' => 'peer-checked:bg-violet-600',
            'success' => 'peer-checked:bg-emerald-600',
            'danger' => 'peer-checked:bg-red-600',
            'warning' => 'peer-checked:bg-amber-500',
            default => 'peer-checked:bg-blue-600',
        };

        return "{$size} {$color} bg-zinc-300 dark:bg-zinc-600 rounded-full transition-colors cursor-pointer peer-disabled:opacity-50 peer-disabled:cursor-not-allowed peer-focus-visible:ring-2 peer-focus-visible:ring-offset-2 peer-focus-visible:ring-blue-500";
    }

    protected function resolveThumb(): string
    {
        return match ($this->size) {
            'sm' => 'absolute left-0.5 top-0.5 h-3 w-3',
            'md' => 'absolute left-0.5 top-0.5 h-4 w-4',
            'lg' => 'absolute left-0.5 top-0.5 h-5 w-5',
            default => 'absolute left-0.5 top-0.5 h-4 w-4',
        };
    }

    public function translateClass(): string
    {
        return match ($this->size) {
            'sm' => 'peer-checked:translate-x-4',
            'md' => 'peer-checked:translate-x-5',
            'lg' => 'peer-checked:translate-x-6',
            default => 'peer-checked:translate-x-5',
        };
    }

    public function render(): View
    {
        return view('ds::components.toggle');
    }
}
