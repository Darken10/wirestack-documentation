<x-layouts.docs title="Installation">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span>
        <span>Installation</span>
    </div>
    <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Installation</h1>
    <p class="text-zinc-600 dark:text-zinc-400">Ajouter Wirestack UI à votre projet Laravel en quelques étapes.</p>
</div>

<x-ws::alert color="info" title="Prérequis">
    PHP 8.2+, Laravel 10+, Livewire 3+, Tailwind CSS v3/v4, Alpine.js.
</x-ws::alert>

<div class="mt-4 p-4 bg-zinc-50 dark:bg-zinc-950 border border-zinc-100 dark:border-zinc-800 rounded-lg">
    <p class="text-sm font-medium text-zinc-800 dark:text-zinc-100 mb-2">Prérequis détaillés</p>
    <ul class="text-xs text-zinc-600 dark:text-zinc-400 space-y-1 list-inside list-disc">
        <li>PHP >= 8.2 et dépendances Composer installées.</li>
        <li>Laravel 10/11/12 — Wirestack supporte Laravel 10+ (y compris 12).</li>
        <li>Livewire 3+ ou 4+ selon votre projet.</li>
        <li>Tailwind CSS (v3 ou v4 recommandé). Assurez-vous d'avoir <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">node</code> et <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">npm</code> ou <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">pnpm</code> installés pour compiler les assets.</li>
        <li>Pour l'environnement de développement local (monorepo), utilisez la source <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">packages/wirestack</code> (voir plus bas).</li>
    </ul>
    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-3">Commandes utiles :</p>
    <x-docs::code label="Terminal">composer install
npm install
npm run dev</x-docs::code>
</div>

<div class="space-y-10 mt-8">

    {{-- Étape 1 --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">1</span>
            Installer via Composer
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Ajoutez le package à votre projet.</p>
        <x-docs::code label="Terminal">composer require darken10/wirestack</x-docs::code>
    </div>

    {{-- Étape 2 --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">2</span>
            Intégrer les assets CSS
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Configurez Tailwind CSS pour scanner les vues du package.</p>
        
        <div class="ml-8">
            <div class="mb-4 p-3 bg-amber-50 dark:bg-amber-950 border border-amber-200 dark:border-amber-800 rounded-lg">
                <p class="text-xs font-medium text-amber-900 dark:text-amber-100 mb-1">Pourquoi cette étape ?</p>
                <p class="text-xs text-amber-800 dark:text-amber-200">Wirestack fournit des composants avec leurs propres styles Tailwind CSS. Pour que Tailwind CSS génère automatiquement tous les styles utilisés, il doit <strong>scanner les fichiers du package</strong>. Sans cette configuration, les classes CSS ne seront pas générées et l'interface ne s'affichera pas correctement.</p>
            </div>
        </div>

        <p class="text-xs text-zinc-500 dark:text-zinc-400 ml-8 mb-2"><strong>Ouvrez</strong> <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">resources/css/app.css</code> <strong>et ajoutez :</strong></p>
        <x-docs::code label="resources/css/app.css">@import "tailwindcss";

/* Scanner les vues Blade et classes PHP du package Wirestack pour Tailwind */
@source "../../vendor/darken10/wirestack/resources/views/**/*.blade.php";
@source "../../vendor/darken10/wirestack/src/**/*.php";</x-docs::code>

                <div class="ml-8 mt-4">
                        <p class="text-xs font-medium text-zinc-700 dark:text-zinc-300">Exemple : configurer <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">tailwind.config.js</code> pour inclure les vues du package</p>
                        <x-docs::code label="tailwind.config.js">module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        '../../vendor/darken10/wirestack/resources/views/**/*.blade.php',
        '../../vendor/darken10/wirestack/src/**/*.php'
    ],
    theme: { extend: {} },
    plugins: [],
};</x-docs::code>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-2">Remplacez les chemins par <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">../../packages/wirestack/...</code> si vous travaillez en monorepo.</p>
                </div>

        <div class="ml-8 mt-3 space-y-2">
            <p class="text-xs font-medium text-zinc-700 dark:text-zinc-300">Ce que cela fait :</p>
            <ul class="text-xs text-zinc-600 dark:text-zinc-400 space-y-1 list-disc list-inside">
                <li><code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">@import "tailwindcss"</code> — Importe le framework Tailwind CSS</li>
                <li><code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">@source "...views/**/*.blade.php"</code> — Scanne les fichiers Blade du package</li>
                <li><code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">@source "...src/**/*.php"</code> — Scanne les fichiers PHP (pour les classes dynamiques)</li>
            </ul>
        </div>

        <div class="ml-8 mt-4 p-3 bg-blue-50 dark:bg-blue-950 border border-blue-200 dark:border-blue-800 rounded-lg">
            <p class="text-xs font-medium text-blue-900 dark:text-blue-100 mb-2">📦 Développement local (monorepo)</p>
            <p class="text-xs text-blue-800 dark:text-blue-200 mb-2">Si vous développez Wirestack dans <code class="bg-blue-100 dark:bg-blue-900 px-1 rounded">packages/wirestack/</code>, remplacez les chemins :</p>
            <x-docs::code label="resources/css/app.css">@import "tailwindcss";

/* Chemin local du package en développement */
@source "../../packages/wirestack/resources/views/**/*.blade.php";
@source "../../packages/wirestack/src/**/*.php";</x-docs::code>
        </div>
    </div>

    {{-- Étape 3 (anciennement 2) --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">3</span>
            Publier la configuration (optionnel)
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Publiez le fichier de configuration pour le personnaliser.</p>
        <x-docs::code label="Terminal">php artisan vendor:publish --tag=ws-config</x-docs::code>
        <p class="text-xs text-zinc-500 dark:text-zinc-400 ml-0 mt-2">Cela crée <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">config/ws.php</code> dans votre projet.</p>
    </div>

    {{-- Étape 4 --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">4</span>
            Ajouter les directives Blade
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Ajoutez ces directives dans votre layout principal.</p>
        <x-docs::code label="resources/views/layouts/app.blade.php">&lt;!DOCTYPE html&gt;
&lt;html lang="{{ app()->getLocale() }}"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;{{ config('app.name') }}&lt;/title&gt;

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Wirestack UI styles + design tokens --}}
    &#64;wsStyles

    &#64;livewireStyles
&lt;/head&gt;
&lt;body&gt;
    &#123;&#123; &#36;slot &#125;&#125;

    {{-- Wirestack UI scripts (Toast, Modal, Drawer helpers) --}}
    &#64;wsScripts

    &#64;livewireScripts
&lt;/body&gt;
&lt;/html&gt;</x-docs::code>
    </div>

    {{-- Étape 5 --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">5</span>
            Utiliser les composants
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Les composants sont disponibles immédiatement via le préfixe <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">ws</code>.</p>
        <x-docs::code label="Blade">&lt;x-ws::button variant="solid" color="primary"&gt;
    Mon bouton
&lt;/x-ws::button&gt;

&lt;x-ws::badge color="success"&gt;Actif&lt;/x-ws::badge&gt;

&lt;x-ws::alert color="info" title="Bon à savoir"&gt;
    Wirestack UI est installé et fonctionnel.
&lt;/x-ws::alert&gt;</x-docs::code>

        <x-docs::demo label="Rendu">
            <div class="flex flex-wrap items-center gap-3">
                <x-ws::button variant="solid" color="primary">Mon bouton</x-ws::button>
                <x-ws::badge color="success">Actif</x-ws::badge>
            </div>
            <div class="mt-4">
                <x-ws::alert color="info" title="Bon à savoir">
                    Wirestack UI est installé et fonctionnel.
                </x-ws::alert>
            </div>
        </x-docs::demo>
    </div>

    {{-- Composants Livewire --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-violet-600 text-white text-xs font-bold flex items-center justify-center shrink-0">6</span>
            Composants Livewire
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Les composants Livewire (Modal, Drawer, Toast) se déclarent une fois dans le layout.</p>
        <x-docs::code label="resources/views/layouts/app.blade.php">&lt;body&gt;
    {{-- Toast manager (unique, en haut du body) --}}
    &lt;livewire:ws::toast /&gt;

    {{-- Optionnel : Command Palette --}}
    &lt;livewire:ws::command-palette :commands="[]" /&gt;

    &#123;&#123; &#36;slot &#125;&#125;

    &#64;wsScripts
    &#64;livewireScripts
&lt;/body&gt;</x-docs::code>
    </div>

    {{-- Vues publiables --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1">Personnaliser les vues</h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Publiez les vues pour les modifier directement.</p>
        <x-docs::code label="Terminal">php artisan vendor:publish --tag=ws-views</x-docs::code>
        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-2">Les vues seront copiées dans <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">resources/views/vendor/ws/</code>.</p>
    </div>

</div>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <span class="text-sm text-zinc-400">← Introduction</span>
    <a href="{{ route('docs.configuration') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline flex items-center gap-1">
        Configuration →
    </a>
</div>

<div class="mt-8 p-4 bg-red-50 dark:bg-red-950 border border-red-100 dark:border-red-800 rounded-lg">
    <p class="text-sm font-medium text-red-800 dark:text-red-100">Dépannage rapide</p>
    <ul class="text-xs text-zinc-600 dark:text-zinc-400 mt-2 list-inside list-disc">
        <li><strong>Erreur Vite / manifest :</strong> exécutez <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">npm run build</code> ou <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">npm run dev</code> puis rechargez.</li>
        <li>Après modification des chemins Tailwind, videz le cache et relancez le dev server : <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">php artisan view:clear &amp;&amp; npm run dev</code>.</li>
        <li>Si les styles du package n'apparaissent pas, vérifiez que les chemins relatifs dans <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">resources/css/app.css</code> ou <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">tailwind.config.js</code> pointent bien vers <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">vendor/darken10/wirestack</code> ou <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">packages/wirestack</code>.</li>
    </ul>
</div>

</x-layouts.docs>
