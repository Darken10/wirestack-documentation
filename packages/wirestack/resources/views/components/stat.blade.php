<div {{ $attributes->class(['p-6 bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800']) }}>
    <div class="flex items-start justify-between gap-4">
        <div class="min-w-0">
            <p class="text-sm font-medium text-zinc-500 dark:text-zinc-400 truncate">{{ $label }}</p>
            <p class="mt-1.5 text-3xl font-bold text-zinc-900 dark:text-zinc-100 tracking-tight">{{ $value }}</p>

            @if($trend || $trendValue)
                <div class="mt-2 flex items-center gap-1.5">
                    @if($trend === 'up')
                        <svg class="h-4 w-4 {{ $trendColorClass() }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.577 4.878a.75.75 0 01.919-.53l4.78 1.281a.75.75 0 01.531.919l-1.281 4.78a.75.75 0 01-1.449-.387l.81-3.022a19.407 19.407 0 00-5.594 5.203.75.75 0 01-1.139.093L7 10.06l-4.72 4.72a.75.75 0 01-1.06-1.061l5.25-5.25a.75.75 0 011.06 0l3.074 3.073a20.923 20.923 0 015.545-4.931l-3.042-.815a.75.75 0 01-.53-.919z" clip-rule="evenodd" />
                        </svg>
                    @elseif($trend === 'down')
                        <svg class="h-4 w-4 {{ $trendColorClass() }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M1.22 5.222a.75.75 0 011.06 0L7 9.942l3.768-3.769a.75.75 0 011.113.058 20.908 20.908 0 013.813 7.254l1.574-2.727a.75.75 0 011.3.75l-2.475 4.286a.75.75 0 01-.617.362l-4.286-.076a.75.75 0 01.048-1.499l2.89.051a19.408 19.408 0 00-2.775-5.155L7.06 11.06a.75.75 0 01-1.06 0l-4.78-4.78a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    @if($trendValue)
                        <span class="text-sm font-medium {{ $trendColorClass() }}">{{ $trendValue }}</span>
                    @endif
                    @if($description)
                        <span class="text-sm text-zinc-500 dark:text-zinc-400">{{ $description }}</span>
                    @endif
                </div>
            @elseif($description)
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ $description }}</p>
            @endif
        </div>

        @if($icon)
            <div class="flex items-center justify-center h-12 w-12 rounded-xl shrink-0 {{ $iconBgClass() }}">
                <x-dynamic-component :component="'heroicon-o-'.$icon" class="h-6 w-6" />
            </div>
        @endif
    </div>
</div>
