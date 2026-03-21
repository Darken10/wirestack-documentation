<?php

namespace Ds\Ui\Livewire;

use Livewire\Component;

class Drawer extends Component
{
    public bool $show = false;

    public function __construct(
        public string $drawerId  = 'drawer',
        public string $position  = '',
        public string $size      = '',
        public bool   $closeable = true,
        public bool   $backdrop  = true,
        public ?string $title    = null,
    ) {
        $defaults        = config('ds.defaults.drawer', []);
        $this->position  = $position ?: ($defaults['position'] ?? 'right');
        $this->size      = $size     ?: ($defaults['size']     ?? 'md');
    }

    public function getListeners(): array
    {
        return [
            "ds-drawer-open:{$this->drawerId}"  => 'open',
            "ds-drawer-close:{$this->drawerId}" => 'close',
        ];
    }

    public function open(): void
    {
        $this->show = true;
    }

    public function close(): void
    {
        $this->show = false;
    }

    public function translateClass(): string
    {
        return match ($this->position) {
            'left'   => '-translate-x-full',
            'right'  => 'translate-x-full',
            'top'    => '-translate-y-full',
            'bottom' => 'translate-y-full',
            default  => 'translate-x-full',
        };
    }

    public function positionClass(): string
    {
        return match ($this->position) {
            'left'   => 'left-0 top-0 h-full',
            'right'  => 'right-0 top-0 h-full',
            'top'    => 'top-0 left-0 w-full',
            'bottom' => 'bottom-0 left-0 w-full',
            default  => 'right-0 top-0 h-full',
        };
    }

    public function sizeClass(): string
    {
        $isVertical = in_array($this->position, ['left', 'right']);

        if ($isVertical) {
            return match ($this->size) {
                'sm'   => 'w-72',
                'md'   => 'w-96',
                'lg'   => 'w-[32rem]',
                'xl'   => 'w-[42rem]',
                'full' => 'w-full',
                default => 'w-96',
            };
        }

        return match ($this->size) {
            'sm'   => 'h-48',
            'md'   => 'h-64',
            'lg'   => 'h-96',
            'xl'   => 'h-[32rem]',
            'full' => 'h-full',
            default => 'h-64',
        };
    }

    public function render(): \Illuminate\View\View
    {
        return view('ds::livewire.drawer');
    }
}
