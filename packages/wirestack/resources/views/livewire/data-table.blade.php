<div class="space-y-4">
    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="flex items-center gap-3 flex-wrap">
            @if($searchable)
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <flux:icon.magnifying-glass class="h-4 w-4 text-zinc-400" />
                    </div>
                    <input
                        type="search"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search..."
                        class="block w-64 pl-9 pr-3 py-2 text-sm border border-zinc-300 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 placeholder:text-zinc-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                    />
                </div>
            @endif

        </div>

        <div class="flex items-center gap-2">
            @if($selectable && !empty($selected))
                <span class="text-sm text-zinc-600 dark:text-zinc-400">
                    {{ count($selected) }} selected
                </span>
            @endif


            {{-- Per page --}}
            <select
                wire:model.live="perPage"
                class="text-sm border border-zinc-300 dark:border-zinc-700 rounded-lg py-1.5 pl-3 pr-8 bg-white dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300 focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none">
                @foreach($perPageOptions as $option)
                    <option value="{{ $option }}">{{ $option }} / page</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto rounded-xl border border-zinc-200 dark:border-zinc-800">
        <table class="w-full text-sm">
            <thead class="bg-zinc-50 dark:bg-zinc-900/60">
                <tr class="border-b border-zinc-200 dark:border-zinc-800">
                    @if($selectable)
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox"
                                wire:click="toggleSelectAll"
                                :checked="{{ count($selected) > 0 && count($selected) === $totalRows ? 'true' : 'false' }}"
                                class="h-4 w-4 rounded border-zinc-300 text-blue-600 focus:ring-blue-500 focus:ring-offset-0" />
                        </th>
                    @endif
                    @foreach($columns as $col)
                        @php
                            $key       = is_array($col) ? ($col['key'] ?? '') : $col;
                            $label     = is_array($col) ? ($col['label'] ?? $col['key'] ?? '') : $col;
                            $sortable  = is_array($col) ? ($col['sortable'] ?? false) : false;
                            $align     = is_array($col) ? ($col['align'] ?? 'left') : 'left';
                        @endphp
                        <th class="px-5 py-3 text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wide
                            {{ $align === 'right' ? 'text-right' : ($align === 'center' ? 'text-center' : 'text-left') }}
                            {{ $sortable ? 'cursor-pointer select-none hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors' : '' }}"
                            @if($sortable) wire:click="sort('{{ $key }}')" @endif>
                            <div class="flex items-center gap-1.5 {{ $align === 'right' ? 'justify-end' : '' }}">
                                {{ $label }}
                                @if($sortable)
                                    <span class="inline-flex flex-col gap-0.5">
                                        <svg class="h-2.5 w-2.5 {{ $sortBy === $key && $sortDir === 'asc' ? 'text-blue-600' : 'text-zinc-300 dark:text-zinc-600' }}" fill="currentColor" viewBox="0 0 8 4">
                                            <path d="M4 0L8 4H0L4 0z"/>
                                        </svg>
                                        <svg class="h-2.5 w-2.5 {{ $sortBy === $key && $sortDir === 'desc' ? 'text-blue-600' : 'text-zinc-300 dark:text-zinc-600' }}" fill="currentColor" viewBox="0 0 8 4">
                                            <path d="M4 4L0 0h8L4 4z"/>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-zinc-900 divide-y divide-zinc-100 dark:divide-zinc-800/60">
                @forelse($displayRows as $row)
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/30 transition-colors">
                        @if($selectable)
                            <td class="px-4 py-3">
                                <input type="checkbox"
                                    wire:model.live="selected"
                                    value="{{ $row['id'] ?? '' }}"
                                    class="h-4 w-4 rounded border-zinc-300 text-blue-600 focus:ring-blue-500 focus:ring-offset-0" />
                            </td>
                        @endif
                        @foreach($columns as $col)
                            @php
                                $key   = is_array($col) ? ($col['key'] ?? '') : $col;
                                $align = is_array($col) ? ($col['align'] ?? 'left') : 'left';
                            @endphp
                            <td class="px-5 py-4 text-zinc-700 dark:text-zinc-300
                                {{ $align === 'right' ? 'text-right' : ($align === 'center' ? 'text-center' : '') }}">
                                {{ $row[$key] ?? '—' }}
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) + ($selectable ? 1 : 0) + (isset($rowActions) ? 1 : 0) }}"
                            class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-2 text-zinc-400 dark:text-zinc-600">
                                <flux:icon.inbox class="h-10 w-10" />
                                <p class="text-sm font-medium">{{ $emptyMessage }}</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($totalPages > 1)
        <x-ds::pagination
            :current-page="$currentPage"
            :total-pages="$totalPages"
            :per-page="$perPage"
            :total="$totalRows" />
    @else
        <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400">
            <span>{{ $totalRows }} result{{ $totalRows !== 1 ? 's' : '' }}</span>
        </div>
    @endif
</div>
