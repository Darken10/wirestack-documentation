@php $textareaId = $id ?? $name ?? 'textarea-'.uniqid(); @endphp

<div {{ $attributes->only('class', 'wire:key') }}>
    @if($label)
        <label for="{{ $textareaId }}" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">
            {{ $label }}
            @if($required) <span class="text-red-500 ml-0.5">*</span> @endif
        </label>
    @endif

    <div class="{{ $wrapperClasses() }}">
        <textarea
            id="{{ $textareaId }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            @if($autoresize) x-data x-on:input="$el.style.height='auto'; $el.style.height=($el.scrollHeight)+'px'" @endif
            {{ $attributes->except(['class', 'id', 'name', 'rows', 'placeholder', 'required', 'disabled', 'readonly', 'wire:key'])->class([$textareaClasses()]) }}
        >{{ $slot }}</textarea>
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
