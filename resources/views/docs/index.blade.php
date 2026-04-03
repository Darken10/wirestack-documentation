<x-layouts.docs title="Introduction">

{{-- Hero --}}
<div class="mb-12">
    <div class="flex items-center gap-2 mb-4">
        <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-blue-600 to-violet-600 flex items-center justify-center shrink-0">
            <span class="text-white font-bold text-sm">WS</span>
        </div>
        <x-ws::badge variant="soft" color="info">v1.0</x-ws::badge>
    </div>
    <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-3">Wirestack UI</h1>
    <p class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl leading-relaxed">
        Une bibliothèque de composants Blade et Livewire pour Laravel. 50+ composants, dark mode, design tokens, theming — tout est inclus.
    </p>
    <div class="flex flex-wrap gap-2 mt-5">
        <x-ws::badge variant="soft" color="primary" icon="code-bracket">Laravel 12</x-ws::badge>
        <x-ws::badge variant="soft" color="secondary" icon="bolt">Livewire 4</x-ws::badge>
        <x-ws::badge variant="soft" color="success" icon="sparkles">Tailwind v4</x-ws::badge>
        <x-ws::badge variant="soft" color="warning" icon="rocket">Alpine.js</x-ws::badge>
    </div>
</div>

{{-- Stats --}}
<x-ws::stat-group class="mb-12">
    <x-ws::stat label="Composants Blade" value="50+" icon="squares-2x2" icon-color="primary" description="Prêts à l'emploi" />
    <x-ws::stat label="Composants Livewire" value="5" icon="bolt" icon-color="secondary" description="Modal, Drawer, Toast…" />
    <x-ws::stat label="Dark Mode" value="100%" icon="moon" icon-color="info" description="Tous les composants" />
    <x-ws::stat label="Design Tokens" value="CSS Vars" icon="paint-brush" icon-color="success" description="Personnalisables" />
</x-ws::stat-group>

{{-- Quick start --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mb-1">Démarrage rapide</h2>
    <p class="text-zinc-500 dark:text-zinc-400 text-sm mb-4">Installer et utiliser Wirestack UI en moins de 5 minutes.</p>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('docs.installation') }}" class="group p-5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 hover:border-blue-300 dark:hover:border-blue-700 hover:shadow-sm transition-all">
            <div class="h-8 w-8 rounded-lg bg-blue-50 dark:bg-blue-950 flex items-center justify-center mb-3 group-hover:bg-blue-100 dark:group-hover:bg-blue-900 transition-colors">
                <svg class="h-4 w-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                </svg>
            </div>
            <h3 class="font-semibold text-zinc-900 dark:text-zinc-100 text-sm mb-1">Installation</h3>
            <p class="text-xs text-zinc-500 dark:text-zinc-400">Composer, directives, config</p>
        </a>
        <a href="{{ route('docs.configuration') }}" class="group p-5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 hover:border-violet-300 dark:hover:border-violet-700 hover:shadow-sm transition-all">
            <div class="h-8 w-8 rounded-lg bg-violet-50 dark:bg-violet-950 flex items-center justify-center mb-3 group-hover:bg-violet-100 dark:group-hover:bg-violet-900 transition-colors">
                <svg class="h-4 w-4 text-violet-600 dark:text-violet-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
            </div>
            <h3 class="font-semibold text-zinc-900 dark:text-zinc-100 text-sm mb-1">Configuration</h3>
            <p class="text-xs text-zinc-500 dark:text-zinc-400">Préfixe, thème, defaults</p>
        </a>
        <a href="{{ route('docs.tokens') }}" class="group p-5 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 hover:border-emerald-300 dark:hover:border-emerald-700 hover:shadow-sm transition-all">
            <div class="h-8 w-8 rounded-lg bg-emerald-50 dark:bg-emerald-950 flex items-center justify-center mb-3 group-hover:bg-emerald-100 dark:group-hover:bg-emerald-900 transition-colors">
                <svg class="h-4 w-4 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 0 0 5.304 0l6.401-6.402M6.75 21A3.75 3.75 0 0 1 3 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 0 0 3.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z"/>
                </svg>
            </div>
            <h3 class="font-semibold text-zinc-900 dark:text-zinc-100 text-sm mb-1">Design Tokens</h3>
            <p class="text-xs text-zinc-500 dark:text-zinc-400">Variables CSS, theming</p>
        </a>
    </div>
</div>

{{-- All components grid --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mb-1">Tous les composants</h2>
    <p class="text-zinc-500 dark:text-zinc-400 text-sm mb-5">Parcourez l'ensemble de la bibliothèque.</p>

    @php
    $groups = [
        ['label' => 'Atomes', 'color' => 'blue', 'items' => [
            ['label' => 'Button', 'route' => 'docs.button', 'desc' => 'Boutons interactifs'],
            ['label' => 'Badge', 'route' => 'docs.badge', 'desc' => 'Étiquettes colorées'],
            ['label' => 'Avatar', 'route' => 'docs.avatar', 'desc' => 'Image ou initiales'],
            ['label' => 'Chip', 'route' => 'docs.chip', 'desc' => 'Tags dismissibles'],
            ['label' => 'Kbd', 'route' => 'docs.kbd', 'desc' => 'Raccourcis clavier'],
            ['label' => 'Icon', 'route' => 'docs.icon', 'desc' => 'Icônes Heroicons'],
            ['label' => 'Spinner', 'route' => 'docs.spinner', 'desc' => 'Indicateurs de chargement'],
            ['label' => 'Skeleton', 'route' => 'docs.skeleton', 'desc' => 'Squelettes de contenu'],
            ['label' => 'Tooltip', 'route' => 'docs.tooltip', 'desc' => 'Infobulles'],
            ['label' => 'Divider', 'route' => 'docs.divider', 'desc' => 'Séparateurs'],
            ['label' => 'CopyButton', 'route' => 'docs.copy-button', 'desc' => 'Copier dans le presse-papier'],
        ]],
        ['label' => 'Formulaires', 'color' => 'violet', 'items' => [
            ['label' => 'Input', 'route' => 'docs.input', 'desc' => 'Champs de saisie'],
            ['label' => 'Textarea', 'route' => 'docs.textarea', 'desc' => 'Zones de texte'],
            ['label' => 'Select', 'route' => 'docs.select', 'desc' => 'Listes déroulantes'],
            ['label' => 'Checkbox', 'route' => 'docs.checkbox', 'desc' => 'Cases à cocher'],
            ['label' => 'Radio', 'route' => 'docs.radio', 'desc' => 'Boutons radio'],
            ['label' => 'Toggle', 'route' => 'docs.toggle', 'desc' => 'Interrupteurs'],
            ['label' => 'Range', 'route' => 'docs.range', 'desc' => 'Curseurs'],
            ['label' => 'InputGroup', 'route' => 'docs.input-group', 'desc' => 'Groupes d\'inputs'],
            ['label' => 'FormGroup', 'route' => 'docs.form-group', 'desc' => 'Groupes de champs'],
            ['label' => 'FormSection', 'route' => 'docs.form-section', 'desc' => 'Sections de formulaire'],
        ]],
        ['label' => 'Layout', 'color' => 'emerald', 'items' => [
            ['label' => 'Card', 'route' => 'docs.card', 'desc' => 'Cartes conteneurs'],
            ['label' => 'Container', 'route' => 'docs.container', 'desc' => 'Contrainte de largeur'],
            ['label' => 'Section', 'route' => 'docs.section', 'desc' => 'Sections de page'],
            ['label' => 'Panel', 'route' => 'docs.panel', 'desc' => 'Panneaux latéraux'],
            ['label' => 'Stack & Inline', 'route' => 'docs.stack', 'desc' => 'Mise en page flex'],
        ]],
        ['label' => 'Navigation', 'color' => 'amber', 'items' => [
            ['label' => 'Nav', 'route' => 'docs.nav', 'desc' => 'Barres de navigation'],
            ['label' => 'Tabs', 'route' => 'docs.tabs', 'desc' => 'Onglets'],
            ['label' => 'Breadcrumb', 'route' => 'docs.breadcrumb', 'desc' => 'Fil d\'Ariane'],
            ['label' => 'Pagination', 'route' => 'docs.pagination', 'desc' => 'Navigation par pages'],
            ['label' => 'Steps', 'route' => 'docs.steps', 'desc' => 'Étapes de processus'],
        ]],
        ['label' => 'Données', 'color' => 'sky', 'items' => [
            ['label' => 'Table', 'route' => 'docs.table', 'desc' => 'Tableaux de données'],
            ['label' => 'Stat', 'route' => 'docs.stat', 'desc' => 'Statistiques'],
            ['label' => 'Timeline', 'route' => 'docs.timeline', 'desc' => 'Chronologie'],
            ['label' => 'Progress', 'route' => 'docs.progress', 'desc' => 'Barres de progression'],
            ['label' => 'Code', 'route' => 'docs.code', 'desc' => 'Blocs de code'],
            ['label' => 'Alert', 'route' => 'docs.alert', 'desc' => 'Messages d\'alerte'],
            ['label' => 'EmptyState', 'route' => 'docs.empty-state', 'desc' => 'États vides'],
        ]],
        ['label' => 'Superpositions', 'color' => 'rose', 'items' => [
            ['label' => 'Accordion', 'route' => 'docs.accordion', 'desc' => 'Accordéons'],
            ['label' => 'Collapsible', 'route' => 'docs.collapsible', 'desc' => 'Contenus repliables'],
            ['label' => 'Dropdown', 'route' => 'docs.dropdown', 'desc' => 'Menus déroulants'],
            ['label' => 'Popover', 'route' => 'docs.popover', 'desc' => 'Popovers'],
        ]],
        ['label' => 'Livewire', 'color' => 'pink', 'items' => [
            ['label' => 'Modal', 'route' => 'docs.modal', 'desc' => 'Dialogues modales'],
            ['label' => 'Drawer', 'route' => 'docs.drawer', 'desc' => 'Panneaux latéraux'],
            ['label' => 'Toast', 'route' => 'docs.toast', 'desc' => 'Notifications'],
            ['label' => 'DataTable', 'route' => 'docs.data-table', 'desc' => 'Tableaux dynamiques'],
            ['label' => 'CommandPalette', 'route' => 'docs.command-palette', 'desc' => 'Palette de commandes'],
        ]],
    ];
    $colorMap = [
        'blue' => 'bg-blue-50 dark:bg-blue-950/50 border-blue-200 dark:border-blue-800 text-blue-700 dark:text-blue-300',
        'violet' => 'bg-violet-50 dark:bg-violet-950/50 border-violet-200 dark:border-violet-800 text-violet-700 dark:text-violet-300',
        'emerald' => 'bg-emerald-50 dark:bg-emerald-950/50 border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-300',
        'amber' => 'bg-amber-50 dark:bg-amber-950/50 border-amber-200 dark:border-amber-800 text-amber-700 dark:text-amber-300',
        'sky' => 'bg-sky-50 dark:bg-sky-950/50 border-sky-200 dark:border-sky-800 text-sky-700 dark:text-sky-300',
        'rose' => 'bg-rose-50 dark:bg-rose-950/50 border-rose-200 dark:border-rose-800 text-rose-700 dark:text-rose-300',
        'pink' => 'bg-pink-50 dark:bg-pink-950/50 border-pink-200 dark:border-pink-800 text-pink-700 dark:text-pink-300',
    ];
    @endphp

    <div class="space-y-8">
        @foreach($groups as $group)
            <div>
                <h3 class="text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-3 flex items-center gap-2">
                    <span class="inline-block h-2 w-2 rounded-full bg-{{ $group['color'] }}-500"></span>
                    {{ $group['label'] }}
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
                    @foreach($group['items'] as $item)
                        <a href="{{ route($item['route']) }}" class="group flex flex-col p-3 rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 hover:border-{{ $group['color'] }}-300 dark:hover:border-{{ $group['color'] }}-700 hover:shadow-sm transition-all">
                            <span class="font-medium text-xs text-zinc-900 dark:text-zinc-100 group-hover:text-{{ $group['color'] }}-600 dark:group-hover:text-{{ $group['color'] }}-400 transition-colors">{{ $item['label'] }}</span>
                            <span class="text-[11px] text-zinc-400 dark:text-zinc-500 mt-0.5">{{ $item['desc'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

</x-layouts.docs>
