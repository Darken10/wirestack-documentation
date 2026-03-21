<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Textarea extends Component
{
    public function __construct(
        public string  $variant      = 'bordered',
        public string  $size         = 'md',
        public ?string $label        = null,
        public ?string $hint         = null,
        public ?string $error        = null,
        public ?string $placeholder  = null,
        public bool    $autoresize   = false,
        public int     $rows         = 4,
        public bool    $disabled     = false,
        public bool    $readonly     = false,
        public bool    $required     = false,
        public ?string $id           = null,
        public ?string $name         = null,
    ) {}

    public function wrapperClasses(): string
    {
        $base = 'w-full border rounded-lg transition-colors bg-white dark:bg-zinc-900';
        $border = $this->error
            ? 'border-red-500 focus-within:ring-1 focus-within:ring-red-500'
            : 'border-zinc-300 dark:border-zinc-700 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500';

        return "{$base} {$border}";
    }

    public function textareaClasses(): string
    {
        $size = match ($this->size) {
            'sm'  => 'text-sm p-2.5',
            'md'  => 'text-sm p-3',
            'lg'  => 'text-base p-3.5',
            default => 'text-sm p-3',
        };

        return "w-full bg-transparent outline-none placeholder:text-zinc-400 dark:placeholder:text-zinc-600 text-zinc-900 dark:text-zinc-100 resize-y disabled:opacity-50 disabled:cursor-not-allowed {$size}";
    }

    public function render(): View
    {
        return view('ds::components.textarea');
    }
}
