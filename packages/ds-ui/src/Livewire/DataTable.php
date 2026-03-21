<?php

namespace Ds\Ui\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public string  $search    = '';
    public string  $sortBy    = '';
    public string  $sortDir   = 'asc';
    public int     $perPage   = 15;
    public array   $selected  = [];
    public bool    $selectAll = false;

    /** @var array<string, mixed> */
    public array $filters = [];

    public function __construct(
        public array  $columns    = [],
        public array  $rows       = [],
        public bool   $searchable = true,
        public bool   $selectable = false,
        public bool   $exportable = false,
        public string $emptyMessage = 'No results found.',
        public array  $perPageOptions = [10, 15, 25, 50, 100],
    ) {}

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    public function sort(string $column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDir = $this->sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy  = $column;
            $this->sortDir = 'asc';
        }

        $this->resetPage();
    }

    public function toggleSelectAll(): void
    {
        $this->selectAll = ! $this->selectAll;

        if ($this->selectAll) {
            $this->selected = array_column($this->filteredRows(), 'id');
        } else {
            $this->selected = [];
        }
    }

    /** @return array<int, array<string, mixed>> */
    protected function filteredRows(): array
    {
        $rows = $this->rows;

        // Search
        if ($this->search && $this->searchable) {
            $search = strtolower($this->search);
            $rows   = array_filter($rows, function ($row) use ($search) {
                foreach ($row as $value) {
                    if (str_contains(strtolower((string) $value), $search)) {
                        return true;
                    }
                }

                return false;
            });
        }

        // Sort
        if ($this->sortBy) {
            usort($rows, function ($a, $b) {
                $valA = $a[$this->sortBy] ?? '';
                $valB = $b[$this->sortBy] ?? '';

                return $this->sortDir === 'asc'
                    ? strcmp((string) $valA, (string) $valB)
                    : strcmp((string) $valB, (string) $valA);
            });
        }

        return array_values($rows);
    }

    /** @return array<int, array<string, mixed>> */
    public function paginatedRows(): array
    {
        $filtered = $this->filteredRows();
        $offset   = ($this->getPage() - 1) * $this->perPage;

        return array_slice($filtered, $offset, $this->perPage);
    }

    public function totalFiltered(): int
    {
        return count($this->filteredRows());
    }

    public function totalPages(): int
    {
        return (int) ceil($this->totalFiltered() / $this->perPage);
    }

    public function render(): \Illuminate\View\View
    {
        return view('ds::livewire.data-table', [
            'displayRows'  => $this->paginatedRows(),
            'totalRows'    => $this->totalFiltered(),
            'currentPage'  => $this->getPage(),
            'totalPages'   => $this->totalPages(),
        ]);
    }
}
