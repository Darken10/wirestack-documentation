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
            trendValue="+12%"
            icon="users"
            iconColor="primary"
            description="vs mois dernier"
        />
        <x-ws::stat
            label="Revenus"
            value="€48 230"
            trend="up"
            trendValue="+8.5%"
            icon="banknotes"
            iconColor="success"
            description="ce mois-ci"
        />
        <x-ws::stat
            label="Commandes"
            value="3 492"
            trend="down"
            trendValue="-3.2%"
            icon="shopping-bag"
            iconColor="warning"
            description="vs semaine passée"
        />
        <x-ws::stat
            label="Croissance"
            value="24.6%"
            trend="up"
            trendValue="+2.1%"
            icon="arrow-trending-up"
            iconColor="info"
            description="taux mensuel"
        />
    </x-ws::stat-group>
</x-docs::demo>

<x-docs::code>&lt;x-ws::stat-group&gt;
    &lt;x-ws::stat
        label="Utilisateurs"
        value="12 847"
        trend="up"
        trendValue="+12%"
        icon="users"
        description="vs mois dernier"
    /&gt;
    &lt;x-ws::stat
        label="Revenus"
        value="€48 230"
        trend="up"
        trendValue="+8.5%"
        icon="banknotes"
        iconColor="success"
    /&gt;
&lt;/x-ws::stat-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Stat</h2>
<x-docs::props :rows="[
    ['label',       'string', '',      'Label de la métrique'],
    ['value',       'string', '',      'Valeur principale à mettre en avant'],
    ['trend',       'string', 'null',  'up | down — direction de la tendance'],
    ['trendValue',  'string', 'null',  'Valeur de variation (+12%, -3%)'],
    ['trendColor',  'string', 'auto',  'Couleur forcée de la tendance'],
    ['icon',        'string', '',      'Icône Heroicons'],
    ['iconColor',   'string', 'primary','Couleur de l\'icône'],
    ['description', 'string', 'null',  'Texte descriptif secondaire'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Stat simple sans icône</h2>
<x-docs::demo>
    <x-ws::stat-group>
        <x-ws::stat label="Total ventes" value="€124 580" trend="up" trendValue="+18%" />
        <x-ws::stat label="Nouveaux clients" value="847" trend="up" trendValue="+7%" />
        <x-ws::stat label="Tickets ouverts" value="23" trend="down" trendValue="-15%" />
    </x-ws::stat-group>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tendances</h2>
<x-docs::demo>
    <x-ws::stat-group>
        <x-ws::stat label="Hausse" value="92%" trend="up" trendValue="+24%" icon="arrow-trending-up" iconColor="success" />
        <x-ws::stat label="Baisse" value="47%" trend="down" trendValue="-8%" icon="arrow-trending-down" iconColor="danger" />
        <x-ws::stat label="Stable" value="68%" icon="minus" iconColor="neutral" description="Aucun changement" />
    </x-ws::stat-group>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.table') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Table</a>
    <a href="{{ route('docs.timeline') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Timeline →</a>
</div>

</x-layouts.docs>
