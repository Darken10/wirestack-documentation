<li {{ $attributes }}>
    <div class="relative pb-8">
        @if(!$last)
            <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-zinc-200 dark:bg-zinc-700" aria-hidden="true"></span>
        @endif
        <div class="relative flex items-start gap-4">
            {{-- dot --}}
            <div class="flex h-8 w-8 items-center justify-center rounded-full ring-8 ring-white dark:ring-zinc-900 shrink-0 {{ $dotColorClass() }}">
                <x-dynamic-component :component="'flux::icon.'.$icon" class="h-4 w-4 text-white" />
            </div>

            {{-- content --}}
            <div class="flex-1 min-w-0 pt-0.5">
                <div class="flex items-baseline justify-between gap-2 flex-wrap">
                    @if($title)
                        <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">{{ $title }}</p>
                    @endif
                    @if($date)
                        <time class="text-xs text-zinc-500 dark:text-zinc-400 shrink-0">{{ $date }}</time>
                    @endif
                </div>
                @if($description)
                    <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">{{ $description }}</p>
                @endif
                @if($slot->isNotEmpty())
                    <div class="mt-2">{{ $slot }}</div>
                @endif
            </div>
        </div>
    </div>
</li>
