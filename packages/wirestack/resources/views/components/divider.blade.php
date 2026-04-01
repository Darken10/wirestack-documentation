@if($orientation === 'vertical')
    <div {{ $attributes->class(['inline-block h-full min-h-[1em] w-px self-stretch', $lineClasses()]) }}></div>
@else
    @if($slot->isNotEmpty())
        <div {{ $attributes->class(['flex items-center gap-3 text-sm text-zinc-500 dark:text-zinc-400']) }}>
            @if($align === 'center' || $align === 'right')
                <div class="flex-1 border-t {{ $lineClasses() }}"></div>
            @endif
            <span class="shrink-0">{{ $slot }}</span>
            @if($align === 'left' || $align === 'center')
                <div class="flex-1 border-t {{ $lineClasses() }}"></div>
            @endif
        </div>
    @else
        <hr {{ $attributes->class(['border-t', $lineClasses()]) }} />
    @endif
@endif
