<section {{ $attributes->class([$paddingClass()]) }}>
    @if($title || $description)
        <div class="mb-10 {{ $align === 'center' ? 'text-center' : ($align === 'right' ? 'text-right' : 'text-left') }}">
            @if($title)
                <h2 class="text-2xl font-bold tracking-tight text-zinc-900 dark:text-zinc-100 sm:text-3xl">{{ $title }}</h2>
            @endif
            @if($description)
                <p class="mt-3 text-base text-zinc-600 dark:text-zinc-400 max-w-2xl {{ $align === 'center' ? 'mx-auto' : '' }}">{{ $description }}</p>
            @endif
        </div>
    @endif
    {{ $slot }}
</section>
