<?php

namespace Wirestack\Ui\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Modal extends Component
{
    public bool $show = false;

    public function __construct(
        public string $modalId = 'modal',
        public string $size = '',
        public string $position = 'center',
        public bool $closeable = true,
        public bool $backdrop = true,
        public ?string $title = null,
        public ?string $description = null,
    ) {
        $defaults = config('ds.defaults.modal', []);
        $this->size = $size ?: ($defaults['size'] ?? 'md');
    }

    public function getListeners(): array
    {
        return [
            "ds-modal-open:{$this->modalId}" => 'open',
            "ds-modal-close:{$this->modalId}" => 'close',
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

    public function modalSizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'max-w-sm',
            'md' => 'max-w-lg',
            'lg' => 'max-w-2xl',
            'xl' => 'max-w-4xl',
            '2xl' => 'max-w-6xl',
            'full' => 'max-w-full mx-4',
            default => 'max-w-lg',
        };
    }

    public function render(): View
    {
        return view('ds::livewire.modal');
    }
}
