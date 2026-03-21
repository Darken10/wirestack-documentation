<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Stat extends Component
{
    public function __construct(
        public string $label = '',
        public string $value = '',
        public ?string $trend = null,
        public ?string $trendValue = null,
        public string $trendColor = 'auto',
        public string $icon = '',
        public string $iconColor = 'primary',
        public ?string $description = null,
    ) {}

    public function trendColorClass(): string
    {
        if ($this->trendColor !== 'auto') {
            return match ($this->trendColor) {
                'success' => 'text-emerald-600 dark:text-emerald-400',
                'danger' => 'text-red-600 dark:text-red-400',
                'warning' => 'text-amber-600 dark:text-amber-400',
                default => 'text-zinc-600 dark:text-zinc-400',
            };
        }

        return match ($this->trend) {
            'up' => 'text-emerald-600 dark:text-emerald-400',
            'down' => 'text-red-600 dark:text-red-400',
            default => 'text-zinc-600 dark:text-zinc-400',
        };
    }

    public function iconBgClass(): string
    {
        return match ($this->iconColor) {
            'primary' => 'bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300',
            'secondary' => 'bg-violet-100 text-violet-600 dark:bg-violet-900 dark:text-violet-300',
            'success' => 'bg-emerald-100 text-emerald-600 dark:bg-emerald-900 dark:text-emerald-300',
            'warning' => 'bg-amber-100 text-amber-600 dark:bg-amber-900 dark:text-amber-300',
            'danger' => 'bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-300',
            'info' => 'bg-sky-100 text-sky-600 dark:bg-sky-900 dark:text-sky-300',
            default => 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300',
        };
    }

    public function render(): View
    {
        return view('ds::components.stat');
    }
}
