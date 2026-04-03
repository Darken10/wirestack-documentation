@props(['lang' => 'blade', 'label' => null])
<div class="relative rounded-xl overflow-hidden border border-zinc-200 dark:border-zinc-700 my-5"
    x-data="{ copied: false }">
    @if($label)
        <div class="flex items-center justify-between px-4 py-2 bg-zinc-100 dark:bg-zinc-800 border-b border-zinc-200 dark:border-zinc-700">
            <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400 font-mono">{{ $label }}</span>
        </div>
    @endif
    <div class="relative group">
        <pre class="code-block bg-zinc-950 text-zinc-100 p-5 text-[13px] leading-relaxed overflow-x-auto"><code>{{ $slot }}</code></pre>
        <button @click="
            navigator.clipboard.writeText($el.closest('.relative').querySelector('code').textContent);
            copied = true;
            setTimeout(() => copied = false, 2000);
        " class="absolute top-3 right-3 p-1.5 rounded-md bg-zinc-800 hover:bg-zinc-700 text-zinc-400 hover:text-zinc-100 transition-all opacity-0 group-hover:opacity-100" title="Copier">
            <svg x-show="!copied" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184"/>
            </svg>
            <svg x-show="copied" class="h-3.5 w-3.5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
            </svg>
        </button>
    </div>
</div>
