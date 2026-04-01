@php $checkId = $id ?? $name.'-checkbox-'.uniqid(); @endphp

<div {{ $attributes->only('class', 'wire:key') }}>
    <div class="flex items-start gap-3">
        <div class="flex items-center h-5 mt-0.5">
            <input
                id="{{ $checkId }}"
                name="{{ $name }}"
                type="checkbox"
                value="{{ $value }}"
                @if($required) required @endif
                @if($disabled) disabled @endif
                {{ $attributes->except(['class', 'id', 'name', 'type', 'value', 'required', 'disabled', 'wire:key'])->class([
                    'rounded border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 transition-colors cursor-pointer',
                    'dark:checked:bg-blue-600 dark:checked:border-blue-600',
                    'focus:ring-offset-0',
                    $colorClasses(),
                    $sizeClass(),
                    $disabled ? 'opacity-50 cursor-not-allowed' : '',
                ]) }}
            />
        </div>
        @if($label || $slot->isNotEmpty())
            <div>
                <label for="{{ $checkId }}" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 {{ $disabled ? 'opacity-50' : 'cursor-pointer' }}">
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
