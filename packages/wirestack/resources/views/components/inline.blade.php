<div {{ $attributes->class([
    'flex',
    $wrap ? 'flex-wrap' : 'flex-nowrap',
    'gap-'.$gap,
    'items-'.$align,
    'justify-'.$justify,
]) }}>
    {{ $slot }}
</div>
