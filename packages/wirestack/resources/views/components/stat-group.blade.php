<div {{ $attributes->class([
    'grid gap-4',
    $gridClass(),
    $variant === 'bordered' ? 'border border-zinc-200 dark:border-zinc-800 rounded-2xl overflow-hidden divide-y sm:divide-y-0 sm:divide-x divide-zinc-200 dark:divide-zinc-800' : '',
]) }}>
    {{ $slot }}
</div>
