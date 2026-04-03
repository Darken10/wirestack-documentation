<x-layouts.docs title="CopyButton">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>CopyButton</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">CopyButton</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Bouton qui copie du texte dans le presse-papier avec un retour visuel de confirmation.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-4 items-center">
        <x-ws::copy-button text="npm install wirestack/ui" />
        <x-ws::copy-button text="composer require wirestack/ui" label="Copier" />
        <x-ws::copy-button text="yarn add wirestack" label="yarn add wirestack" successLabel="Copié !" />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::copy-button text="npm install wirestack/ui" /&gt;
&lt;x-ws::copy-button text="npm install wirestack/ui" label="Copier la commande" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['text',         'string', 'required', 'Texte à copier dans le presse-papier'],
    ['size',         'string', 'md',       'Taille du bouton : sm | md | lg'],
    ['variant',      'string', 'ghost',    'Variante du bouton : ghost | outline | solid'],
    ['label',        'string', '',         'Texte affiché dans le bouton (optionnel)'],
    ['successLabel', 'string', 'Copié!',   'Texte affiché après la copie réussie'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Bouton simple</h2>
<x-docs::demo>
    <x-ws::copy-button text="composer require wirestack/ui" />
</x-docs::demo>
<x-docs::code>&lt;x-ws::copy-button text="composer require wirestack/ui" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec label</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-3">
        <x-ws::copy-button text="npm install wirestack/ui" label="npm install wirestack/ui" />
        <x-ws::copy-button text="php artisan make:component" label="php artisan make:component" successLabel="Commande copiée !" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::copy-button
    text="npm install wirestack/ui"
    label="npm install wirestack/ui"
    successLabel="Copié !"
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Intégré dans une zone de code</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Le CopyButton s'intègre parfaitement dans les blocs de code de documentation.</p>
<x-docs::demo>
    <div class="bg-zinc-900 rounded-xl p-4 flex items-center justify-between gap-4">
        <code class="text-sm text-zinc-100 font-mono">composer require wirestack/ui</code>
        <x-ws::copy-button text="composer require wirestack/ui" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;div class="bg-zinc-900 rounded-xl p-4 flex items-center justify-between"&gt;
    &lt;code class="text-sm text-zinc-100 font-mono"&gt;composer require wirestack/ui&lt;/code&gt;
    &lt;x-ws::copy-button text="composer require wirestack/ui" /&gt;
&lt;/div&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.divider') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Divider</a>
    <a href="{{ route('docs.input') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Input →</a>
</div>

</x-layouts.docs>
