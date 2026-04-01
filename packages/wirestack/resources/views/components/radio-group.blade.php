<fieldset {{ $attributes->only('class', 'wire:key') }}>
    @if($label)
        <legend class="text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">{{ $label }}</legend>
    @endif

    <div class="{{ $orientation === 'horizontal' ? 'flex flex-wrap gap-4' : 'space-y-2' }}">
        {{ $slot }}
    </div>

    @if($error)
        <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
            <x-heroicon-o-exclamation-circle class="h-3.5 w-3.5 shrink-0" />
            {{ $error }}
        </p>
    @elseif($hint)
        <p class="mt-1.5 text-xs text-zinc-500 dark:text-zinc-400">{{ $hint }}</p>
    @endif
</fieldset>
