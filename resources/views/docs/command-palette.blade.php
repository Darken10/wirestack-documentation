<x-layouts.docs title="CommandPalette">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Livewire</span><span>/</span><span>CommandPalette</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">CommandPalette</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Palette de commandes Livewire déclenchée par <x-ws::kbd>⌘K</x-ws::kbd> ou <x-ws::kbd>Ctrl</x-ws::kbd>+<x-ws::kbd>K</x-ws::kbd>. Recherche et exécution rapide d'actions.</p>
        </div>
        <x-ws::badge variant="soft" color="warning">Livewire</x-ws::badge>
    </div>
</div>

@php
$commands = [
    ['id' => 'dashboard',   'label' => 'Tableau de bord',        'icon' => 'squares-2x2',         'description' => 'Vue principale',           'shortcut' => '⌘D'],
    ['id' => 'new-user',    'label' => 'Créer un utilisateur',   'icon' => 'user-plus',            'description' => 'Ajouter un nouveau membre', 'badge' => 'Admin'],
    ['id' => 'analytics',   'label' => 'Voir les analytiques',   'icon' => 'chart-bar',            'description' => 'Statistiques du mois'],
    ['id' => 'settings',    'label' => 'Paramètres',             'icon' => 'cog-6-tooth',          'description' => 'Configuration de l\'app',  'shortcut' => '⌘,'],
    ['id' => 'search',      'label' => 'Recherche globale',      'icon' => 'magnifying-glass',     'description' => 'Rechercher dans tout',     'shortcut' => '⌘F'],
    ['id' => 'dark-mode',   'label' => 'Basculer le mode sombre','icon' => 'moon',                 'description' => 'Changer le thème'],
    ['id' => 'logout',      'label' => 'Déconnexion',            'icon' => 'arrow-right-on-rectangle','description' => 'Fermer la session'],
    ['id' => 'docs',        'label' => 'Documentation',          'icon' => 'book-open',            'description' => 'Wirestack UI docs',        'shortcut' => '⌘?'],
];
@endphp

<livewire:ws::command-palette :commands="$commands" />

<x-docs::demo label="Aperçu">
    <div class="flex flex-col items-center gap-4">
        <div class="flex gap-3">
            <x-ws::button color="primary" @click="DsCommandPalette.open()">
                <x-ws::icon name="magnifying-glass" size="sm" />
                Ouvrir la palette
            </x-ws::button>
            <x-ws::button color="neutral" variant="outline">
                <x-ws::kbd>⌘</x-ws::kbd>
                <span class="mx-1 text-zinc-400">+</span>
                <x-ws::kbd>K</x-ws::kbd>
                <span class="ml-2 text-sm">raccourci clavier</span>
            </x-ws::button>
        </div>
        <p class="text-xs text-zinc-500">Appuyez sur <x-ws::kbd>⌘K</x-ws::kbd> ou <x-ws::kbd>Ctrl</x-ws::kbd>+<x-ws::kbd>K</x-ws::kbd> pour ouvrir</p>
    </div>
</x-docs::demo>

<x-docs::code>&#64;php
$commands = [
    [
        'id'          =&gt; 'dashboard',
        'label'       =&gt; 'Tableau de bord',
        'icon'        =&gt; 'squares-2x2',
        'description' =&gt; 'Vue principale',
        'shortcut'    =&gt; '⌘D',
    ],
    [
        'id'          =&gt; 'new-user',
        'label'       =&gt; 'Créer un utilisateur',
        'icon'        =&gt; 'user-plus',
        'description' =&gt; 'Ajouter un membre',
        'badge'       =&gt; 'Admin',
    ],
    [
        'id'          =&gt; 'settings',
        'label'       =&gt; 'Paramètres',
        'icon'        =&gt; 'cog-6-tooth',
        'shortcut'    =&gt; '⌘,',
    ],
];
&#64;endphp

&lt;livewire:ws::command-palette :commands="$commands" /&gt;

{{-- Ouvrir via JavaScript --}}
&lt;x-ws::button &#64;click="DsCommandPalette.open()"&gt;
    Recherche...
&lt;/x-ws::button&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Structure d'une commande</h2>
<x-docs::props :rows="[
    ['id',          'string', 'required', 'Identifiant unique de la commande'],
    ['label',       'string', 'required', 'Nom affiché dans la liste'],
    ['icon',        'string', '',         'Icône Heroicons'],
    ['description', 'string', '',         'Sous-texte descriptif'],
    ['shortcut',    'string', '',         'Raccourci clavier affiché'],
    ['badge',       'string', '',         'Badge affiché (Admin, Nouveau...)'],
    ['action',      'string', '',         'Action URL ou callback à exécuter'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">API JavaScript</h2>
<x-docs::demo>
    <div class="bg-zinc-50 dark:bg-zinc-800 rounded-xl p-4 space-y-2 font-mono text-sm">
        <p class="text-zinc-700 dark:text-zinc-300"><span class="text-blue-500">DsCommandPalette</span>.<span class="text-green-500">open</span>()</p>
        <p class="text-zinc-700 dark:text-zinc-300"><span class="text-blue-500">DsCommandPalette</span>.<span class="text-red-500">close</span>()</p>
    </div>
</x-docs::demo>
<x-docs::code>// Ouvrir la palette
DsCommandPalette.open()

// Fermer la palette
DsCommandPalette.close()

// Via événement Livewire
$dispatch('ds-command-palette-open')

// Raccourcis clavier automatiques
// ⌘K (Mac) ou Ctrl+K (Windows/Linux)</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Installation dans le layout</h2>
<x-docs::code>{{-- Dans le layout principal (une seule fois) --}}
&lt;livewire:ws::command-palette :commands="$commands" /&gt;

{{-- Passer les commandes depuis le contrôleur ou view composer --}}
// AppServiceProvider.php
View::composer('*', function($view) {
    $view-&gt;with('commands', [
        ['id' =&gt; 'home', 'label' =&gt; 'Accueil', 'icon' =&gt; 'home'],
        // ...
    ]);
});</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Commandes avec badge et raccourcis</h2>
<x-docs::demo>
    <div class="border border-zinc-200 dark:border-zinc-700 rounded-xl overflow-hidden">
        <div class="bg-white dark:bg-zinc-900 p-4">
            <div class="flex items-center gap-2 mb-3 px-2 py-2 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                <x-ws::icon name="magnifying-glass" size="sm" class="text-zinc-400" />
                <span class="text-sm text-zinc-400">Rechercher une commande...</span>
                <x-ws::kbd class="ml-auto">Esc</x-ws::kbd>
            </div>
            <div class="space-y-1">
                @foreach($commands as $cmd)
                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-800 cursor-pointer group">
                        <div class="w-7 h-7 rounded-lg bg-zinc-100 dark:bg-zinc-700 flex items-center justify-center flex-shrink-0">
                            <x-ws::icon :name="$cmd['icon']" size="xs" class="text-zinc-500" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-zinc-900 dark:text-zinc-100">{{ $cmd['label'] }}</p>
                            @if(isset($cmd['description']))
                                <p class="text-xs text-zinc-500 truncate">{{ $cmd['description'] }}</p>
                            @endif
                        </div>
                        @if(isset($cmd['badge']))
                            <x-ws::badge size="xs" color="warning">{{ $cmd['badge'] }}</x-ws::badge>
                        @endif
                        @if(isset($cmd['shortcut']))
                            <x-ws::kbd size="sm">{{ $cmd['shortcut'] }}</x-ws::kbd>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.data-table') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← DataTable</a>
    <a href="{{ route('docs.index') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Documentation →</a>
</div>

</x-layouts.docs>
