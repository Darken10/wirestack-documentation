<?php

namespace Ds\Ui\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Pagination extends Component
{
    public function __construct(
        public int $currentPage = 1,
        public int $totalPages = 1,
        public int $perPage = 15,
        public int $total = 0,
        public string $variant = 'default',
        public bool $showInfo = true,
        public string $size = 'md',
    ) {}

    /** @return array<int|string> */
    public function pages(): array
    {
        $range = [];
        $delta = 2;
        $left = $this->currentPage - $delta;
        $right = $this->currentPage + $delta + 1;

        $pages = [];
        $result = [];
        $last = 0;

        for ($i = 1; $i <= $this->totalPages; $i++) {
            if ($i === 1 || $i === $this->totalPages || ($i >= $left && $i < $right)) {
                $pages[] = $i;
            }
        }

        foreach ($pages as $page) {
            if ($last > 0) {
                if ($page - $last === 2) {
                    $result[] = $last + 1;
                } elseif ($page - $last > 2) {
                    $result[] = '...';
                }
            }
            $result[] = $page;
            $last = $page;
        }

        return $result;
    }

    public function buttonSizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'h-7 w-7 text-xs',
            'md' => 'h-9 w-9 text-sm',
            'lg' => 'h-10 w-10 text-base',
            default => 'h-9 w-9 text-sm',
        };
    }

    public function render(): View
    {
        return view('ds::components.pagination');
    }
}
