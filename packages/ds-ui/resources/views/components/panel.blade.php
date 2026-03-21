<div {{ $attributes->class([$panelClasses()]) }}>
    @if($title)
        <div class="px-4 py-3 border-b border-zinc-200 dark:border-zinc-700">
            <h4 class="text-sm font-semibold text-zinc-700 dark:text-zinc-300">{{ $title }}</h4>
        </div>
    @endif
    <div class="{{ $paddingClass() }}">{{ $slot }}</div>
</div>
