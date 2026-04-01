<button
    type="button"
    x-data="{ copied: false }"
    x-on:click="navigator.clipboard.writeText({{ Js::from($text) }}).then(() => { copied = true; setTimeout(() => copied = false, 1500); })"
    {{ $attributes->class([
        'inline-flex items-center gap-1.5 rounded-md px-2 py-1 text-xs font-medium transition-colors',
        'bg-zinc-700 hover:bg-zinc-600 text-zinc-200',
    ]) }}>
    <span x-show="!copied">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
        </svg>
    </span>
    <span x-show="copied" class="text-emerald-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    </span>
    <span x-text="copied ? 'Copied!' : 'Copy'"></span>
</button>
