<div>
    @if($show)
        {{-- Backdrop --}}
        <div
            class="fixed inset-0 z-40 bg-black/40 backdrop-blur-sm ds-animate-fade-in"
            @if($closeable) wire:click="close" @endif
            aria-hidden="true">
        </div>

        {{-- Drawer panel --}}
        <div
            class="fixed {{ $positionClass() }} z-50 {{ $sizeClass() }} bg-white dark:bg-zinc-900 shadow-2xl flex flex-col
                @if($position === 'right') ds-animate-slide-right @elseif($position === 'left') ds-animate-slide-left @else ds-animate-slide-up @endif"
            role="dialog"
            aria-modal="true"
            x-on:keydown.escape.window="$wire.close()">

            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-5 border-b border-zinc-200 dark:border-zinc-800 shrink-0">
                @if($title)
                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100">{{ $title }}</h2>
                @elseif(isset($header))
                    {{ $header }}
                @else
                    <div></div>
                @endif
                @if($closeable)
                    <button type="button"
                        wire:click="close"
                        class="rounded-lg p-1.5 text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 hover:text-zinc-600 dark:hover:text-zinc-300 transition-colors focus:outline-none focus-visible:ring-2">
                        <flux:icon.x-mark class="h-5 w-5" />
                    </button>
                @endif
            </div>

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto p-6 ds-scrollbar">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            @if(isset($footer))
                <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-zinc-200 dark:border-zinc-800 shrink-0">
                    {{ $footer }}
                </div>
            @endif
        </div>
    @endif
</div>
