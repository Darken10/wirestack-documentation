@php $inputId = $id ?? $name ?? 'input-'.uniqid(); @endphp

<div {{ $attributes->only('class', 'wire:key') }}>
    @if($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">
            {{ $label }}
            @if($required) <span class="text-red-500 ml-0.5">*</span> @endif
        </label>
    @endif

    <div class="{{ $wrapperClasses }} relative">
        @if($prefix)
            <span class="inline-flex items-center pl-3 text-sm text-zinc-500 dark:text-zinc-400 shrink-0 select-none">
                {{ $prefix }}
            </span>
        @elseif($icon)
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-zinc-400 dark:text-zinc-500">
                <flux:icon :icon="$icon" class="h-4 w-4" />
            </span>
        @endif

        <input
            id="{{ $inputId }}"
            name="{{ $name }}"
            type="{{ $type }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            {{ $attributes->except(['class', 'id', 'name', 'type', 'placeholder', 'required', 'disabled', 'readonly', 'wire:key'])->class([$inputClasses]) }}
        />

        @if($loading)
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <x-ds::spinner size="sm" color="neutral" />
            </span>
        @elseif($clearable)
            <button type="button"
                class="absolute inset-y-0 right-0 flex items-center pr-3 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200 transition-colors">
                <flux:icon.x-mark class="h-4 w-4" />
            </button>
        @elseif($iconTrailing)
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-zinc-400 dark:text-zinc-500">
                <flux:icon :icon="$iconTrailing" class="h-4 w-4" />
            </span>
        @endif

        @if($suffix)
            <span class="inline-flex items-center pr-3 text-sm text-zinc-500 dark:text-zinc-400 shrink-0 select-none">
                {{ $suffix }}
            </span>
        @endif
    </div>

    @if($error)
        <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
            <flux:icon.exclamation-circle class="h-3.5 w-3.5 shrink-0" />
            {{ $error }}
        </p>
    @elseif($hint)
        <p class="mt-1.5 text-xs text-zinc-500 dark:text-zinc-400">{{ $hint }}</p>
    @endif
</div>
