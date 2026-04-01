<div
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    {{ $attributes }}>

    <button
        type="button"
        x-on:click="open = !open"
        class="flex items-center gap-2 text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors focus:outline-none">
        @if($icon)
            <x-dynamic-component :component="'heroicon-o-'.$icon" class="h-4 w-4" />
        @endif
        @if($label)
            {{ $label }}
        @else
            {{ $trigger ?? '' }}
        @endif
        <svg class="h-4 w-4 text-zinc-400 transition-transform duration-200" :class="{ 'rotate-180': open }"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </button>

    <div x-show="open" x-transition class="mt-2">
        {{ $slot }}
    </div>
</div>
