<a href="{{ $href }}" {{ $attributes->class([
    'flex items-center gap-2.5 px-3 py-2 text-sm font-medium rounded-lg transition-colors',
    $active
        ? 'bg-blue-50 text-blue-700 dark:bg-blue-950 dark:text-blue-300'
        : ($disabled
            ? 'text-zinc-400 dark:text-zinc-600 cursor-not-allowed pointer-events-none'
            : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 hover:text-zinc-900 dark:hover:text-zinc-100'),
]) }} @if($disabled) aria-disabled="true" @endif>
    @if($icon)
        <x-dynamic-component :component="'flux::icon.'.$icon" class="h-4 w-4 shrink-0" />
    @endif
    {{ $slot }}
    @if($badge)
        <span class="ml-auto text-xs bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 px-1.5 py-0.5 rounded-full font-medium">
            {{ $badge }}
        </span>
    @endif
</a>
