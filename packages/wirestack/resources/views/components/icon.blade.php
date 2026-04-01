{{-- Renders a Heroicon via Flux's icon system --}}
<x-dynamic-component :component="'flux::icon.'.$name" {{ $attributes->class([$sizeClass]) }} />
