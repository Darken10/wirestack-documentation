<?php

namespace Wirestack\Ui\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Toast extends Component
{
    /** @var array<int, array<string, mixed>> */
    public array $toasts = [];

    private int $nextId = 0;

    /** @param array<string, mixed> $event */
    public function addToast(array $event): void
    {
        $duration = $event['duration'] ?? config('ds.toast.duration', 4000);
        $max = config('ds.toast.max', 5);

        $toast = [
            'id' => ++$this->nextId,
            'type' => $event['type'] ?? 'info',
            'message' => $event['message'] ?? '',
            'title' => $event['title'] ?? null,
            'duration' => $duration,
        ];

        $this->toasts[] = $toast;

        // Trim to max
        if (count($this->toasts) > $max) {
            array_shift($this->toasts);
        }
    }

    public function dismiss(int $id): void
    {
        $this->toasts = array_values(
            array_filter($this->toasts, fn ($t) => $t['id'] !== $id)
        );
    }

    public function positionClass(): string
    {
        return match (config('ds.toast.position', 'bottom-right')) {
            'top-right' => 'top-4 right-4',
            'top-left' => 'top-4 left-4',
            'top-center' => 'top-4 left-1/2 -translate-x-1/2',
            'bottom-left' => 'bottom-4 left-4',
            'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2',
            default => 'bottom-4 right-4',
        };
    }

    public function typeClasses(string $type): string
    {
        return match ($type) {
            'success' => 'border-l-4 border-emerald-500 bg-white dark:bg-zinc-800',
            'error' => 'border-l-4 border-red-500 bg-white dark:bg-zinc-800',
            'warning' => 'border-l-4 border-amber-500 bg-white dark:bg-zinc-800',
            'info' => 'border-l-4 border-sky-500 bg-white dark:bg-zinc-800',
            default => 'border-l-4 border-zinc-400 bg-white dark:bg-zinc-800',
        };
    }

    public function typeIconClass(string $type): string
    {
        return match ($type) {
            'success' => 'text-emerald-500',
            'error' => 'text-red-500',
            'warning' => 'text-amber-500',
            'info' => 'text-sky-500',
            default => 'text-zinc-400',
        };
    }

    public function typeIcon(string $type): string
    {
        return match ($type) {
            'success' => 'check-circle',
            'error' => 'x-circle',
            'warning' => 'exclamation-triangle',
            'info' => 'information-circle',
            default => 'bell',
        };
    }

    public function render(): View
    {
        return view('ds::livewire.toast');
    }
}
