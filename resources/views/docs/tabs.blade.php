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
    <x-ws::tabs :tabs="['Aperçu','Code','Props']" variant="underline" />
</x-docs::demo>

<x-docs::code>&lt;x-ws::tabs :tabs="['Aperçu', 'Code', 'Props']" variant="underline" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['tabs',    'array',  '[]',       'Tableau de labels pour chaque onglet'],
    ['variant', 'string', 'underline','underline | pills | boxed'],
    ['size',    'string', 'md',       'sm | md | lg'],
    ['color',   'string', 'primary',  'primary | secondary | neutral'],
    ['align',   'string', 'start',    'start | center | end'],
    ['full',    'bool',   'false',    'Les onglets prennent toute la largeur'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variante — Pills</h2>
<x-docs::demo>
    <x-ws::tabs :tabs="['Tableau de bord','Statistiques','Paramètres','Équipe']" variant="pills" />
</x-docs::demo>
<x-docs::code>&lt;x-ws::tabs :tabs="['Tableau de bord', 'Statistiques', 'Paramètres']" variant="pills" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variante — Boxed</h2>
<x-docs::demo>
    <x-ws::tabs :tabs="['Mensuel','Trimestriel','Annuel']" variant="boxed" />
</x-docs::demo>
<x-docs::code>&lt;x-ws::tabs :tabs="['Mensuel', 'Trimestriel', 'Annuel']" variant="boxed" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tabs pilotés par Alpine.js avec contenu</h2>
<x-docs::demo x-data="{ tab: 'compte' }">
    <div>
        <x-ws::tabs variant="underline">
            <x-ws::tab x-on:click="tab = 'compte'" :active="false" x-bind:class="{ 'active': tab === 'compte' }">Compte</x-ws::tab>
            <x-ws::tab x-on:click="tab = 'securite'" :active="false" x-bind:class="{ 'active': tab === 'securite' }">Sécurité</x-ws::tab>
            <x-ws::tab x-on:click="tab = 'notifications'" :active="false" x-bind:class="{ 'active': tab === 'notifications' }">Notifications</x-ws::tab>
        </x-ws::tabs>
        <div class="mt-4 p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg text-sm text-zinc-600 dark:text-zinc-400">
            <div x-show="tab === 'compte'">Paramètres du compte : nom, email, avatar...</div>
            <div x-show="tab === 'securite'">Sécurité : mot de passe, 2FA, sessions...</div>
            <div x-show="tab === 'notifications'">Notifications : email, push, webhooks...</div>
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;div x-data="{ tab: 'compte' }"&gt;
    &lt;x-ws::tabs variant="underline"&gt;
        &lt;x-ws::tab x-on:click="tab = 'compte'" x-bind:class="{ 'active': tab === 'compte' }"&gt;Compte&lt;/x-ws::tab&gt;
        &lt;x-ws::tab x-on:click="tab = 'securite'" x-bind:class="{ 'active': tab === 'securite' }"&gt;Sécurité&lt;/x-ws::tab&gt;
    &lt;/x-ws::tabs&gt;
    &lt;div x-show="tab === 'compte'"&gt;Contenu du compte&lt;/div&gt;
    &lt;div x-show="tab === 'securite'"&gt;Contenu sécurité&lt;/div&gt;
&lt;/div&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="space-y-4">
        @foreach(['sm','md','lg'] as $size)
            <div>
                <p class="text-xs text-zinc-500 mb-1">size="{{ $size }}"</p>
                <x-ws::tabs :tabs="['Onglet 1','Onglet 2','Onglet 3']" :size="$size" variant="pills" />
            </div>
        @endforeach
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.nav') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Nav</a>
    <a href="{{ route('docs.breadcrumb') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Breadcrumb →</a>
</div>

</x-layouts.docs>
