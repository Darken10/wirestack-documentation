<span {{ $attributes->class([
    'inline-flex items-center rounded-full font-medium transition-colors cursor-pointer select-none',
    $colorClasses,
    $sizeClass(),
]) }}>
    @if($icon)
        <flux:icon :icon="$icon" class="h-3.5 w-3.5 shrink-0" />
    @endif

    {{ $slot }}

    @if($dismissible)
        <button type="button"
            class="ml-1 -mr-0.5 rounded-full p-0.5 hover:bg-black/10 dark:hover:bg-white/10 transition-colors focus:outline-none"
            aria-label="Remove">
            <flux:icon.x-mark class="h-3 w-3" />
        </button>
    @endif
</span>
