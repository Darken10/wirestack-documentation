<div>
    @if($show)
        {{-- Backdrop --}}
        <div
            class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm ds-animate-fade-in"
            @if($closeable) wire:click="close" @endif
            aria-hidden="true">
        </div>

        {{-- Modal panel --}}
        <div
            class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto"
            role="dialog"
            aria-modal="true"
            x-on:keydown.escape.window="$wire.close()">
            <div class="w-full {{ $this->modalSizeClass() }} rounded-2xl bg-white dark:bg-zinc-900 shadow-2xl ds-animate-scale-in overflow-hidden">

                {{-- Header --}}
                @if($title || isset($header))
                    <div class="flex items-start justify-between px-6 py-5 border-b border-zinc-200 dark:border-zinc-800">
                        @if($title)
                            <div>
                                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100">{{ $title }}</h2>
                                @if($description)
                                    <p class="mt-0.5 text-sm text-zinc-500 dark:text-zinc-400">{{ $description }}</p>
                                @endif
                            </div>
                        @else
                            {{ $header ?? '' }}
                        @endif
                        @if($closeable)
                            <button type="button"
                                wire:click="close"
                                class="ml-4 shrink-0 rounded-lg p-1.5 text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 hover:text-zinc-600 dark:hover:text-zinc-300 transition-colors focus:outline-none focus-visible:ring-2">
                                <x-heroicon-o-x-mark class="h-5 w-5" />
                            </button>
                        @endif
                    </div>
                @endif

                {{-- Body --}}
                <div class="px-6 py-5">
                    {{ $slot }}
                </div>

                {{-- Footer --}}
                @if(isset($footer))
                    <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-zinc-200 dark:border-zinc-800">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
