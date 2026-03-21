<div {{ $attributes->class(['flex rounded-lg overflow-hidden border border-zinc-300 dark:border-zinc-700 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-colors']) }}>
    @if($prefix)
        <span class="{{ $addonClasses() }} border-r border-zinc-300 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 select-none">
            {{ $prefix }}
        </span>
    @endif

    {{ $slot }}

    @if($suffix)
        <span class="{{ $addonClasses() }} border-l border-zinc-300 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 select-none">
            {{ $suffix }}
        </span>
    @endif
</div>
