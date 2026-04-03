@props(['label' => null, 'class' => ''])
<div class="rounded-xl border border-zinc-200 dark:border-zinc-700 overflow-hidden my-5">
    @if($label)
        <div class="px-4 py-2 border-b border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800/60">
            <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">{{ $label }}</span>
        </div>
    @endif
    <div class="p-6 bg-white dark:bg-zinc-900 {{ $class }}">
        {{ $slot }}
    </div>
</div>
