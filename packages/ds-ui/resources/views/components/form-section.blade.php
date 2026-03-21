<div {{ $attributes->class(['space-y-6']) }}>
    @if($title || $description)
        <div>
            @if($title)
                <h3 class="text-base font-semibold text-zinc-900 dark:text-zinc-100">{{ $title }}</h3>
            @endif
            @if($description)
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ $description }}</p>
            @endif
        </div>
    @endif
    {{ $slot }}
</div>
