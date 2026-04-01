<{{ $tag }}
    @if($tag === 'a') href="{{ $href }}"
    @else type="{{ $type }}"
    @endif
    @if($disabled || $loading) disabled aria-disabled="true" @endif
    @if($confirm) onclick="return confirm('{{ $confirm }}')" @endif
    {{ $attributes->class([
        $variantClasses['base'],
        $variantClasses['size'],
        $variantClasses['radius'],
        $variantClasses['color'],
        $variantClasses['full'],
        $variantClasses['disabled'],
    ]) }}
>
    @if($loading)
        <x-ds::spinner size="sm" color="current" />
    @elseif($icon)
        <x-dynamic-component :component="'heroicon-o-'.$icon" class="{{ $square ? 'h-5 w-5' : 'h-4 w-4' }}" />
    @endif

    @if(!$square)
        {{ $slot }}
    @endif

    @if($iconTrailing && !$loading && !$square)
        <x-dynamic-component :component="'heroicon-o-'.$iconTrailing" class="h-4 w-4 ml-auto" />
    @endif
</{{ $tag }}>
