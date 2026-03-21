<div {{ $attributes->class([$paddingClass(), $separator ? 'border-b border-zinc-200 dark:border-zinc-800' : '']) }}>
    @if($title || $description)
        <div class="{{ isset($actions) ? 'flex items-start justify-between gap-4' : '' }}">
            <div>
                @if($title)
                    <h3 class="text-base font-semibold text-zinc-900 dark:text-zinc-100 leading-tight">{{ $title }}</h3>
                @endif
                @if($description)
                    <p class="mt-0.5 text-sm text-zinc-500 dark:text-zinc-400">{{ $description }}</p>
                @endif
            </div>
            @if(isset($actions))
                <div class="flex items-center gap-2 shrink-0">{{ $actions }}</div>
            @endif
        </div>
    @else
        <div class="{{ isset($actions) ? 'flex items-center justify-between gap-4' : '' }}">
            {{ $slot }}
            @if(isset($actions))
                <div class="flex items-center gap-2 shrink-0">{{ $actions }}</div>
            @endif
        </div>
    @endif
</div>
