@if($inline)
    <code {{ $attributes->class([
        'inline-block px-1.5 py-0.5 text-sm font-mono rounded bg-zinc-100 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-200 border border-zinc-200 dark:border-zinc-700',
    ]) }}>{{ $slot }}</code>
@else
    <div {{ $attributes->class(['relative group rounded-xl overflow-hidden bg-zinc-950 dark:bg-zinc-950']) }}>
        @if($language)
            <div class="flex items-center justify-between px-4 py-2 border-b border-zinc-800">
                <span class="text-xs font-medium text-zinc-400 uppercase tracking-wide">{{ $language }}</span>
                @if($copy)
                    <x-ws::copy-button :text="trim((string) $slot)" />
                @endif
            </div>
        @elseif($copy)
            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                <x-ws::copy-button :text="trim((string) $slot)" />
            </div>
        @endif
@php $prismLang = match($language) { 'blade' => 'html', 'shell' => 'bash', default => $language }; @endphp
        <pre class="p-4 overflow-x-auto text-sm font-mono leading-relaxed"><code @class(['language-'.$prismLang => $language, 'language-plaintext' => !$language])>{{ $slot }}</code></pre>
    </div>
@endif
