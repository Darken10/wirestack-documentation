<?php

namespace Wirestack\Ui\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class CommandPalette extends Component
{
    public bool $open = false;

    public string $query = '';

    /** @var array<int, array<string, string>> */
    public array $commands = [];

    public function getListeners(): array
    {
        return [
            'ds-command-palette-open' => 'openPalette',
            'ds-command-palette-close' => 'closePalette',
        ];
    }

    public function openPalette(): void
    {
        $this->open = true;
        $this->query = '';
    }

    public function closePalette(): void
    {
        $this->open = false;
        $this->query = '';
    }

    /** @return array<int, array<string, string>> */
    public function filteredCommands(): array
    {
        if (! $this->query) {
            return $this->commands;
        }

        $query = strtolower($this->query);

        return array_values(array_filter(
            $this->commands,
            fn ($cmd) => str_contains(strtolower($cmd['label'] ?? ''), $query)
                || str_contains(strtolower($cmd['description'] ?? ''), $query)
        ));
    }

    public function run(string $commandId): void
    {
        $command = collect($this->commands)->firstWhere('id', $commandId);

        if ($command && isset($command['action'])) {
            $this->dispatch($command['action']);
        }

        $this->closePalette();
    }

    public function render(): View
    {
        return view('ds::livewire.command-palette', [
            'results' => $this->filteredCommands(),
        ]);
    }
}
