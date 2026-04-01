<div
    x-data="{ show: true }"
    x-show="show"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    {{ $attributes->class(['rounded-xl p-4', $colorClasses]) }}
    role="alert">
    <div class="flex gap-3">
        {{-- Icon --}}
        @if($iconName)
            <div class="shrink-0 mt-0.5">
                <x-dynamic-component :component="'heroicon-o-'.$iconName" class="h-5 w-5" />
            </div>
        @endif

        {{-- Content --}}
        <div class="flex-1 min-w-0">
            @if($title)
                <p class="font-semibold text-sm leading-tight mb-1">{{ $title }}</p>
            @endif
            <div class="text-sm leading-relaxed {{ $title ? 'opacity-90' : '' }}">
                {{ $slot }}
            </div>

            @if(isset($actions))
                <div class="mt-3 flex items-center gap-2">{{ $actions }}</div>
            @endif
        </div>

        {{-- Dismiss --}}
        @if($dismissible)
            <div class="shrink-0 ml-auto">
                <button type="button"
                    x-on:click="show = false"
                    class="rounded-md p-0.5 hover:bg-black/10 dark:hover:bg-white/10 transition-colors focus:outline-none focus-visible:ring-2">
                    <x-heroicon-o-x-mark class="h-4 w-4" />
                </button>
            </div>
        @endif
    </div>
</div>
