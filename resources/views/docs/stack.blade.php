<x-layouts.docs title="Stack">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Layout</span><span>/</span><span>Stack</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Stack & Inline</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Composants de mise en page flexbox. <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">Stack</code> empile verticalement, <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">Inline</code> aligne horizontalement.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu — Stack">
    <div class="max-w-xs">
        <x-ws::stack gap="3">
            <x-ws::card><x-ws::card-body><p class="text-sm text-zinc-600 dark:text-zinc-400">Élément 1</p></x-ws::card-body></x-ws::card>
            <x-ws::card><x-ws::card-body><p class="text-sm text-zinc-600 dark:text-zinc-400">Élément 2</p></x-ws::card-body></x-ws::card>
            <x-ws::card><x-ws::card-body><p class="text-sm text-zinc-600 dark:text-zinc-400">Élément 3</p></x-ws::card-body></x-ws::card>
        </x-ws::stack>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::stack gap="4"&gt;
    &lt;x-ws::card&gt;...&lt;/x-ws::card&gt;
    &lt;x-ws::card&gt;...&lt;/x-ws::card&gt;
    &lt;x-ws::card&gt;...&lt;/x-ws::card&gt;
&lt;/x-ws::stack&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Stack</h2>
<x-docs::props :rows="[
    ['gap',   'string', '4',     '0 | 1 | 2 | 3 | 4 | 5 | 6 | 8 | 10 | 12'],
    ['align', 'string', 'start', 'start | center | end | stretch'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Inline</h2>
<x-docs::props :rows="[
    ['gap',     'string', '4',     '0 | 1 | 2 | 3 | 4 | 5 | 6 | 8 | 10 | 12'],
    ['align',   'string', 'center','start | center | end | baseline'],
    ['justify', 'string', 'start', 'start | center | end | between | around | evenly'],
    ['wrap',    'bool',   'false', 'Passe à la ligne si pas assez de place'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Stack — espacement</h2>
<x-docs::demo>
    <div class="grid grid-cols-3 gap-6">
        @foreach(['2','4','8'] as $gap)
            <div>
                <p class="text-xs text-zinc-500 mb-2 text-center">gap="{{ $gap }}"</p>
                <x-ws::stack :gap="$gap">
                    @foreach([1,2,3] as $n)
                        <div class="bg-blue-100 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-700 rounded p-2 text-center text-xs text-blue-600 dark:text-blue-400">{{ $n }}</div>
                    @endforeach
                </x-ws::stack>
            </div>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::stack gap="2"&gt;...&lt;/x-ws::stack&gt;
&lt;x-ws::stack gap="4"&gt;...&lt;/x-ws::stack&gt;
&lt;x-ws::stack gap="8"&gt;...&lt;/x-ws::stack&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Inline — boutons</h2>
<x-docs::demo>
    <x-ws::inline gap="2">
        <x-ws::button color="primary">Sauvegarder</x-ws::button>
        <x-ws::button color="neutral" variant="outline">Annuler</x-ws::button>
        <x-ws::button color="danger" variant="ghost">Supprimer</x-ws::button>
    </x-ws::inline>
</x-docs::demo>
<x-docs::code>&lt;x-ws::inline gap="2"&gt;
    &lt;x-ws::button color="primary"&gt;Sauvegarder&lt;/x-ws::button&gt;
    &lt;x-ws::button color="neutral" variant="outline"&gt;Annuler&lt;/x-ws::button&gt;
&lt;/x-ws::inline&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Inline — badges avec wrap</h2>
<x-docs::demo>
    <x-ws::inline gap="2" :wrap="true">
        @foreach(['Laravel','Livewire','Tailwind CSS','Alpine.js','PHP 8.4','Pest','Volt','Wirestack'] as $tag)
            <x-ws::badge color="primary" variant="soft">{{ $tag }}</x-ws::badge>
        @endforeach
    </x-ws::inline>
</x-docs::demo>
<x-docs::code>&lt;x-ws::inline gap="2" :wrap="true"&gt;
    &lt;x-ws::badge color="primary" variant="soft"&gt;Laravel&lt;/x-ws::badge&gt;
    &lt;x-ws::badge color="primary" variant="soft"&gt;Livewire&lt;/x-ws::badge&gt;
    ...
&lt;/x-ws::inline&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.panel') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Panel</a>
    <a href="{{ route('docs.nav') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Nav →</a>
</div>

</x-layouts.docs>
