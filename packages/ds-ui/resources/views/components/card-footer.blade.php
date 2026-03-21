<div {{ $attributes->class([$paddingClass(), $separator ? 'border-t border-zinc-200 dark:border-zinc-800' : '', 'flex items-center gap-2', $alignClass()]) }}>
    {{ $slot }}
</div>
