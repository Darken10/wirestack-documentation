{{-- Renders a Heroicon via Flux's icon system --}}
<x-dynamic-component :component="'heroicon-o-'.$name" {{ $attributes->class([$sizeClass]) }} />
