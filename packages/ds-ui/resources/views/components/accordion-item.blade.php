@php $itemId = 'accordion-'.uniqid(); @endphp
<div
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    {{ $attributes->class(['bg-white dark:bg-zinc-900']) }}>

    <button
        type="button"
        x-on:click="open = !open"
        :aria-expanded="open"
        aria-controls="{{ $itemId }}"
        @if($disabled) disabled @endif
        class="flex items-center justify-between w-full px-5 py-4 text-sm font-medium text-left transition-colors
            {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'hover:bg-zinc-50 dark:hover:bg-zinc-800/50 cursor-pointer' }}
            text-zinc-900 dark:text-zinc-100">
        <div class="flex items-center gap-2.5">
            @if($icon)
                <flux:icon.{{ $icon }} class="h-4 w-4 text-zinc-500 dark:text-zinc-400" />
            @endif
            {{ $title }}
        </div>
        <svg
            class="h-5 w-5 text-zinc-500 dark:text-zinc-400 transition-transform duration-200 shrink-0"
            :class="{ 'rotate-180': open }"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </button>

    <div
        id="{{ $itemId }}"
        x-show="open"
        x-collapse
        class="border-t border-zinc-100 dark:border-zinc-800">
        <div class="px-5 py-4 text-sm text-zinc-600 dark:text-zinc-400">
            {{ $slot }}
        </div>
    </div>
</div>
