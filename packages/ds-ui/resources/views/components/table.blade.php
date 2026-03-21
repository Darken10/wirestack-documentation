<div {{ $attributes->class(['w-full']) }}>
    <div class="{{ $responsive ? 'overflow-x-auto' : '' }} rounded-xl border border-zinc-200 dark:border-zinc-800">
        <table class="w-full text-sm">
            @if($caption)
                <caption class="text-left text-xs text-zinc-500 dark:text-zinc-400 px-6 pb-2">{{ $caption }}</caption>
            @endif

            {{-- thead --}}
            @if(isset($header))
                <thead class="bg-zinc-50 dark:bg-zinc-900/50">{{ $header }}</thead>
            @elseif(!empty($columns))
                <thead class="bg-zinc-50 dark:bg-zinc-900/50">
                    <tr class="border-b border-zinc-200 dark:border-zinc-800">
                        @foreach($columns as $col)
                            <th class="{{ $headerPadding() }} text-left text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wide whitespace-nowrap">
                                {{ is_array($col) ? ($col['label'] ?? $col['key'] ?? '') : $col }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
            @endif

            {{-- tbody --}}
            <tbody class="bg-white dark:bg-zinc-900 divide-y divide-zinc-100 dark:divide-zinc-800/60">
                @if($slot->isNotEmpty())
                    {{ $slot }}
                @elseif(!empty($rows))
                    @forelse($rows as $row)
                        <tr class="{{ $striped && $loop->odd ? 'bg-zinc-50/50 dark:bg-zinc-800/20' : '' }}
                            {{ $hoverable ? 'hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition-colors' : '' }}">
                            @foreach($columns as $col)
                                @php $key = is_array($col) ? ($col['key'] ?? '') : $col; @endphp
                                <td class="{{ $cellPadding() }} text-zinc-700 dark:text-zinc-300 {{ is_array($col) && ($col['nowrap'] ?? false) ? 'whitespace-nowrap' : '' }}">
                                    {{ $row[$key] ?? '—' }}
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns) }}" class="{{ $cellPadding() }} text-center text-zinc-500 dark:text-zinc-400">
                                No data available.
                            </td>
                        </tr>
                    @endforelse
                @else
                    {{ $body ?? '' }}
                @endif
            </tbody>

            @if(isset($footer))
                <tfoot class="bg-zinc-50 dark:bg-zinc-900/50 border-t border-zinc-200 dark:border-zinc-800">
                    {{ $footer }}
                </tfoot>
            @endif
        </table>
    </div>
</div>
