<x-layouts.docs title="Nav">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Navigation</span><span>/</span><span>Nav</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Nav</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Composants de navigation. <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">Nav</code> est le conteneur, <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">NavItem</code> est chaque lien.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu — Navigation horizontale">
    <x-ws::nav>
        <x-ws::nav-item href="#" icon="home" :active="true">Accueil</x-ws::nav-item>
        <x-ws::nav-item href="#" icon="squares-2x2">Tableau de bord</x-ws::nav-item>
        <x-ws::nav-item href="#" icon="chart-bar">Analytiques</x-ws::nav-item>
        <x-ws::nav-item href="#" icon="users">Équipe</x-ws::nav-item>
        <x-ws::nav-item href="#" icon="cog-6-tooth">Paramètres</x-ws::nav-item>
    </x-ws::nav>
</x-docs::demo>

<x-docs::code>&lt;x-ws::nav&gt;
    &lt;x-ws::nav-item href="/" icon="home" :active="true"&gt;Accueil&lt;/x-ws::nav-item&gt;
    &lt;x-ws::nav-item href="/dashboard" icon="squares-2x2"&gt;Tableau de bord&lt;/x-ws::nav-item&gt;
    &lt;x-ws::nav-item href="/settings" icon="cog-6-tooth"&gt;Paramètres&lt;/x-ws::nav-item&gt;
&lt;/x-ws::nav&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Nav</h2>
<x-docs::props :rows="[
    ['orientation', 'string', 'horizontal', 'Sens de navigation : horizontal | vertical'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — NavItem</h2>
<x-docs::props :rows="[
    ['href',   'string', '',      'URL de destination'],
    ['icon',   'string', '',      'Icône Heroicons affichée avant le texte'],
    ['active', 'bool',   'false', 'Met en évidence l\'item actif'],
    ['badge',  'string', 'null',  'Badge numérique affiché à côté du lien'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec badges</h2>
<x-docs::demo>
    <x-ws::nav>
        <x-ws::nav-item href="#" icon="home" :active="true">Accueil</x-ws::nav-item>
        <x-ws::nav-item href="#" icon="bell" badge="5">Notifications</x-ws::nav-item>
        <x-ws::nav-item href="#" icon="envelope" badge="12">Messages</x-ws::nav-item>
        <x-ws::nav-item href="#" icon="shopping-cart" badge="3">Panier</x-ws::nav-item>
    </x-ws::nav>
</x-docs::demo>
<x-docs::code>&lt;x-ws::nav-item href="/notifications" icon="bell" badge="5"&gt;Notifications&lt;/x-ws::nav-item&gt;
&lt;x-ws::nav-item href="/messages" icon="envelope" badge="12"&gt;Messages&lt;/x-ws::nav-item&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Navigation verticale (sidebar)</h2>
<x-docs::demo>
    <div class="w-56">
        <x-ws::nav orientation="vertical">
            <x-ws::nav-item href="#" icon="home" :active="true">Accueil</x-ws::nav-item>
            <x-ws::nav-item href="#" icon="squares-2x2">Tableau de bord</x-ws::nav-item>
            <x-ws::nav-item href="#" icon="chart-bar">Analytiques</x-ws::nav-item>
            <x-ws::nav-item href="#" icon="users">Utilisateurs</x-ws::nav-item>
            <x-ws::nav-item href="#" icon="document-text">Rapports</x-ws::nav-item>
            <x-ws::nav-item href="#" icon="cog-6-tooth">Paramètres</x-ws::nav-item>
        </x-ws::nav>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::nav orientation="vertical"&gt;
    &lt;x-ws::nav-item href="/" icon="home" :active="true"&gt;Accueil&lt;/x-ws::nav-item&gt;
    &lt;x-ws::nav-item href="/users" icon="users"&gt;Utilisateurs&lt;/x-ws::nav-item&gt;
    &lt;x-ws::nav-item href="/settings" icon="cog-6-tooth"&gt;Paramètres&lt;/x-ws::nav-item&gt;
&lt;/x-ws::nav&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.stack') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Stack</a>
    <a href="{{ route('docs.tabs') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Tabs →</a>
</div>

</x-layouts.docs>
