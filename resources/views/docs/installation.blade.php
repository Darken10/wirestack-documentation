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

<div class="space-y-10 mt-8">

    {{-- Étape 1 --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">1</span>
            Installer via Composer
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Ajoutez le package à votre projet.</p>
        <x-docs::code label="Terminal">composer require wirestack/ui</x-docs::code>
    </div>

    {{-- Étape 2 --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">2</span>
            Publier la configuration (optionnel)
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Publiez le fichier de configuration pour le personnaliser.</p>
        <x-docs::code label="Terminal">php artisan vendor:publish --tag=ws-config</x-docs::code>
        <p class="text-xs text-zinc-500 dark:text-zinc-400 ml-0 mt-2">Cela crée <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">config/ws.php</code> dans votre projet.</p>
    </div>

    {{-- Étape 3 --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">3</span>
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
    {{ $slot }}

    {{-- Wirestack UI scripts (Toast, Modal, Drawer helpers) --}}
    &#64;wsScripts

    &#64;livewireScripts
&lt;/body&gt;
&lt;/html&gt;</x-docs::code>
    </div>

    {{-- Étape 4 --}}
    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-1 flex items-center gap-2">
            <span class="h-6 w-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0">4</span>
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
            <span class="h-6 w-6 rounded-full bg-violet-600 text-white text-xs font-bold flex items-center justify-center shrink-0">5</span>
            Composants Livewire
        </h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3 ml-8">Les composants Livewire (Modal, Drawer, Toast) se déclarent une fois dans le layout.</p>
        <x-docs::code label="resources/views/layouts/app.blade.php">&lt;body&gt;
    {{-- Toast manager (unique, en haut du body) --}}
    &lt;livewire:ws::toast /&gt;

    {{-- Optionnel : Command Palette --}}
    &lt;livewire:ws::command-palette :commands="[]" /&gt;

    {{ $slot }}

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

</x-layouts.docs>
