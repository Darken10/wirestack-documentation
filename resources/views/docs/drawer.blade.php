<x-layouts.docs title="Drawer">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Livewire</span><span>/</span><span>Drawer</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Drawer</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Panneau latéral Livewire coulissant depuis n'importe quel bord de l'écran. Déclenché via <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">DsDrawer.open(id)</code>.</p>
        </div>
        <x-ws::badge variant="soft" color="warning">Livewire</x-ws::badge>
    </div>
</div>

{{-- Déclarations des drawers --}}
<livewire:ws::drawer drawer-id="docs-drawer-right" title="Menu latéral" position="right" />
<livewire:ws::drawer drawer-id="docs-drawer-left" title="Navigation" position="left" />
<livewire:ws::drawer drawer-id="docs-drawer-bottom" title="Filtres" position="bottom" />

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-3">
        <x-ws::button color="primary" @click="DsDrawer.open('docs-drawer-right')">
            <x-ws::icon name="bars-3" size="sm" />
            Drawer droite
        </x-ws::button>
        <x-ws::button color="secondary" variant="outline" @click="DsDrawer.open('docs-drawer-left')">
            <x-ws::icon name="bars-3" size="sm" />
            Drawer gauche
        </x-ws::button>
        <x-ws::button color="neutral" variant="outline" @click="DsDrawer.open('docs-drawer-bottom')">
            <x-ws::icon name="chevron-up" size="sm" />
            Drawer bas
        </x-ws::button>
    </div>
</x-docs::demo>

<x-docs::code>{{-- 1. Déclarer le drawer (dans le template) --}}
&lt;livewire:ws::drawer drawer-id="side-menu" title="Menu latéral" position="right" /&gt;

{{-- 2. Ouvrir via JavaScript --}}
&lt;x-ws::button &#64;click="DsDrawer.open('side-menu')"&gt;
    Ouvrir le menu
&lt;/x-ws::button&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['drawerId',  'string', 'drawer', 'Identifiant unique du drawer'],
    ['position',  'string', 'right',  'left | right | top | bottom'],
    ['size',      'string', 'md',     'sm | md | lg | xl | full'],
    ['closeable', 'bool',   'true',   'Bouton de fermeture visible'],
    ['backdrop',  'bool',   'true',   'Fond sombre cliquable pour fermer'],
    ['title',     'string', 'null',   'Titre affiché dans le header'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">API JavaScript</h2>
<x-docs::demo>
    <div class="bg-zinc-50 dark:bg-zinc-800 rounded-xl p-4 space-y-2 font-mono text-sm">
        <p class="text-zinc-700 dark:text-zinc-300"><span class="text-blue-500">DsDrawer</span>.<span class="text-green-500">open</span>(<span class="text-amber-500">'drawer-id'</span>)</p>
        <p class="text-zinc-700 dark:text-zinc-300"><span class="text-blue-500">DsDrawer</span>.<span class="text-red-500">close</span>(<span class="text-amber-500">'drawer-id'</span>)</p>
    </div>
</x-docs::demo>
<x-docs::code>// Ouvrir
DsDrawer.open('mon-drawer')

// Fermer
DsDrawer.close('mon-drawer')

// Événements Livewire
$dispatch('ds-drawer-open:mon-drawer')
$dispatch('ds-drawer-close:mon-drawer')</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Positions</h2>
<x-docs::demo>
    <div class="grid grid-cols-2 gap-3 max-w-xs">
        @foreach(['right','left','bottom','top'] as $pos)
            <livewire:ws::drawer :drawer-id="'docs-pos-' . $pos" :title="'Drawer ' . $pos" :position="$pos" />
            <x-ws::button color="neutral" variant="outline" @click="DsDrawer.open('docs-pos-{{ $pos }}')">
                {{ ucfirst($pos) }}
            </x-ws::button>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;livewire:ws::drawer drawer-id="nav-left" title="Navigation" position="left" /&gt;
&lt;livewire:ws::drawer drawer-id="filters-bottom" title="Filtres" position="bottom" /&gt;

&lt;x-ws::button &#64;click="DsDrawer.open('nav-left')"&gt;Ouvrir navigation&lt;/x-ws::button&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Drawer avec navigation</h2>
<x-docs::code>{{-- Déclaration avec contenu personnalisé --}}
&lt;livewire:ws::drawer drawer-id="main-nav" title="Navigation" position="left"&gt;
    &lt;x-slot name="content"&gt;
        &lt;x-ws::nav orientation="vertical"&gt;
            &lt;x-ws::nav-item href="/" icon="home" :active="true"&gt;Accueil&lt;/x-ws::nav-item&gt;
            &lt;x-ws::nav-item href="/dashboard" icon="squares-2x2"&gt;Tableau de bord&lt;/x-ws::nav-item&gt;
            &lt;x-ws::nav-item href="/analytics" icon="chart-bar"&gt;Analytiques&lt;/x-ws::nav-item&gt;
            &lt;x-ws::nav-item href="/settings" icon="cog-6-tooth"&gt;Paramètres&lt;/x-ws::nav-item&gt;
        &lt;/x-ws::nav&gt;
    &lt;/x-slot&gt;
&lt;/livewire:ws::drawer&gt;

&lt;x-ws::button &#64;click="DsDrawer.open('main-nav')"&gt;Menu&lt;/x-ws::button&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.modal') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Modal</a>
    <a href="{{ route('docs.toast') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Toast →</a>
</div>

</x-layouts.docs>
