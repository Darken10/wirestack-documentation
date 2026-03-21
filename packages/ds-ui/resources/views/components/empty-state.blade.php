<div {{ $attributes->class(['flex flex-col items-center justify-center text-center py-12 px-4']) }}>
    <div class="mx-auto flex items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-800 p-4 mb-4">
        <flux:icon.{{ $icon }} class="{{ $iconSizeClass() }} text-zinc-400 dark:text-zinc-500" />
    </div>

    @if($title)
        <h3 class="text-base font-semibold text-zinc-900 dark:text-zinc-100 mb-1">{{ $title }}</h3>
    @endif

    @if($description)
        <p class="text-sm text-zinc-500 dark:text-zinc-400 max-w-sm">{{ $description }}</p>
    @endif

    @if($slot->isNotEmpty())
        <div class="mt-6">{{ $slot }}</div>
    @endif
</div>
