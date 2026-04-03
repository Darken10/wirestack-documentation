<x-layouts.docs title="Directives Blade">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Démarrage</span><span>/</span><span class="text-zinc-900 dark:text-zinc-100">Directives</span>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Directives Blade</h1>
        <p class="text-zinc-600 dark:text-zinc-400">Wirestack UI expose deux directives Blade à placer dans votre layout principal : <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded text-sm">&#64;wsStyles</code> et <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded text-sm">&#64;wsScripts</code>.</p>
    </div>
</div>

{{-- @wsStyles --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">&#64;wsStyles</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">À placer dans le <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;head&gt;</code>. Injecte un bloc <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;style&gt;</code> contenant toutes les variables CSS (design tokens) définies dans <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">config/ws.php</code>.</p>

<x-docs::code>&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &#64;wsStyles
    &#64;vite(['resources/css/app.css'])
    &#64;livewireStyles
&lt;/head&gt;</x-docs::code>

<p class="text-sm text-zinc-600 dark:text-zinc-400 my-4">Exemple de sortie générée par <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&#64;wsStyles</code> :</p>
<x-docs::code>&lt;style&gt;
    :root {
        --ws-primary-h: 221;
        --ws-primary-s: 83%;
        --ws-primary-l: 53%;
        --ws-radius-sm: 0.25rem;
        --ws-radius-md: 0.375rem;
        --ws-radius-lg: 0.5rem;
        --ws-radius-xl: 0.75rem;
        --ws-radius-2xl: 1rem;
        --ws-radius-full: 9999px;
        --ws-font-sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
        --ws-transition-fast: 100ms ease;
        --ws-transition-normal: 180ms ease;
        --ws-transition-slow: 300ms ease;
        --ws-shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --ws-shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), ...;
        --ws-shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), ...;
    }
&lt;/style&gt;</x-docs::code>

{{-- @wsScripts --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">&#64;wsScripts</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">À placer juste avant <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;/body&gt;</code>. Injecte les helpers JavaScript globaux du package et configure le raccourci clavier <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">⌘K</code> pour la palette de commandes.</p>

<x-docs::code>&lt;body&gt;
    {{ $slot }}

    &#64;wsScripts
    &#64;livewireScripts
&lt;/body&gt;</x-docs::code>

<p class="text-sm text-zinc-600 dark:text-zinc-400 my-4">Helpers disponibles après injection :</p>
<div class="overflow-auto my-5">
<table class="w-full text-sm border border-zinc-200 dark:border-zinc-700 rounded-lg overflow-hidden">
    <thead class="bg-zinc-50 dark:bg-zinc-800">
        <tr>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Objet global</th>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Description</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800 text-zinc-600 dark:text-zinc-400">
        <tr><td class="px-4 py-2.5 font-mono text-xs text-blue-600 dark:text-blue-400">DsToast</td><td class="px-4 py-2.5">Déclencher des notifications flottantes</td></tr>
        <tr><td class="px-4 py-2.5 font-mono text-xs text-blue-600 dark:text-blue-400">DsModal</td><td class="px-4 py-2.5">Ouvrir / fermer une modale par son ID</td></tr>
        <tr><td class="px-4 py-2.5 font-mono text-xs text-blue-600 dark:text-blue-400">DsDrawer</td><td class="px-4 py-2.5">Ouvrir / fermer un drawer par son ID</td></tr>
        <tr><td class="px-4 py-2.5 font-mono text-xs text-blue-600 dark:text-blue-400">DsCommandPalette</td><td class="px-4 py-2.5">Ouvrir / fermer la palette de commandes</td></tr>
        <tr><td class="px-4 py-2.5 font-mono text-xs text-blue-600 dark:text-blue-400">DsCopy</td><td class="px-4 py-2.5">Copier du texte dans le presse-papiers</td></tr>
    </tbody>
</table>
</div>

{{-- Layout complet --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Exemple de layout complet</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Exemple de layout Blade minimal avec toutes les directives nécessaires :</p>
<x-docs::code>&lt;!DOCTYPE html&gt;
&lt;html lang="fr"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8" /&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0" /&gt;
    &lt;title&gt;Mon App&lt;/title&gt;

    &#64;wsStyles
    &#64;vite(['resources/css/app.css', 'resources/js/app.js'])
    &#64;livewireStyles
&lt;/head&gt;
&lt;body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100"&gt;

    &lt;livewire:ws::toast /&gt;

    {{ $slot }}

    &#64;wsScripts
    &#64;livewireScripts
&lt;/body&gt;
&lt;/html&gt;</x-docs::code>

<div class="mt-6 p-4 rounded-xl bg-amber-50 dark:bg-amber-950/30 border border-amber-200 dark:border-amber-800">
    <p class="text-sm text-amber-800 dark:text-amber-200">
        <strong>Important :</strong> <code class="bg-amber-100 dark:bg-amber-900/50 px-1 rounded">&#64;wsStyles</code> doit être placé <strong>avant</strong> <code class="bg-amber-100 dark:bg-amber-900/50 px-1 rounded">&#64;vite</code> pour que les variables CSS soient disponibles dès le rendu. De même, <code class="bg-amber-100 dark:bg-amber-900/50 px-1 rounded">&#64;wsScripts</code> doit être placé avant <code class="bg-amber-100 dark:bg-amber-900/50 px-1 rounded">&#64;livewireScripts</code>.
    </p>
</div>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.theming') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Theming</a>
    <a href="{{ route('docs.javascript-api') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">API JavaScript →</a>
</div>

</x-layouts.docs>
