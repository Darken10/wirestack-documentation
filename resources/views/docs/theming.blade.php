<x-layouts.docs title="Theming">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Démarrage</span><span>/</span><span class="text-zinc-900 dark:text-zinc-100">Theming</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Theming & Personnalisation</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Personnalisez les couleurs, les rayons, la typographie et les valeurs par défaut des composants via <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded text-sm">config/ws.php</code>.</p>
        </div>
    </div>
</div>

{{-- Mode sombre --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Mode sombre</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Tous les composants Wirestack UI intègrent le mode sombre nativement via les classes <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">dark:</code> de Tailwind CSS. Aucune configuration supplémentaire n'est requise.</p>

<x-docs::demo label="Aperçu — switch clair/sombre">
    <div class="flex flex-wrap gap-3 items-center">
        <x-ws::button color="primary">Bouton primaire</x-ws::button>
        <x-ws::badge color="success" variant="soft">Actif</x-ws::badge>
        <x-ws::input placeholder="Champ de saisie..." class="max-w-xs" />
        <x-ws::toggle label="Mode dark" :checked="true" />
    </div>
</x-docs::demo>

<p class="text-sm text-zinc-600 dark:text-zinc-400 my-4">Configurez le thème par défaut dans <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">config/ws.php</code> :</p>

<x-docs::code>// config/ws.php
'theme' =&gt; 'system', // 'light' | 'dark' | 'system'</x-docs::code>

<div class="overflow-auto my-5">
<table class="w-full text-sm border border-zinc-200 dark:border-zinc-700 rounded-lg overflow-hidden">
    <thead class="bg-zinc-50 dark:bg-zinc-800">
        <tr>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Valeur</th>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Comportement</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
        <tr><td class="px-4 py-2.5 font-mono text-xs text-violet-600 dark:text-violet-400">'system'</td><td class="px-4 py-2.5 text-zinc-600 dark:text-zinc-400">Suit <code class="bg-zinc-100 dark:bg-zinc-700/60 px-1 rounded">prefers-color-scheme</code> du navigateur</td></tr>
        <tr><td class="px-4 py-2.5 font-mono text-xs text-violet-600 dark:text-violet-400">'light'</td><td class="px-4 py-2.5 text-zinc-600 dark:text-zinc-400">Force le mode clair</td></tr>
        <tr><td class="px-4 py-2.5 font-mono text-xs text-violet-600 dark:text-violet-400">'dark'</td><td class="px-4 py-2.5 text-zinc-600 dark:text-zinc-400">Force le mode sombre</td></tr>
    </tbody>
</table>
</div>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Toggle Dark Mode avec Alpine.js</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Ajoutez un bouton de bascule dans votre layout pour que l'utilisateur choisisse son thème et que le choix soit persisté dans <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">localStorage</code>.</p>
<x-docs::code>&lt;button
    x-data
    x-on:click="
        const isDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('ws-theme', isDark ? 'dark' : 'light');
    "
    class="p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800"
&gt;
    &lt;!-- Soleil (mode sombre actif) --&gt;
    &lt;x-ws::icon name="sun" class="hidden dark:block text-zinc-300" /&gt;
    &lt;!-- Lune (mode clair actif) --&gt;
    &lt;x-ws::icon name="moon" class="block dark:hidden text-zinc-700" /&gt;
&lt;/button&gt;</x-docs::code>

<p class="text-sm text-zinc-600 dark:text-zinc-400 my-4">Pour éviter le flash de thème au chargement, ajoutez ce script <strong>dans le <code>&lt;head&gt;</code></strong> avant le CSS :</p>
<x-docs::code>&lt;script&gt;
(function () {
    const stored = localStorage.getItem('ws-theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (stored === 'dark' || (!stored &amp;&amp; prefersDark)) {
        document.documentElement.classList.add('dark');
    }
})();
&lt;/script&gt;</x-docs::code>

{{-- Couleur primaire --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Changer la couleur primaire</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">La couleur primaire est définie en HSL dans <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">config/ws.php</code> et propagée automatiquement à tous les composants.</p>

<x-docs::code>// config/ws.php
'tokens' =&gt; [
    // Bleu (défaut)
    'primary-h' =&gt; '221',
    'primary-s' =&gt; '83%',
    'primary-l' =&gt; '53%',

    // Violet (SaaS moderne)
    'primary-h' =&gt; '263',
    'primary-s' =&gt; '70%',
    'primary-l' =&gt; '50%',

    // Vert émeraude
    'primary-h' =&gt; '160',
    'primary-s' =&gt; '84%',
    'primary-l' =&gt; '39%',
],</x-docs::code>

<div class="overflow-auto my-5">
<table class="w-full text-sm border border-zinc-200 dark:border-zinc-700 rounded-lg overflow-hidden">
    <thead class="bg-zinc-50 dark:bg-zinc-800">
        <tr>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Couleur</th>
            <th class="text-left px-4 py-2.5 font-semibold border-b border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300">H</th>
            <th class="text-left px-4 py-2.5 font-semibold border-b border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300">S</th>
            <th class="text-left px-4 py-2.5 font-semibold border-b border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300">L</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800 text-zinc-600 dark:text-zinc-400">
        <tr><td class="px-4 py-2.5">Bleu (défaut)</td><td class="px-4 py-2.5 font-mono text-xs">221</td><td class="px-4 py-2.5 font-mono text-xs">83%</td><td class="px-4 py-2.5 font-mono text-xs">53%</td></tr>
        <tr><td class="px-4 py-2.5">Violet</td><td class="px-4 py-2.5 font-mono text-xs">263</td><td class="px-4 py-2.5 font-mono text-xs">70%</td><td class="px-4 py-2.5 font-mono text-xs">50%</td></tr>
        <tr><td class="px-4 py-2.5">Vert émeraude</td><td class="px-4 py-2.5 font-mono text-xs">160</td><td class="px-4 py-2.5 font-mono text-xs">84%</td><td class="px-4 py-2.5 font-mono text-xs">39%</td></tr>
        <tr><td class="px-4 py-2.5">Orange</td><td class="px-4 py-2.5 font-mono text-xs">25</td><td class="px-4 py-2.5 font-mono text-xs">95%</td><td class="px-4 py-2.5 font-mono text-xs">53%</td></tr>
        <tr><td class="px-4 py-2.5">Rouge rubis</td><td class="px-4 py-2.5 font-mono text-xs">0</td><td class="px-4 py-2.5 font-mono text-xs">84%</td><td class="px-4 py-2.5 font-mono text-xs">60%</td></tr>
        <tr><td class="px-4 py-2.5">Rose</td><td class="px-4 py-2.5 font-mono text-xs">330</td><td class="px-4 py-2.5 font-mono text-xs">81%</td><td class="px-4 py-2.5 font-mono text-xs">60%</td></tr>
        <tr><td class="px-4 py-2.5">Indigo</td><td class="px-4 py-2.5 font-mono text-xs">239</td><td class="px-4 py-2.5 font-mono text-xs">84%</td><td class="px-4 py-2.5 font-mono text-xs">67%</td></tr>
    </tbody>
</table>
</div>

{{-- Rayons --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Rayons globaux</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Changez les arrondis de tous les composants en une seule fois pour un look « pill », « sharp » ou intermédiaire.</p>
<x-docs::code>// config/ws.php — Design "pill" : tout en arrondi
'tokens' =&gt; [
    'radius-sm'  =&gt; '9999px',
    'radius-md'  =&gt; '9999px',
    'radius-lg'  =&gt; '9999px',
    'radius-xl'  =&gt; '9999px',
    'radius-2xl' =&gt; '9999px',
],

// Design "sharp" : look enterprise sans arrondi
'tokens' =&gt; [
    'radius-sm'  =&gt; '0',
    'radius-md'  =&gt; '0',
    'radius-lg'  =&gt; '0',
    'radius-xl'  =&gt; '0',
    'radius-2xl' =&gt; '0',
],</x-docs::code>

{{-- Typographie --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Typographie</h2>
<x-docs::code>// config/ws.php
'tokens' =&gt; [
    // Inter — très utilisé dans les SaaS
    'font-sans' =&gt; "'Inter', ui-sans-serif, system-ui, sans-serif",

    // Geist — style Vercel
    'font-sans' =&gt; "'Geist', ui-sans-serif, system-ui, sans-serif",

    // Système natif — zéro chargement
    'font-sans' =&gt; "ui-sans-serif, system-ui, -apple-system, sans-serif",
],</x-docs::code>

{{-- Defaults composants --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Valeurs par défaut des composants</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Surcharger les valeurs par défaut permet d'appliquer un style cohérent à tous les composants sans répéter les props partout.</p>
<x-docs::code>// config/ws.php
'defaults' =&gt; [
    // Boutons doux partout
    'button' =&gt; ['variant' =&gt; 'soft', 'color' =&gt; 'neutral', 'size' =&gt; 'md'],

    // Badges solides
    'badge'  =&gt; ['variant' =&gt; 'solid', 'color' =&gt; 'primary'],

    // Inputs avec fond coloré
    'input'  =&gt; ['variant' =&gt; 'filled', 'size' =&gt; 'md'],

    // Cards avec ombre plutôt que bordure
    'card'   =&gt; ['variant' =&gt; 'elevated', 'padding' =&gt; 'lg'],
],</x-docs::code>

{{-- Surcharger les vues --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Surcharger les vues</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Pour personnaliser un composant spécifiquement sans modifier le package, publiez ses vues :</p>
<x-docs::code>php artisan vendor:publish --tag=ws-views</x-docs::code>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mt-3">Les vues seront copiées dans <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">resources/views/vendor/wirestack/</code> et prendront la priorité sur celles du package.</p>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.tokens') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Design Tokens</a>
    <a href="{{ route('docs.directives') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Directives Blade →</a>
</div>

</x-layouts.docs>
