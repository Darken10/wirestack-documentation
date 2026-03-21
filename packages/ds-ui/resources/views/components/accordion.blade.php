<div
    x-data="{ openItem: null }"
    {{ $attributes->class([
        'divide-y divide-zinc-200 dark:divide-zinc-800',
        $variant === 'bordered' ? 'border border-zinc-200 dark:border-zinc-800 rounded-xl overflow-hidden' : '',
    ]) }}>
    {{ $slot }}
</div>
