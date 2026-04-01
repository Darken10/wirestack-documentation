<div
    class="fixed {{ $this->positionClass() }} z-50 flex flex-col gap-2.5 w-full max-w-sm pointer-events-none"
    x-on:ds-toast.window="$wire.addToast($event.detail)">

    @foreach($toasts as $toast)
        <div
            wire:key="toast-{{ $toast['id'] }}"
            class="pointer-events-all flex items-start gap-3 p-4 rounded-xl shadow-xl border border-zinc-200 dark:border-zinc-700
                {{ $this->typeClasses($toast['type']) }} ds-animate-slide-up"
            @if($toast['duration'] > 0)
                x-data="{ show: true }"
                x-init="setTimeout(() => { show = false; $nextTick(() => $wire.dismiss({{ $toast['id'] }})) }, {{ $toast['duration'] }})"
                x-show="show"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-2"
            @endif
            role="alert">

            {{-- Icon --}}
            <div class="shrink-0 mt-0.5 {{ $this->typeIconClass($toast['type']) }}">
                <flux:icon :icon="$this->typeIcon($toast['type'])" class="h-5 w-5" />
            </div>

            {{-- Content --}}
            <div class="flex-1 min-w-0">
                @if($toast['title'])
                    <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-100 leading-tight">{{ $toast['title'] }}</p>
                @endif
                <p class="text-sm text-zinc-600 dark:text-zinc-400 {{ $toast['title'] ? 'mt-0.5' : '' }}">{{ $toast['message'] }}</p>
            </div>

            {{-- Close --}}
            <button type="button"
                wire:click="dismiss({{ $toast['id'] }})"
                class="shrink-0 rounded-md p-0.5 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-colors focus:outline-none">
                <flux:icon.x-mark class="h-4 w-4" />
            </button>
        </div>
    @endforeach
</div>
