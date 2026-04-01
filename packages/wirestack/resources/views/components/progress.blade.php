<div {{ $attributes->class(['w-full']) }}>
    @if($label || $showValue)
        <div class="flex items-center justify-between mb-1.5">
            @if($label)
                <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">{{ $label }}</span>
            @endif
            @if($showValue)
                <span class="text-sm font-medium text-zinc-600 dark:text-zinc-400">{{ $percentage() }}%</span>
            @endif
        </div>
    @endif

    <div class="{{ $heightClass() }} w-full bg-zinc-200 dark:bg-zinc-700 rounded-full overflow-hidden">
        <div
            class="{{ $barColorClass() }} h-full rounded-full transition-all duration-500 ease-out
                {{ $striped ? 'ds-progress-striped' : '' }}
                {{ $animated ? 'ds-progress-animated' : '' }}"
            style="width: {{ $percentage() }}%"
            role="progressbar"
            aria-valuenow="{{ $value }}"
            aria-valuemin="0"
            aria-valuemax="{{ $max }}">
        </div>
    </div>
</div>
