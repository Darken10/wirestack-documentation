<nav {{ $attributes->class(['flex']) }} aria-label="Breadcrumb">
    <ol class="flex items-center flex-wrap gap-1 {{ $sizeClass() }}">
        @if(!empty($items))
            @foreach($items as $index => $item)
                <li class="flex items-center gap-1">
                    @if($loop->last)
                        <span class="text-zinc-500 dark:text-zinc-400 font-medium" aria-current="page">
                            {{ is_array($item) ? ($item['label'] ?? $item[0]) : $item }}
                        </span>
                    @else
                        <a href="{{ is_array($item) ? ($item['url'] ?? '#') : '#' }}"
                           class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors font-medium">
                            {{ is_array($item) ? ($item['label'] ?? $item[0]) : $item }}
                        </a>
                        <span class="text-zinc-400 dark:text-zinc-600 select-none" aria-hidden="true">{{ $separator }}</span>
                    @endif
                </li>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </ol>
</nav>
