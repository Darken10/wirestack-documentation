<x-layouts.docs title="DataTable">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Livewire</span><span>/</span><span>DataTable</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">DataTable</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Composant Livewire de tableau de données avec recherche, tri, pagination et sélection intégrés.</p>
        </div>
        <x-ws::badge variant="soft" color="warning">Livewire</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    @php
    $columns = [
        ['key' => 'name',   'label' => 'Nom',      'sortable' => true],
        ['key' => 'email',  'label' => 'Email',     'sortable' => true],
        ['key' => 'role',   'label' => 'Rôle'],
        ['key' => 'status', 'label' => 'Statut'],
        ['key' => 'joined', 'label' => 'Inscription', 'sortable' => true],
    ];
    $rows = [
        ['name' => 'Jean Dupont',     'email' => 'jean@exemple.com',     'role' => 'Admin',   'status' => 'Actif',   'joined' => '12 jan. 2024'],
        ['name' => 'Marie Laurent',   'email' => 'marie@exemple.com',    'role' => 'Éditeur', 'status' => 'Actif',   'joined' => '3 fév. 2024'],
        ['name' => 'Paul Martin',     'email' => 'paul@exemple.com',     'role' => 'Lecteur', 'status' => 'Inactif', 'joined' => '27 fév. 2024'],
        ['name' => 'Sophie Bernard',  'email' => 'sophie@exemple.com',   'role' => 'Éditeur', 'status' => 'Actif',   'joined' => '5 mars 2024'],
        ['name' => 'Lucas Petit',     'email' => 'lucas@exemple.com',    'role' => 'Admin',   'status' => 'Actif',   'joined' => '18 mars 2024'],
        ['name' => 'Emma Rousseau',   'email' => 'emma@exemple.com',     'role' => 'Lecteur', 'status' => 'Inactif', 'joined' => '2 avr. 2024'],
    ];
    @endphp
    <livewire:ws::data-table :columns="$columns" :rows="$rows" :searchable="true" :selectable="true" />
</x-docs::demo>

<x-docs::code>&#64;php
$columns = [
    ['key' =&gt; 'name',   'label' =&gt; 'Nom',   'sortable' =&gt; true],
    ['key' =&gt; 'email',  'label' =&gt; 'Email', 'sortable' =&gt; true],
    ['key' =&gt; 'role',   'label' =&gt; 'Rôle'],
    ['key' =&gt; 'status', 'label' =&gt; 'Statut'],
];
$rows = [
    ['name' =&gt; 'Jean Dupont',  'email' =&gt; 'jean@exemple.com',  'role' =&gt; 'Admin',   'status' =&gt; 'Actif'],
    ['name' =&gt; 'Marie Laurent','email' =&gt; 'marie@exemple.com', 'role' =&gt; 'Éditeur', 'status' =&gt; 'Actif'],
];
&#64;endphp

&lt;livewire:ws::data-table
    :columns="$columns"
    :rows="$rows"
    :searchable="true"
    :selectable="true"
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['columns',        'array', '[]',                    'Colonnes : {key, label, sortable?}'],
    ['rows',           'array', '[]',                    'Lignes de données'],
    ['searchable',     'bool',  'true',                  'Affiche une barre de recherche'],
    ['selectable',     'bool',  'false',                 'Cases à cocher pour sélection multiple'],
    ['exportable',     'bool',  'false',                 'Bouton d\'export CSV'],
    ['emptyMessage',   'string','No results found.',     'Message si aucun résultat'],
    ['perPageOptions', 'array', '[10, 15, 25, 50, 100]', 'Options du sélecteur par page'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Depuis un contrôleur Laravel</h2>
<x-docs::code>{{-- Contrôleur --}}
public function index(): View
{
    return view('users.index', [
        'columns' =&gt; [
            ['key' =&gt; 'name',       'label' =&gt; 'Nom',      'sortable' =&gt; true],
            ['key' =&gt; 'email',      'label' =&gt; 'Email',    'sortable' =&gt; true],
            ['key' =&gt; 'created_at', 'label' =&gt; 'Créé le',  'sortable' =&gt; true],
        ],
        'rows' =&gt; User::select('id', 'name', 'email', 'created_at')
            -&gt;get()
            -&gt;map(fn($u) =&gt; [
                'name'       =&gt; $u-&gt;name,
                'email'      =&gt; $u-&gt;email,
                'created_at' =&gt; $u-&gt;created_at-&gt;format('d/m/Y'),
            ])-&gt;toArray(),
    ]);
}

{{-- Vue --}}
&lt;livewire:ws::data-table
    :columns="$columns"
    :rows="$rows"
    :searchable="true"
    :selectable="true"
    :exportable="true"
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Sans recherche</h2>
<x-docs::demo>
    @php
    $simpleColumns = [
        ['key' => 'product', 'label' => 'Produit', 'sortable' => true],
        ['key' => 'qty',     'label' => 'Qté',     'sortable' => true],
        ['key' => 'price',   'label' => 'Prix'],
    ];
    $simpleRows = [
        ['product' => 'iPhone 15',    'qty' => '12', 'price' => '999 €'],
        ['product' => 'MacBook Pro',  'qty' => '5',  'price' => '2 499 €'],
        ['product' => 'AirPods Pro',  'qty' => '24', 'price' => '279 €'],
        ['product' => 'iPad Air',     'qty' => '8',  'price' => '699 €'],
    ];
    @endphp
    <livewire:ws::data-table :columns="$simpleColumns" :rows="$simpleRows" :searchable="false" />
</x-docs::demo>
<x-docs::code>&lt;livewire:ws::data-table
    :columns="$columns"
    :rows="$rows"
    :searchable="false"
/&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.toast') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Toast</a>
    <a href="{{ route('docs.command-palette') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">CommandPalette →</a>
</div>

</x-layouts.docs>
