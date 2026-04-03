<x-layouts.docs title="Tabs">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Navigation</span><span>/</span><span>Tabs</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Tabs</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Navigation par onglets avec plusieurs variantes visuelles. Piloté par Alpine.js pour la gestion de l'état actif.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu — Underline">
    <x-ws::tabs
        :tabs="[
            ['id' => 'overview',  'label' => 'Vue d\'ensemble', 'icon' => 'home'],
            ['id' => 'activity',  'label' => 'Activité',        'icon' => 'chart-bar', 'badge' => '5'],
            ['id' => 'settings',  'label' => 'Paramètres',      'icon' => 'cog-6-tooth'],
        ]"
        variant="underline"
        active="overview"
    />
</x-docs::demo>

<x-docs::code>&lt;x-ws::tabs
    :tabs="[
        ['id' => 'overview',  'label' => 'Vue d\'ensemble', 'icon' => 'home'],
        ['id' => 'activity',  'label' => 'Activité',        'icon' => 'chart-bar', 'badge' => '5'],
        ['id' => 'settings',  'label' => 'Paramètres',      'icon' => 'cog-6-tooth'],
    ]"
    variant="underline"
    active="overview"
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Tabs</h2>
<x-docs::props :rows="[
    ['tabs',    'array',  '—',          'Tableau de définition d\'onglets (id, label, icon, badge, disabled)'],
    ['variant', 'string', 'underline',  'underline | pills | boxed'],
    ['size',    'string', 'md',         'sm | md | lg'],
    ['color',   'string', 'primary',    'Couleur de l\'onglet actif'],
    ['align',   'string', 'left',       'left | center | right'],
    ['full',    'bool',   'false',      'Les onglets prennent toute la largeur'],
    ['active',  'string', 'premier id', 'ID de l\'onglet actif par défaut'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-6 mb-2">Props — Tab (slot)</h2>
<x-docs::props :rows="[
    ['id',       'string', '—',     'Identifiant unique de l\'onglet'],
    ['label',    'string', '—',     'Libellé affiché'],
    ['icon',     'string', '—',     'Icône Heroicons'],
    ['badge',    'string', '—',     'Badge numérique sur l\'onglet'],
    ['disabled', 'bool',   'false', 'Désactive l\'onglet'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variante — Pills</h2>
<x-docs::demo>
    <x-ws::tabs
        :tabs="[
            ['id' => 'dashboard', 'label' => 'Tableau de bord', 'icon' => 'home'],
            ['id' => 'stats',     'label' => 'Statistiques',    'icon' => 'chart-bar'],
            ['id' => 'settings',  'label' => 'Paramètres',      'icon' => 'cog-6-tooth'],
            ['id' => 'team',      'label' => 'Équipe',           'icon' => 'users'],
        ]"
        variant="pills"
    />
</x-docs::demo>
<x-docs::code>&lt;x-ws::tabs
    :tabs="[
        ['id' => 'dashboard', 'label' => 'Tableau de bord', 'icon' => 'home'],
        ['id' => 'stats',     'label' => 'Statistiques',    'icon' => 'chart-bar'],
        ['id' => 'settings',  'label' => 'Paramètres',      'icon' => 'cog-6-tooth'],
    ]"
    variant="pills"
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variante — Boxed</h2>
<x-docs::demo>
    <x-ws::tabs
        :tabs="[
            ['id' => 'monthly',    'label' => 'Mensuel'],
            ['id' => 'quarterly',  'label' => 'Trimestriel'],
            ['id' => 'yearly',     'label' => 'Annuel'],
        ]"
        variant="boxed"
    />
</x-docs::demo>
<x-docs::code>&lt;x-ws::tabs
    :tabs="[
        ['id' => 'monthly',   'label' => 'Mensuel'],
        ['id' => 'quarterly', 'label' => 'Trimestriel'],
        ['id' => 'yearly',    'label' => 'Annuel'],
    ]"
    variant="boxed"
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tabs avec contenu ($ws.activeTab)</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Utilisez <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">$ws.activeTab</code> dans Alpine.js pour afficher le contenu correspondant à l'onglet actif.</p>
<x-docs::demo>
    <x-ws::tabs
        :tabs="[
            ['id' => 'compte',        'label' => 'Compte'],
            ['id' => 'securite',      'label' => 'Sécurité'],
            ['id' => 'notifications', 'label' => 'Notifications'],
        ]"
        variant="underline"
        active="compte"
    >
        <div x-show="$ws.activeTab === 'compte'" class="mt-4 p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg text-sm text-zinc-600 dark:text-zinc-400">
            Paramètres du compte : nom, email, avatar...
        </div>
        <div x-show="$ws.activeTab === 'securite'" class="mt-4 p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg text-sm text-zinc-600 dark:text-zinc-400">
            Sécurité : mot de passe, 2FA, sessions actives...
        </div>
        <div x-show="$ws.activeTab === 'notifications'" class="mt-4 p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg text-sm text-zinc-600 dark:text-zinc-400">
            Notifications : email, push, webhooks...
        </div>
    </x-ws::tabs>
</x-docs::demo>
<x-docs::code>&lt;x-ws::tabs
    :tabs="[
        ['id' => 'compte',   'label' => 'Compte'],
        ['id' => 'securite', 'label' => 'Sécurité'],
    ]"
    variant="underline"
    active="compte"
&gt;
    &lt;div x-show="$ws.activeTab === 'compte'"&gt;
        Contenu du compte...
    &lt;/div&gt;
    &lt;div x-show="$ws.activeTab === 'securite'"&gt;
        Contenu sécurité...
    &lt;/div&gt;
&lt;/x-ws::tabs&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Composition par slots (Tab)</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Utilisez <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;x-ws::tab&gt;</code> individuellement pour intégrer le contenu directement dans chaque onglet.</p>
<x-docs::code>&lt;x-ws::tabs variant="pills" size="sm" align="center"&gt;
    &lt;x-ws::tab id="day"   label="Jour"    icon="sun"&gt;
        &lt;p&gt;Données du jour&lt;/p&gt;
    &lt;/x-ws::tab&gt;
    &lt;x-ws::tab id="week"  label="Semaine" icon="calendar"&gt;
        &lt;p&gt;Données de la semaine&lt;/p&gt;
    &lt;/x-ws::tab&gt;
    &lt;x-ws::tab id="month" label="Mois"    icon="calendar-days"&gt;
        &lt;p&gt;Données du mois&lt;/p&gt;
    &lt;/x-ws::tab&gt;
&lt;/x-ws::tabs&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="space-y-4">
        @foreach(['sm','md','lg'] as $size)
            <div>
                <p class="text-xs text-zinc-500 mb-1">size="{{ $size }}"</p>
                <x-ws::tabs
                    :tabs="[['id' => 'a', 'label' => 'Onglet 1'], ['id' => 'b', 'label' => 'Onglet 2'], ['id' => 'c', 'label' => 'Onglet 3']]"
                    :size="$size"
                    variant="pills"
                />
            </div>
        @endforeach
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.nav') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Nav</a>
    <a href="{{ route('docs.breadcrumb') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Breadcrumb →</a>
</div>

</x-layouts.docs>
