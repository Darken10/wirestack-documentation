<x-layouts.docs title="Badge">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Badge</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Badge</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Étiquettes compactes pour indiquer un statut, une catégorie ou un compteur.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-2 items-center">
        <x-ws::badge variant="soft" color="primary">Primary</x-ws::badge>
        <x-ws::badge variant="soft" color="success">Succès</x-ws::badge>
        <x-ws::badge variant="soft" color="danger">Erreur</x-ws::badge>
        <x-ws::badge variant="soft" color="warning">Attention</x-ws::badge>
        <x-ws::badge variant="soft" color="info">Info</x-ws::badge>
        <x-ws::badge variant="solid" color="primary">Solid</x-ws::badge>
        <x-ws::badge variant="outline" color="neutral">Outline</x-ws::badge>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::badge color="primary"&gt;Primary&lt;/x-ws::badge&gt;
&lt;x-ws::badge color="success"&gt;Succès&lt;/x-ws::badge&gt;
&lt;x-ws::badge variant="solid" color="primary"&gt;Solid&lt;/x-ws::badge&gt;
&lt;x-ws::badge variant="outline" color="neutral"&gt;Outline&lt;/x-ws::badge&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['variant', 'string', 'soft',    'soft | solid | outline'],
    ['color',   'string', 'primary', 'primary | secondary | success | danger | warning | info | neutral'],
    ['size',    'string', 'sm',      'xs | sm | md | lg'],
    ['rounded', 'string', 'full',    'none | sm | md | lg | full'],
    ['icon',    'string', '',        'Nom d\'icône Heroicons (avant le texte)'],
    ['dot',     'bool',   'false',   'Affiche un point coloré au lieu d\'une icône'],
    ['dismiss', 'bool',   'false',   'Affiche un bouton de fermeture'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variants</h2>
<x-docs::demo>
    <div class="space-y-3">
        <div class="flex flex-wrap gap-2">
            @foreach(['primary','secondary','success','danger','warning','info','neutral'] as $c)
                <x-ws::badge variant="soft" :color="$c">{{ ucfirst($c) }}</x-ws::badge>
            @endforeach
        </div>
        <div class="flex flex-wrap gap-2">
            @foreach(['primary','secondary','success','danger','warning','info','neutral'] as $c)
                <x-ws::badge variant="solid" :color="$c">{{ ucfirst($c) }}</x-ws::badge>
            @endforeach
        </div>
        <div class="flex flex-wrap gap-2">
            @foreach(['primary','secondary','success','danger','warning','info','neutral'] as $c)
                <x-ws::badge variant="outline" :color="$c">{{ ucfirst($c) }}</x-ws::badge>
            @endforeach
        </div>
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-2 items-center">
        <x-ws::badge size="xs" color="primary">XS</x-ws::badge>
        <x-ws::badge size="sm" color="primary">SM</x-ws::badge>
        <x-ws::badge size="md" color="primary">MD</x-ws::badge>
        <x-ws::badge size="lg" color="primary">LG</x-ws::badge>
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec icône et dot</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-2 items-center">
        <x-ws::badge color="success" icon="check-circle">Vérifié</x-ws::badge>
        <x-ws::badge color="warning" icon="exclamation-triangle">Attention</x-ws::badge>
        <x-ws::badge color="info" :dot="true">En ligne</x-ws::badge>
        <x-ws::badge color="danger" :dot="true">Hors ligne</x-ws::badge>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::badge color="success" icon="check-circle"&gt;Vérifié&lt;/x-ws::badge&gt;
&lt;x-ws::badge color="info" :dot="true"&gt;En ligne&lt;/x-ws::badge&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Dismissible</h2>
<x-docs::demo x-data="{ show: true }">
    <x-ws::badge color="primary" :dismiss="true" x-show="show" @dismiss="show=false">
        Dismissible
    </x-ws::badge>
    <button x-show="!show" @click="show=true" class="text-xs text-blue-500 underline">Réafficher</button>
</x-docs::demo>
<x-docs::code>&lt;x-ws::badge color="primary" :dismiss="true" x-show="show" @dismiss="show=false"&gt;
    Dismissible
&lt;/x-ws::badge&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.button') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Button</a>
    <a href="{{ route('docs.avatar') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Avatar →</a>
</div>

</x-layouts.docs>
