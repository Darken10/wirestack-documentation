<?php

namespace Wirestack\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Alert extends Component
{
    public string $colorClasses;

    public string $iconName;

    public function __construct(
        public string $variant = '',
        public string $color = '',
        public ?string $title = null,
        public string $icon = '',
        public bool $dismissible = false,
    ) {
        $defaults = config('ds.defaults.alert', []);
        $this->variant = $variant ?: ($defaults['variant'] ?? 'soft');
        $this->color = $color ?: ($defaults['color'] ?? 'info');

        $this->colorClasses = $this->resolveColorClasses();
        $this->iconName = $icon ?: $this->defaultIcon();
    }

    protected function resolveColorClasses(): string
    {
        $map = [
            'info' => ['soft' => 'bg-sky-50 text-sky-800 dark:bg-sky-950/50 dark:text-sky-300 border border-sky-200 dark:border-sky-800',      'solid' => 'bg-sky-600 text-white',     'outline' => 'border border-sky-600 text-sky-700 dark:text-sky-300'],
            'success' => ['soft' => 'bg-emerald-50 text-emerald-800 dark:bg-emerald-950/50 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800', 'solid' => 'bg-emerald-600 text-white', 'outline' => 'border border-emerald-600 text-emerald-700 dark:text-emerald-300'],
            'warning' => ['soft' => 'bg-amber-50 text-amber-800 dark:bg-amber-950/50 dark:text-amber-300 border border-amber-200 dark:border-amber-800',   'solid' => 'bg-amber-500 text-white',   'outline' => 'border border-amber-500 text-amber-700 dark:text-amber-300'],
            'danger' => ['soft' => 'bg-red-50 text-red-800 dark:bg-red-950/50 dark:text-red-300 border border-red-200 dark:border-red-800',         'solid' => 'bg-red-600 text-white',     'outline' => 'border border-red-600 text-red-700 dark:text-red-300'],
            'neutral' => ['soft' => 'bg-zinc-50 text-zinc-800 dark:bg-zinc-900 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-700',      'solid' => 'bg-zinc-700 text-white',    'outline' => 'border border-zinc-400 text-zinc-700 dark:text-zinc-300'],
        ];

        return ($map[$this->color] ?? $map['info'])[$this->variant] ?? ($map[$this->color] ?? $map['info'])['soft'];
    }

    protected function defaultIcon(): string
    {
        return match ($this->color) {
            'success' => 'check-circle',
            'warning' => 'exclamation-triangle',
            'danger' => 'x-circle',
            'info' => 'information-circle',
            default => 'information-circle',
        };
    }

    public function render(): View
    {
        return view('ws::components.alert');
    }
}
