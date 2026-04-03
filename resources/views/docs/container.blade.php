<x-layouts.docs title="Container">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Layout</span><span>/</span><span>Container</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Container</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Contrainte la largeur maximale du contenu et le centre horizontalement. Indispensable pour les mises en page.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-3">
        @foreach(['sm','md','lg','xl','2xl'] as $size)
            <x-ws::container :size="$size">
                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-lg p-2 text-center">
                    <span class="text-xs font-mono text-blue-600 dark:text-blue-400">size="{{ $size }}"</span>
                </div>
            </x-ws::container>
        @endforeach
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::container size="xl"&gt;
    Contenu limité en largeur...
&lt;/x-ws::container&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['size',    'string', 'xl',   'sm | md | lg | xl | 2xl | full'],
    ['center',  'bool',   'true', 'Centrage horizontal (mx-auto)'],
    ['padding', 'string', 'md',   'Padding horizontal : none, sm, md, lg'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Largeurs disponibles</h2>
<x-docs::demo>
    <div class="space-y-2 overflow-hidden">
        @foreach([
            ['sm',   '640px'],
            ['md',   '768px'],
            ['lg',   '1024px'],
            ['xl',   '1280px'],
            ['2xl',  '1536px'],
            ['full', '100%'],
        ] as [$size, $width])
            <div class="flex items-center gap-3">
                <span class="text-xs font-mono text-zinc-500 w-8">{{ $size }}</span>
                <div class="flex-1 bg-zinc-100 dark:bg-zinc-800 rounded">
                    <div
                        class="bg-blue-400 dark:bg-blue-600 rounded h-6 flex items-center justify-end pr-2"
                        style="width: min(100%, {{ $width }})"
                    >
                        <span class="text-xs text-white font-mono">{{ $width }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Utilisation dans une page</h2>
<x-docs::demo>
    <x-ws::container size="lg">
        <x-ws::card>
            <x-ws::card-header title="Page exemple" description="Contenu centré avec Container size=lg" />
            <x-ws::card-body>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                    Ce contenu est limité à 1024px de large et centré automatiquement.
                    Utilisez <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">x-ws::container</code> pour toutes vos mises en page.
                </p>
            </x-ws::card-body>
        </x-ws::card>
    </x-ws::container>
</x-docs::demo>
<x-docs::code>&lt;x-ws::container size="lg"&gt;
    &lt;x-ws::card&gt;
        &lt;x-ws::card-body&gt;
            Contenu centré et limité en largeur
        &lt;/x-ws::card-body&gt;
    &lt;/x-ws::card&gt;
&lt;/x-ws::container&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.card') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Card</a>
    <a href="{{ route('docs.section') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Section →</a>
</div>

</x-layouts.docs>
