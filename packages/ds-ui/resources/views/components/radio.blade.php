@php $radioId = $id ?? $name.'-radio-'.uniqid(); @endphp

<div {{ $attributes->only('class', 'wire:key') }}>
    <div class="flex items-start gap-3">
        <div class="flex items-center h-5 mt-0.5">
            <input
                id="{{ $radioId }}"
                name="{{ $name }}"
                type="radio"
                value="{{ $value }}"
                @if($disabled) disabled @endif
                {{ $attributes->except(['class', 'id', 'name', 'type', 'value', 'disabled', 'wire:key'])->class([
                    'border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 transition-colors cursor-pointer',
                    'focus:ring-offset-0',
                    $colorClasses(),
                    $sizeClass(),
                    $disabled ? 'opacity-50 cursor-not-allowed' : '',
                ]) }}
            />
        </div>
        @if($label || $slot->isNotEmpty())
            <label for="{{ $radioId }}" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 {{ $disabled ? 'opacity-50' : 'cursor-pointer' }}">
                {{ $label ?? $slot }}
                @if($hint)
                    <span class="block text-xs font-normal text-zinc-500 dark:text-zinc-400 mt-0.5">{{ $hint }}</span>
                @endif
            </label>
        @endif
    </div>
</div>
