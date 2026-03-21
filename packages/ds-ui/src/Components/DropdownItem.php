<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DropdownItem extends Component
{
    public function __construct(
        public string  $href      = '#',
        public string  $icon      = '',
        public bool    $danger    = false,
        public bool    $disabled  = false,
        public bool    $separator = false,
    ) {}

    public function itemClasses(): string
    {
        if ($this->separator) {
            return '';
        }

        $base = 'flex items-center gap-2.5 w-full px-3 py-1.5 text-sm rounded-md transition-colors text-left';

        if ($this->disabled) {
            return "{$base} opacity-40 cursor-not-allowed";
        }

        if ($this->danger) {
            return "{$base} text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/50";
        }

        return "{$base} text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800";
    }

    public function render(): View
    {
        return view('ds::components.dropdown-item');
    }
}
