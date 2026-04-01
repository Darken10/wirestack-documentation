@php $rangeId = $id ?? $name.'-range-'.uniqid(); @endphp

<div {{ $attributes->only('class', 'wire:key') }}>
    @if($label)
        <div class="flex items-center justify-between mb-1.5">
            <label for="{{ $rangeId }}" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">{{ $label }}</label>
            @if($showValue)
                <span x-data="{ val: $refs.range?.value ?? {{ $min }} }"
                      x-text="val"
                      class="text-sm font-mono text-zinc-600 dark:text-zinc-400"></span>
            @endif
        </div>
    @endif

    <input
        id="{{ $rangeId }}"
        name="{{ $name }}"
        type="range"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        @if($disabled) disabled @endif
        x-ref="range"
        @if($showValue) x-on:input="$dispatch('range-change', {value: $event.target.value})" @endif
        {{ $attributes->except(['class', 'id', 'name', 'type', 'min', 'max', 'step', 'disabled', 'wire:key'])->class([
            'w-full h-2 rounded-full appearance-none cursor-pointer bg-zinc-200 dark:bg-zinc-700',
            $accentClass(),
            $disabled ? 'opacity-50 cursor-not-allowed' : '',
        ]) }}
    />

    @if($hint)
        <p class="mt-1.5 text-xs text-zinc-500 dark:text-zinc-400">{{ $hint }}</p>
    @endif
</div>
