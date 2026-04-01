@if($separator)
    <div class="my-1 border-t border-zinc-100 dark:border-zinc-800"></div>
@else
    @if(str_starts_with($href, '#') || !$href)
        <button type="button"
            {{ $attributes->class([$itemClasses()]) }}
            @if($disabled) disabled @endif>
            @if($icon)
                <x-dynamic-component :component="'flux::icon.'.$icon" class="h-4 w-4 shrink-0" />
            @endif
            {{ $slot }}
        </button>
    @else
        <a href="{{ $href }}"
            {{ $attributes->class([$itemClasses()]) }}
            @if($disabled) aria-disabled="true" @endif>
            @if($icon)
                <x-dynamic-component :component="'flux::icon.'.$icon" class="h-4 w-4 shrink-0" />
            @endif
            {{ $slot }}
        </a>
    @endif
@endif
