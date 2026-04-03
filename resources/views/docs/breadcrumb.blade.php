<x-layouts.docs title="Breadcrumb">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Navigation</span><span>/</span><span>Breadcrumb</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Breadcrumb</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Fil d'Ariane indiquant la position de l'utilisateur dans la hiérarchie de navigation.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::breadcrumb :items="[
        ['label' => 'Accueil', 'href' => '/'],
        ['label' => 'Produits', 'href' => '/products'],
        ['label' => 'iPhone 15'],
    ]" />
</x-docs::demo>

<x-docs::code>&lt;x-ws::breadcrumb :items="[
    ['label' => 'Accueil', 'href' => '/'],
    ['label' => 'Produits', 'href' => '/products'],
    ['label' => 'iPhone 15'],
]" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['items',     'array',  '[]', 'Tableau d\'items : {label, href?, icon?}'],
    ['separator', 'string', '/', 'Séparateur entre les items'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec icônes</h2>
<x-docs::demo>
    <x-ws::breadcrumb :items="[
        ['label' => 'Accueil', 'href' => '/', 'icon' => 'home'],
        ['label' => 'Tableau de bord', 'href' => '/dashboard', 'icon' => 'squares-2x2'],
        ['label' => 'Rapports', 'href' => '/reports'],
        ['label' => 'Rapport mensuel'],
    ]" />
</x-docs::demo>
<x-docs::code>&lt;x-ws::breadcrumb :items="[
    ['label' => 'Accueil', 'href' => '/', 'icon' => 'home'],
    ['label' => 'Dashboard', 'href' => '/dashboard'],
    ['label' => 'Rapport mensuel'],
]" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Séparateurs personnalisés</h2>
<x-docs::demo>
    <div class="space-y-4">
        <x-ws::breadcrumb separator="/" :items="[
            ['label' => 'Accueil', 'href' => '/'],
            ['label' => 'Catégorie', 'href' => '/cat'],
            ['label' => 'Article'],
        ]" />
        <x-ws::breadcrumb separator=">" :items="[
            ['label' => 'Accueil', 'href' => '/'],
            ['label' => 'Catégorie', 'href' => '/cat'],
            ['label' => 'Article'],
        ]" />
        <x-ws::breadcrumb separator="•" :items="[
            ['label' => 'Accueil', 'href' => '/'],
            ['label' => 'Catégorie', 'href' => '/cat'],
            ['label' => 'Article'],
        ]" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::breadcrumb separator="/" :items="[...]" /&gt;
&lt;x-ws::breadcrumb separator="&gt;" :items="[...]" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Fil d'Ariane e-commerce</h2>
<x-docs::demo>
    <div class="space-y-3">
        <x-ws::breadcrumb :items="[
            ['label' => 'Boutique', 'href' => '/shop'],
            ['label' => 'Électronique', 'href' => '/shop/electronics'],
            ['label' => 'Smartphones', 'href' => '/shop/electronics/phones'],
            ['label' => 'Apple', 'href' => '/shop/electronics/phones/apple'],
            ['label' => 'iPhone 15 Pro'],
        ]" />
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.tabs') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Tabs</a>
    <a href="{{ route('docs.pagination') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Pagination →</a>
</div>

</x-layouts.docs>
