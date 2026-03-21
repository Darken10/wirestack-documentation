@php $toggleId = $id ?? $name.'-toggle-'.uniqid(); @endphp

<div {{ $attributes->only('class', 'wire:key') }}>
    <div class="flex items-start gap-3">
        <label for="{{ $toggleId }}" class="relative inline-flex items-center {{ $disabled ? 'cursor-not-allowed' : 'cursor-pointer' }}">
            <input
                id="{{ $toggleId }}"
                name="{{ $name }}"
                type="checkbox"
                @if($checked) checked @endif
                @if($disabled) disabled @endif
                {{ $attributes->except(['class', 'id', 'name', 'type', 'checked', 'disabled', 'wire:key'])->class(['peer sr-only']) }}
            />
            <div class="{{ $trackClasses }}"></div>
            <div class="{{ $thumbClasses }} {{ $translateClass() }} bg-white rounded-full shadow-sm transition-transform duration-200 ease-in-out"></div>
        </label>

        @if($label || $slot->isNotEmpty())
            <div class="{{ $disabled ? 'opacity-50' : '' }}">
                <label for="{{ $toggleId }}" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 {{ $disabled ? '' : 'cursor-pointer' }}">
                    {{ $label ?? $slot }}
                </label>
                @if($hint)
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">{{ $hint }}</p>
                @endif
            </div>
        @endif
    </div>
    @if($error)
        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $error }}</p>
    @endif
</div>
