<div {{ $attributes->class([$cardClasses]) }}>
    @if(isset($header))
        {{ $header }}
    @endif

    @if(isset($body))
        {{ $body }}
    @elseif(isset($header) || isset($footer))
        <div class="{{ $paddingClass() }}">{{ $slot }}</div>
    @else
        <div class="{{ $paddingClass() }}">{{ $slot }}</div>
    @endif

    @if(isset($footer))
        {{ $footer }}
    @endif
</div>
