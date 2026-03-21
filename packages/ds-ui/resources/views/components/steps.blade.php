<nav {{ $attributes->class(['w-full']) }} aria-label="Progress">
    <ol class="{{ $orientation === 'vertical' ? 'flex flex-col space-y-4' : 'flex items-center' }}">
        {{ $slot }}
    </ol>
</nav>
