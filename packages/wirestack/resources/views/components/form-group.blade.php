<div {{ $attributes->class(['w-full', $inline ? 'flex items-start gap-4' : 'space-y-1.5']) }}>
    @if($inline)
        <div class="w-48 shrink-0 pt-2">
            @if($label)
                <label @if($for) for="{{ $for }}" @endif class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ $label }}
                    @if($required) <span class="text-red-500 ml-0.5">*</span> @endif
                </label>
            @endif
            @if($hint)
                <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">{{ $hint }}</p>
            @endif
        </div>
        <div class="flex-1 min-w-0">
            {{ $slot }}
            @if($error)
                <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                    <flux:icon.exclamation-circle class="h-3.5 w-3.5 shrink-0" />
                    {{ $error }}
                </p>
            @endif
        </div>
    @else
        @if($label)
            <label @if($for) for="{{ $for }}" @endif class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                {{ $label }}
                @if($required) <span class="text-red-500 ml-0.5">*</span> @endif
            </label>
        @endif
        {{ $slot }}
        @if($error)
            <p class="text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                <flux:icon.exclamation-circle class="h-3.5 w-3.5 shrink-0" />
                {{ $error }}
            </p>
        @elseif($hint)
            <p class="text-xs text-zinc-500 dark:text-zinc-400">{{ $hint }}</p>
        @endif
    @endif
</div>
