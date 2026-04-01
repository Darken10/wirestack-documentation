<div
    x-data="{ open: false }"
    x-on:keydown.escape.window="open = false"
    x-on:click.outside="open = false"
    {{ $attributes->class(['relative inline-block']) }}>

    {{-- Trigger --}}
    <div x-on:click="open = !open">
        {{ $trigger ?? '' }}
    </div>

    {{-- Menu --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 mt-1.5 {{ $widthClass() }} {{ $alignClass() }} origin-top-left rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 shadow-lg ring-1 ring-black/5 dark:ring-white/5 focus:outline-none overflow-hidden"
        style="display: none;"
        role="menu"
        aria-orientation="vertical"
        x-on:click="open = false">
        <div class="p-1">
            {{ $slot }}
        </div>
    </div>
</div>
