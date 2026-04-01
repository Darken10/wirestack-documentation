@php $selectId = $id ?? $name ?? 'select-'.uniqid(); @endphp

<div {{ $attributes->only('class', 'wire:key') }}>
    @if($label)
        <label for="{{ $selectId }}" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">
            {{ $label }}
            @if($required) <span class="text-red-500 ml-0.5">*</span> @endif
        </label>
    @endif

    <div class="{{ $wrapperClasses() }}">
        <select
            id="{{ $selectId }}"
            name="{{ $name }}"
            @if($required) required @endif
            @if($disabled) disabled @endif
            {{ $attributes->except(['class', 'id', 'name', 'required', 'disabled', 'wire:key'])->class([$selectClasses()]) }}
        >
            @if($placeholder)
                <option value="" disabled selected>{{ $placeholder }}</option>
            @endif

            @if($slot->isNotEmpty())
                {{ $slot }}
            @else
                @foreach($options as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            @endif
        </select>

        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            <svg class="h-4 w-4 text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>

    @if($error)
        <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
            <x-heroicon-o-exclamation-circle class="h-3.5 w-3.5 shrink-0" />
            {{ $error }}
        </p>
    @elseif($hint)
        <p class="mt-1.5 text-xs text-zinc-500 dark:text-zinc-400">{{ $hint }}</p>
    @endif
</div>
