<x-layouts.docs title="Panel">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Layout</span><span>/</span><span>Panel</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Panel</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Conteneur simple et léger avec bordure optionnelle. Moins structuré que Card, idéal pour regrouper du contenu.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-4">
        <x-ws::panel title="Panel avec titre">
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Contenu du panel avec un titre visible en en-tête.</p>
        </x-ws::panel>
        <x-ws::panel>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Panel sans titre. Simple conteneur avec bordure.</p>
        </x-ws::panel>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::panel title="Titre du panel"&gt;
    Contenu...
&lt;/x-ws::panel&gt;

&lt;x-ws::panel&gt;
    Contenu sans titre...
&lt;/x-ws::panel&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['title',   'string', 'null',     'Titre affiché en haut du panel'],
    ['variant', 'string', 'bordered', 'Style du panel : bordered, filled'],
    ['color',   'string', 'neutral',  'Couleur : neutral, white, primary, success, warning, danger'],
    ['padding', 'string', 'md',       'Taille du padding interne : none, sm, md, lg'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec titre</h2>
<x-docs::demo>
    <x-ws::panel title="Statistiques du mois">
        <div class="grid grid-cols-3 gap-4 text-center">
            <div>
                <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">1 284</p>
                <p class="text-xs text-zinc-500">Visiteurs</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">342</p>
                <p class="text-xs text-zinc-500">Conversions</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">26,6%</p>
                <p class="text-xs text-zinc-500">Taux</p>
            </div>
        </div>
    </x-ws::panel>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variante filled</h2>
<x-docs::demo>
    <x-ws::panel variant="filled" title="Panel sans bordure">
        <p class="text-sm text-zinc-600 dark:text-zinc-400">Ce panel n'a pas de bordure visible. Utile pour les zones de fond coloré.</p>
    </x-ws::panel>
</x-docs::demo>
<x-docs::code>&lt;x-ws::panel variant="filled" title="Titre"&gt;
    Contenu...
&lt;/x-ws::panel&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <div class="space-y-3">
        @foreach(['neutral', 'primary', 'success', 'warning', 'danger'] as $col)
            <x-ws::panel :color="$col" :title="ucfirst($col)">
                <p class="text-xs text-zinc-600 dark:text-zinc-400">Panel avec la couleur {{ $col }}.</p>
            </x-ws::panel>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::panel color="success" title="Succès"&gt;
    Contenu...
&lt;/x-ws::panel&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Paddings</h2>
<x-docs::demo>
    <div class="space-y-3">
        @foreach(['sm','md','lg'] as $pad)
            <x-ws::panel :title="'Padding ' . $pad" :padding="$pad">
                <p class="text-xs text-zinc-500">Contenu avec padding {{ $pad }}</p>
            </x-ws::panel>
        @endforeach
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.section') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Section</a>
    <a href="{{ route('docs.stack') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Stack →</a>
</div>

</x-layouts.docs>
