<x-layouts.docs title="Table">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Données</span><span>/</span><span>Table</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Table</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Tableau de données avec support des variantes striped, bordered, compact et responsive.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::table
        :columns="[
            ['key' => 'name',   'label' => 'Nom'],
            ['key' => 'email',  'label' => 'Email'],
            ['key' => 'role',   'label' => 'Rôle'],
            ['key' => 'status', 'label' => 'Statut'],
        ]"
        :rows="[
            ['name' => 'Jean Dupont',   'email' => 'jean@exemple.com',   'role' => 'Admin',      'status' => 'Actif'],
            ['name' => 'Marie Laurent', 'email' => 'marie@exemple.com',  'role' => 'Éditeur',    'status' => 'Actif'],
            ['name' => 'Paul Martin',   'email' => 'paul@exemple.com',   'role' => 'Lecteur',    'status' => 'Inactif'],
            ['name' => 'Sophie Bernard','email' => 'sophie@exemple.com', 'role' => 'Éditeur',    'status' => 'Actif'],
        ]"
        :hoverable="true"
    />
</x-docs::demo>

<x-docs::code>&lt;x-ws::table
    :columns="[
        ['key' =&gt; 'name',  'label' =&gt; 'Nom'],
        ['key' =&gt; 'email', 'label' =&gt; 'Email'],
        ['key' =&gt; 'role',  'label' =&gt; 'Rôle'],
    ]"
    :rows="[
        ['name' =&gt; 'Jean Dupont', 'email' =&gt; 'jean@exemple.com', 'role' =&gt; 'Admin'],
        ['name' =&gt; 'Marie Laurent', 'email' =&gt; 'marie@exemple.com', 'role' =&gt; 'Éditeur'],
    ]"
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['columns',    'array', '[]',    'Tableau de colonnes : {key, label}'],
    ['rows',       'array', '[]',    'Tableau de lignes : {key => value}'],
    ['striped',    'bool',  'false', 'Lignes alternées colorées'],
    ['hoverable',  'bool',  'true',  'Mise en évidence au survol'],
    ['bordered',   'bool',  'false', 'Bordures sur toutes les cellules'],
    ['compact',    'bool',  'false', 'Padding réduit pour plus de densité'],
    ['responsive', 'bool',  'true',  'Scroll horizontal sur mobile'],
    ['caption',    'string','null',  'Légende du tableau'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Striped</h2>
<x-docs::demo>
    <x-ws::table
        :striped="true"
        :columns="[
            ['key' => 'name',  'label' => 'Nom'],
            ['key' => 'email', 'label' => 'Email'],
            ['key' => 'role',  'label' => 'Rôle'],
        ]"
        :rows="[
            ['name' => 'Jean Dupont',    'email' => 'jean@exemple.com',    'role' => 'Admin'],
            ['name' => 'Marie Laurent',  'email' => 'marie@exemple.com',   'role' => 'Éditeur'],
            ['name' => 'Paul Martin',    'email' => 'paul@exemple.com',    'role' => 'Lecteur'],
            ['name' => 'Sophie Bernard', 'email' => 'sophie@exemple.com',  'role' => 'Éditeur'],
        ]"
    />
</x-docs::demo>
<x-docs::code>&lt;x-ws::table :striped="true" :columns="[...]" :rows="[...]" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Bordered</h2>
<x-docs::demo>
    <x-ws::table
        :bordered="true"
        :columns="[
            ['key' => 'product', 'label' => 'Produit'],
            ['key' => 'qty',     'label' => 'Qté'],
            ['key' => 'price',   'label' => 'Prix'],
        ]"
        :rows="[
            ['product' => 'iPhone 15',     'qty' => '12',  'price' => '999 €'],
            ['product' => 'MacBook Pro',   'qty' => '5',   'price' => '2 499 €'],
            ['product' => 'AirPods Pro',   'qty' => '24',  'price' => '279 €'],
        ]"
    />
</x-docs::demo>
<x-docs::code>&lt;x-ws::table :bordered="true" :columns="[...]" :rows="[...]" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Compact</h2>
<x-docs::demo>
    <x-ws::table
        :compact="true"
        :columns="[
            ['key' => 'name',  'label' => 'Nom'],
            ['key' => 'email', 'label' => 'Email'],
            ['key' => 'role',  'label' => 'Rôle'],
            ['key' => 'status','label' => 'Statut'],
        ]"
        :rows="[
            ['name' => 'Jean Dupont',    'email' => 'jean@exemple.com',    'role' => 'Admin',   'status' => 'Actif'],
            ['name' => 'Marie Laurent',  'email' => 'marie@exemple.com',   'role' => 'Éditeur', 'status' => 'Actif'],
            ['name' => 'Paul Martin',    'email' => 'paul@exemple.com',    'role' => 'Lecteur', 'status' => 'Inactif'],
            ['name' => 'Sophie Bernard', 'email' => 'sophie@exemple.com',  'role' => 'Éditeur', 'status' => 'Actif'],
        ]"
    />
</x-docs::demo>
<x-docs::code>&lt;x-ws::table :compact="true" :columns="[...]" :rows="[...]" /&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.steps') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Steps</a>
    <a href="{{ route('docs.stat') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Stat →</a>
</div>

</x-layouts.docs>
