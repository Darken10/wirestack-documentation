<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Select extends Component
{
    public function __construct(
        public array $options = [],
        public string $variant = 'bordered',
        public string $size = 'md',
        public ?string $label = null,
        public ?string $hint = null,
        public ?string $error = null,
        public ?string $placeholder = null,
        public bool $disabled = false,
        public bool $required = false,
        public ?string $id = null,
        public ?string $name = null,
    ) {}

    public function wrapperClasses(): string
    {
        $border = $this->error
            ? 'border-red-500 focus-within:ring-1 focus-within:ring-red-500'
            : 'border-zinc-300 dark:border-zinc-700 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500';

        return "relative border rounded-lg bg-white dark:bg-zinc-900 transition-colors {$border}";
    }

    public function selectClasses(): string
    {
        $size = match ($this->size) {
            'sm' => 'text-sm py-1.5 pl-2.5 pr-8',
            'md' => 'text-sm py-2 pl-3 pr-9',
            'lg' => 'text-base py-2.5 pl-3.5 pr-10',
            default => 'text-sm py-2 pl-3 pr-9',
        };

        return "w-full bg-transparent outline-none appearance-none text-zinc-900 dark:text-zinc-100 disabled:opacity-50 disabled:cursor-not-allowed {$size}";
    }

    public function render(): View
    {
        return view('ws::components.select');
    }
}
