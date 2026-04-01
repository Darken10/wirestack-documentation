<div {{ $attributes->class([$maxWidthClass(), $paddingClass(), $center ? 'mx-auto' : '', 'w-full']) }}>
    {{ $slot }}
</div>
