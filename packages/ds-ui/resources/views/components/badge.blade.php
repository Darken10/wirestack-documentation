<span {{ $attributes->class([
    $variantClasses['base'],
    $variantClasses['sizes'],
    $variantClasses['radius'],
    $variantClasses['colorCls'],
]) }}>
    @if($dot)
        <span class="inline-block h-1.5 w-1.5 rounded-full {{ $variantClasses['dotCls'] }}"></span>
    @elseif($icon)
        <x-dynamic-component :component="'flux::icon.'.$icon" class="h-3 w-3 shrink-0" />
    @endif

    {{ $slot }}

    @if($dismiss)
        <button type="button"
            class="ml-0.5 -mr-0.5 rounded-full p-0.5 hover:bg-black/10 dark:hover:bg-white/10 transition-colors focus:outline-none"
            aria-label="Dismiss">
            <flux:icon.x-mark class="h-3 w-3" />
        </button>
    @endif
</span>
