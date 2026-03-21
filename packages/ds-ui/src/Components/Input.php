<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Input extends Component
{
    public string $inputClasses;

    public string $wrapperClasses;

    public bool $hasAddon;

    public function __construct(
        public string $type = 'text',
        public string $variant = '',
        public string $size = '',
        public ?string $label = null,
        public ?string $hint = null,
        public ?string $error = null,
        public string $icon = '',
        public string $iconTrailing = '',
        public string $prefix = '',
        public string $suffix = '',
        public bool $loading = false,
        public bool $clearable = false,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $placeholder = null,
        public bool $required = false,
        public bool $disabled = false,
        public bool $readonly = false,
        public ?string $autocomplete = null,
    ) {
        $defaults = config('ds.defaults.input', []);
        $this->variant = $variant ?: ($defaults['variant'] ?? 'bordered');
        $this->size = $size ?: ($defaults['size'] ?? 'md');
        $this->hasAddon = (bool) ($this->prefix || $this->suffix);

        $this->inputClasses = $this->resolveInputClasses();
        $this->wrapperClasses = $this->resolveWrapperClasses();
    }

    protected function resolveInputClasses(): string
    {
        $base = 'w-full transition-colors bg-transparent outline-none placeholder:text-zinc-400 dark:placeholder:text-zinc-600 disabled:opacity-50 disabled:cursor-not-allowed';

        $size = match ($this->size) {
            'sm' => 'text-sm py-1.5 px-2.5',
            'md' => 'text-sm py-2 px-3',
            'lg' => 'text-base py-2.5 px-3.5',
            default => 'text-sm py-2 px-3',
        };

        // Adjust padding for icons/prefixes
        if ($this->icon) {
            $size .= match ($this->size) {
                'sm' => ' pl-7',
                'lg' => ' pl-11',
                default => ' pl-9',
            };
        }
        if ($this->iconTrailing || $this->loading || $this->clearable) {
            $size .= match ($this->size) {
                'sm' => ' pr-7',
                'lg' => ' pr-11',
                default => ' pr-9',
            };
        }

        $errorCls = $this->error ? 'text-red-900 dark:text-red-100' : 'text-zinc-900 dark:text-zinc-100';

        return "{$base} {$size} {$errorCls}";
    }

    protected function resolveWrapperClasses(): string
    {
        $variants = match ($this->variant) {
            'bordered' => 'border rounded-lg',
            'filled' => 'rounded-lg',
            'ghost' => '',
            'underline' => 'border-b',
            default => 'border rounded-lg',
        };

        $borderColor = $this->error
            ? 'border-red-500 dark:border-red-500 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500'
            : 'border-zinc-300 dark:border-zinc-700 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500';

        $bgColor = match ($this->variant) {
            'filled' => 'bg-zinc-100 dark:bg-zinc-800',
            default => 'bg-white dark:bg-zinc-900',
        };

        $disabled = $this->disabled ? 'opacity-50 cursor-not-allowed' : '';

        return "{$variants} {$borderColor} {$bgColor} flex items-center {$disabled}";
    }

    public function render(): View
    {
        return view('ds::components.input');
    }
}
