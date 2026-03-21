<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class FormGroup extends Component
{
    public function __construct(
        public ?string $label    = null,
        public ?string $hint     = null,
        public ?string $error    = null,
        public ?string $for      = null,
        public bool    $required = false,
        public bool    $inline   = false,
    ) {}

    public function render(): View
    {
        return view('ds::components.form-group');
    }
}
