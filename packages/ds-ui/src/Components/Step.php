<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Step extends Component
{
    public function __construct(
        public int     $number      = 1,
        public ?string $title       = null,
        public ?string $description = null,
        public string  $status      = 'pending',
        public string  $icon        = '',
    ) {}

    public function render(): View
    {
        return view('ds::components.step');
    }
}
