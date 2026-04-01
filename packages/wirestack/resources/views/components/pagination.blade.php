<div {{ $attributes->class(['flex items-center justify-between gap-4 flex-wrap']) }}>
    @if($showInfo)
        <p class="text-sm text-zinc-500 dark:text-zinc-400">
            @php
                $from = ($currentPage - 1) * $perPage + 1;
                $to   = min($currentPage * $perPage, $total);
            @endphp
            Showing <span class="font-medium text-zinc-700 dark:text-zinc-300">{{ $from }}</span>
            to <span class="font-medium text-zinc-700 dark:text-zinc-300">{{ $to }}</span>
            of <span class="font-medium text-zinc-700 dark:text-zinc-300">{{ $total }}</span> results
        </p>
    @endif

    <nav class="flex items-center gap-1" aria-label="Pagination">
        {{-- Prev --}}
        <button
            {{ $currentPage <= 1 ? 'disabled' : '' }}
            class="{{ $buttonSizeClass() }} flex items-center justify-center rounded-md transition-colors
                {{ $currentPage <= 1
                    ? 'text-zinc-300 dark:text-zinc-600 cursor-not-allowed'
                    : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 hover:text-zinc-900 dark:hover:text-zinc-100' }}"
            wire:click="previousPage" wire:loading.attr="disabled">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
            </svg>
        </button>

        @foreach($pages() as $page)
            @if($page === '...')
                <span class="{{ $buttonSizeClass() }} flex items-center justify-center text-zinc-400 select-none">…</span>
            @else
                <button
                    class="{{ $buttonSizeClass() }} flex items-center justify-center rounded-md font-medium text-sm transition-colors
                        {{ $page === $currentPage
                            ? 'bg-blue-600 text-white'
                            : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 hover:text-zinc-900 dark:hover:text-zinc-100' }}"
                    wire:click="gotoPage({{ $page }})">
                    {{ $page }}
                </button>
            @endif
        @endforeach

        {{-- Next --}}
        <button
            {{ $currentPage >= $totalPages ? 'disabled' : '' }}
            class="{{ $buttonSizeClass() }} flex items-center justify-center rounded-md transition-colors
                {{ $currentPage >= $totalPages
                    ? 'text-zinc-300 dark:text-zinc-600 cursor-not-allowed'
                    : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 hover:text-zinc-900 dark:hover:text-zinc-100' }}"
            wire:click="nextPage" wire:loading.attr="disabled">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            </svg>
        </button>
    </nav>
</div>
