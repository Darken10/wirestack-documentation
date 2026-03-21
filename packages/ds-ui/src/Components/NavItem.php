<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class NavItem extends Component
{
    public function __construct(
        public string $href = '#',
        public bool $active = false,
        public string $icon = '',
        public ?string $badge = null,
        public bool $disabled = false,
    ) {}

    public function render(): View
    {
        return view('ds::components.nav-item');
    }
}
