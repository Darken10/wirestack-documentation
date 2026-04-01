<div {{ $attributes->class(['w-full']) }}>
    <div class="{{ $heightClass() }} flex overflow-hidden rounded-full bg-zinc-200 dark:bg-zinc-700">
        @foreach($segments as $segment)
            <div
                class="h-full transition-all duration-500 {{ $segment['color'] ?? 'bg-blue-600' }}"
                style="width: {{ $segment['value'] ?? 0 }}%"
                title="{{ $segment['label'] ?? '' }}">
            </div>
        @endforeach
    </div>

    @if(isset($legend))
        <div class="flex flex-wrap gap-3 mt-2">
            @foreach($segments as $segment)
                <div class="flex items-center gap-1.5 text-xs text-zinc-600 dark:text-zinc-400">
                    <span class="h-2 w-2 rounded-full {{ $segment['color'] ?? 'bg-blue-600' }}"></span>
                    {{ $segment['label'] ?? '' }}
                    <span class="font-medium">{{ $segment['value'] ?? 0 }}%</span>
                </div>
            @endforeach
        </div>
    @endif
</div>
