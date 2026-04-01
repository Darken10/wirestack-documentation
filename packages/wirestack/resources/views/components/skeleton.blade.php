@if($variant === 'card')
    <div {{ $attributes->class(['rounded-xl overflow-hidden border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900']) }}>
        <div class="h-48 bg-zinc-200 dark:bg-zinc-800 ds-skeleton"></div>
        <div class="p-5 space-y-3">
            <div class="h-4 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-3/4"></div>
            <div class="h-3 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-full"></div>
            <div class="h-3 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-5/6"></div>
            <div class="h-8 rounded-lg bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-1/3 mt-4"></div>
        </div>
    </div>
@elseif($variant === 'avatar')
    <div {{ $attributes->class(['flex items-center gap-3']) }}>
        <div class="{{ $circle ? 'rounded-full' : 'rounded-lg' }} h-10 w-10 bg-zinc-200 dark:bg-zinc-700 ds-skeleton shrink-0"></div>
        <div class="flex-1 space-y-2">
            <div class="h-3.5 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-1/3"></div>
            <div class="h-3 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-2/3"></div>
        </div>
    </div>
@elseif($variant === 'list')
    <div {{ $attributes->class(['space-y-3']) }}>
        @for($i = 0; $i < $lines; $i++)
            <div class="flex items-center gap-3">
                <div class="h-8 w-8 rounded-full bg-zinc-200 dark:bg-zinc-700 ds-skeleton shrink-0"></div>
                <div class="flex-1 space-y-2">
                    <div class="h-3 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton {{ ['w-full','w-4/5','w-3/4','w-5/6'][$i % 4] }}"></div>
                    <div class="h-2.5 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-1/2"></div>
                </div>
            </div>
        @endfor
    </div>
@elseif($variant === 'table')
    <div {{ $attributes->class(['overflow-hidden rounded-xl border border-zinc-200 dark:border-zinc-800']) }}>
        <div class="h-12 bg-zinc-100 dark:bg-zinc-800 ds-skeleton border-b border-zinc-200 dark:border-zinc-700"></div>
        @for($i = 0; $i < $lines; $i++)
            <div class="flex items-center px-6 py-4 gap-6 border-b border-zinc-100 dark:border-zinc-800/50 last:border-0">
                <div class="h-3 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-1/4"></div>
                <div class="h-3 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-1/3"></div>
                <div class="h-3 rounded bg-zinc-200 dark:bg-zinc-700 ds-skeleton w-1/6 ml-auto"></div>
            </div>
        @endfor
    </div>
@else
    <div {{ $attributes->class(['space-y-2']) }}>
        @for($i = 0; $i < $lines; $i++)
            <div class="h-{{ $height }} rounded {{ $dimensionClasses() }} {{ $baseClasses() }}
                {{ $i === $lines - 1 ? 'w-4/5' : 'w-full' }}"></div>
        @endfor
    </div>
@endif
