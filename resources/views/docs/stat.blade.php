<x-layouts.docs title="Stat">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Données</span><span>/</span><span>Stat</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Stat</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Affiche une métrique clé avec label, valeur, tendance et icône. Utilisez <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">StatGroup</code> pour les regrouper.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::stat-group>
        <x-ws::stat
            label="Utilisateurs"
            value="12 847"
            trend="up"
            trend-value="+12%"
            icon="users"
            icon-color="primary"
            description="vs mois dernier"
        />
        <x-ws::stat
            label="Revenus"
            value="€48 230"
            trend="up"
            trend-value="+8.5%"
            icon="banknotes"
            icon-color="success"
            description="ce mois-ci"
        />
        <x-ws::stat
            label="Commandes"
            value="3 492"
            trend="down"
            trend-value="-3.2%"
            icon="shopping-bag"
            icon-color="warning"
            description="vs semaine passée"
        />
        <x-ws::stat
            label="Croissance"
            value="24.6%"
            trend="up"
            trend-value="+2.1%"
            icon="arrow-trending-up"
            icon-color="info"
            description="taux mensuel"
        />
    </x-ws::stat-group>
</x-docs::demo>

<x-docs::code>&lt;x-ws::stat-group :cols="4"&gt;
    &lt;x-ws::stat
        label="Utilisateurs"
        value="12 847"
        trend="up"
        trend-value="+12%"
        icon="users"
        icon-color="primary"
        description="vs mois dernier"
    /&gt;
    &lt;x-ws::stat
        label="Revenus"
        value="€48 230"
        trend="up"
        trend-value="+8.5%"
        icon="banknotes"
        icon-color="success"
    /&gt;
&lt;/x-ws::stat-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Stat</h2>
<x-docs::props :rows="[
    ['label',       'string', '—',      'Libellé de la métrique'],
    ['value',       'string', '—',      'Valeur principale mise en évidence'],
    ['trend',       'string', 'null',  'up | down | neutral'],
    ['trend-value', 'string', 'null',  'Variation affichée (ex: +12.5%, -0.4s)'],
    ['trend-color', 'string', 'auto',  'Couleur forcée de la tendance'],
    ['icon',        'string', '—',     'Icône Heroicons'],
    ['icon-color',  'string', 'primary','Couleur de fond de l\'icône'],
    ['description', 'string', 'null',  'Texte secondaire sous la valeur'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-6 mb-2">Props — StatGroup</h2>
<x-docs::props :rows="[
    ['cols',    'int',    '3',        'Nombre de colonnes (1 à 4)'],
    ['variant', 'string', 'bordered', 'Style des cartes stat'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Stat simple sans icône</h2>
<x-docs::demo>
    <x-ws::stat-group>
        <x-ws::stat label="Total ventes" value="€124 580" trend="up" trend-value="+18%" />
        <x-ws::stat label="Nouveaux clients" value="847" trend="up" trend-value="+7%" />
        <x-ws::stat label="Tickets ouverts" value="23" trend="down" trend-value="-15%" />
    </x-ws::stat-group>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tendances</h2>
<x-docs::demo>
    <x-ws::stat-group>
        <x-ws::stat label="Hausse" value="92%" trend="up" trend-value="+24%" icon="arrow-trending-up" icon-color="success" />
        <x-ws::stat label="Baisse" value="47%" trend="down" trend-value="-8%" icon="arrow-trending-down" icon-color="danger" />
        <x-ws::stat label="Stable" value="68%" trend="neutral" icon="minus" icon-color="neutral" description="Aucun changement" />
    </x-ws::stat-group>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.table') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Table</a>
    <a href="{{ route('docs.timeline') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Timeline →</a>
</div>

</x-layouts.docs>
