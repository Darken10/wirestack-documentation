<nav {{ $attributes->class([
    $orientation === 'vertical' ? 'flex flex-col space-y-0.5' : 'flex items-center gap-1',
]) }}>
    {{ $slot }}
</nav>
