<div
    x-data="{ open: false }"
    x-on:click.outside="open = false"
    x-on:keydown.escape.window="open = false"
    {{ $attributes->class(['relative inline-flex']) }}>

    <div x-on:click="open = !open">
        {{ $trigger ?? $slot }}
    </div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 w-{{ $width }} {{ $positionClass() }} rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 shadow-xl ring-1 ring-black/5 overflow-hidden"
        style="display: none;">
        @if($title)
            <div class="px-4 py-3 border-b border-zinc-100 dark:border-zinc-800">
                <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">{{ $title }}</p>
            </div>
        @endif
        @if(isset($content))
            <div class="p-4">{{ $content }}</div>
        @endif
    </div>
</div>
