<div
    x-data="{ show: false }"
    x-on:mouseenter="show = true"
    x-on:mouseleave="show = false"
    {{ $attributes->class(['relative inline-flex']) }}>

    {{ $slot }}

    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="pointer-events-none absolute z-50 w-max max-w-xs px-2.5 py-1.5 text-xs font-medium rounded-lg shadow-lg whitespace-nowrap
            {{ $positionClass() }} {{ $colorClass() }}"
        style="display: none;"
        role="tooltip">
        {{ $text }}
        @if($arrow)
            <div class="absolute inset-x-0 mx-auto w-2 h-2 rotate-45 {{ $colorClass() }}
                {{ str_contains($positionClass(), 'bottom-full') ? 'bottom-[-4px]' : 'top-[-4px]' }}"></div>
        @endif
    </div>
</div>
