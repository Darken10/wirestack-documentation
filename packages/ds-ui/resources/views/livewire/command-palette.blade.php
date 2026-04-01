<div>
    @if($open)
        {{-- Backdrop --}}
        <div
            class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm ds-animate-fade-in"
            wire:click="closePalette">
        </div>

        {{-- Panel --}}
        <div class="ds-command-panel" x-on:keydown.escape.window="$wire.closePalette()">
            <div class="overflow-hidden rounded-2xl bg-white dark:bg-zinc-900 shadow-2xl ring-1 ring-black/10 dark:ring-white/10">

                {{-- Search input --}}
                <div class="flex items-center gap-3 px-4 py-3 border-b border-zinc-200 dark:border-zinc-800">
                    <flux:icon.magnifying-glass class="h-5 w-5 text-zinc-400 dark:text-zinc-500 shrink-0" />
                    <input
                        type="text"
                        wire:model.live="query"
                        wire:keydown.enter="run(results.0?.id)"
                        placeholder="Search commands..."
                        class="flex-1 bg-transparent text-sm text-zinc-900 dark:text-zinc-100 placeholder:text-zinc-400 dark:placeholder:text-zinc-600 focus:outline-none"
                        autofocus />
                    <x-ds::kbd size="sm">Esc</x-ds::kbd>
                </div>

                {{-- Results --}}
                <div class="max-h-80 overflow-y-auto ds-scrollbar p-2">
                    @forelse($results as $command)
                        <button
                            type="button"
                            wire:click="run('{{ $command['id'] ?? '' }}')"
                            class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm text-left hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors group">

                            @if(isset($command['icon']))
                                <span class="flex items-center justify-center h-8 w-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 group-hover:bg-zinc-200 dark:group-hover:bg-zinc-700 shrink-0 transition-colors">
                                    <x-dynamic-component :component="'flux::icon.'.$command['icon']" class="h-4 w-4" />
                                </span>
                            @endif

                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-zinc-900 dark:text-zinc-100">{{ $command['label'] ?? '' }}</p>
                                @if(isset($command['description']))
                                    <p class="text-xs text-zinc-500 dark:text-zinc-400 truncate">{{ $command['description'] }}</p>
                                @endif
                            </div>

                            @if(isset($command['shortcut']))
                                <x-ds::kbd size="sm">{{ $command['shortcut'] }}</x-ds::kbd>
                            @endif

                            @if(isset($command['badge']))
                                <x-ds::badge size="xs" color="neutral">{{ $command['badge'] }}</x-ds::badge>
                            @endif
                        </button>
                    @empty
                        <div class="py-10 text-center">
                            <flux:icon.magnifying-glass class="mx-auto h-8 w-8 text-zinc-300 dark:text-zinc-600 mb-2" />
                            <p class="text-sm text-zinc-500 dark:text-zinc-400">No commands found for "{{ $query }}"</p>
                        </div>
                    @endforelse
                </div>

                {{-- Footer hint --}}
                <div class="px-4 py-2.5 border-t border-zinc-100 dark:border-zinc-800 flex items-center gap-4 text-xs text-zinc-400 dark:text-zinc-600">
                    <span class="flex items-center gap-1"><x-ds::kbd size="sm">↵</x-ds::kbd> to select</span>
                    <span class="flex items-center gap-1"><x-ds::kbd size="sm">↑↓</x-ds::kbd> to navigate</span>
                    <span class="flex items-center gap-1"><x-ds::kbd size="sm">Esc</x-ds::kbd> to close</span>
                </div>
            </div>
        </div>
    @endif
</div>
