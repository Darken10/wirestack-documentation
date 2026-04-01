<li {{ $attributes->class(['flex items-center flex-1']) }}>
    <div class="flex items-center">
        @php
            $isCompleted = $status === 'completed';
            $isCurrent   = $status === 'current';
            $isPending   = $status === 'pending';
        @endphp
        <span class="flex items-center justify-center h-9 w-9 rounded-full shrink-0 transition-colors text-sm font-semibold
            {{ $isCompleted ? 'bg-blue-600 text-white' : ($isCurrent ? 'border-2 border-blue-600 text-blue-600 bg-white dark:bg-zinc-900' : 'border-2 border-zinc-300 dark:border-zinc-600 text-zinc-500 dark:text-zinc-400 bg-white dark:bg-zinc-900') }}">
            @if($isCompleted)
                <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
            @elseif($icon)
                <x-dynamic-component :component="'flux::icon.'.$icon" class="h-4 w-4" />
            @else
                {{ $number }}
            @endif
        </span>

        @if($title)
            <div class="ml-3">
                <p class="text-sm font-medium {{ $isCurrent ? 'text-blue-600 dark:text-blue-400' : ($isCompleted ? 'text-zinc-900 dark:text-zinc-100' : 'text-zinc-500 dark:text-zinc-400') }}">
                    {{ $title }}
                </p>
                @if($description)
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">{{ $description }}</p>
                @endif
            </div>
        @endif
    </div>

    @if(!$last)
        <div class="hidden md:flex flex-1 items-center px-4" aria-hidden="true">
            <div class="h-0.5 w-full {{ $isCompleted ? 'bg-blue-600' : 'bg-zinc-200 dark:bg-zinc-700' }}"></div>
        </div>
    @endif
</li>
