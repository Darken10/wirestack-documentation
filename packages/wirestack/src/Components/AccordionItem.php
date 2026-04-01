<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AccordionItem extends Component
{
    public function __construct(
        public string $title = '',
        public bool $open = false,
        public string $icon = '',
        public bool $disabled = false,
    ) {}

    public function render(): View
    {
        return view('ds::components.accordion-item');
    }
}
