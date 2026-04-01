<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Table extends Component
{
    public function __construct(
        public array $columns = [],
        public array $rows = [],
        public bool $striped = false,
        public bool $hoverable = true,
        public bool $bordered = false,
        public bool $compact = false,
        public bool $responsive = true,
        public ?string $caption = null,
    ) {}

    public function cellPadding(): string
    {
        return $this->compact ? 'px-4 py-2' : 'px-6 py-4';
    }

    public function headerPadding(): string
    {
        return $this->compact ? 'px-4 py-2' : 'px-6 py-3';
    }

    public function render(): View
    {
        return view('ws::components.table');
    }
}
