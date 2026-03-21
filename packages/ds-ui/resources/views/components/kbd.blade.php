<kbd {{ $attributes->class([
    'inline-flex items-center justify-center font-mono rounded border border-b-2 font-medium',
    'bg-zinc-100 border-zinc-300 text-zinc-700 dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-300',
    $sizeClass(),
]) }}>{{ $slot }}</kbd>
