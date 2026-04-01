{{-- Renders a Heroicon (outline or solid) --}}
<x-dynamic-component :component="'heroicon-'.($variant === 'solid' ? 's' : 'o').'-'.$name" {{ $attributes->class([$sizeClass]) }} />
