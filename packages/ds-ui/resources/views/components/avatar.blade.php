<span {{ $attributes->class(['relative inline-flex items-center justify-center shrink-0 font-semibold overflow-hidden', $sizeClasses, $shapeClasses, !$src ? $bgClasses : '']) }}>
    @if($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="h-full w-full object-cover {{ $shapeClasses }}" />
    @elseif($initials)
        <span class="select-none leading-none">{{ strtoupper($initials) }}</span>
    @else
        <flux:icon.user class="h-1/2 w-1/2" />
    @endif

    @if($status)
        <span class="{{ $statusClasses }} {{ $statusDotClasses }}"></span>
    @endif
</span>
