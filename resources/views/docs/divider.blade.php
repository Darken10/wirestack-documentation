<x-layouts.docs title="Divider">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Divider</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Divider</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Séparateur visuel horizontal ou vertical, optionnellement avec un label centré.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-6">
        <x-ws::divider />
        <x-ws::divider label="ou" />
        <x-ws::divider label="Section suivante" />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::divider /&gt;
&lt;x-ws::divider label="ou" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['label',       'string', 'null',       'Texte affiché au centre du séparateur'],
    ['color',       'string', 'zinc',       'Couleur de la ligne (zinc, slate, etc.)'],
    ['orientation', 'string', 'horizontal', 'horizontal | vertical'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Divider simple</h2>
<x-docs::demo>
    <div class="space-y-4">
        <p class="text-sm text-zinc-600 dark:text-zinc-400">Contenu au-dessus du séparateur</p>
        <x-ws::divider />
        <p class="text-sm text-zinc-600 dark:text-zinc-400">Contenu en dessous du séparateur</p>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::divider /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec label</h2>
<x-docs::demo>
    <div class="space-y-6">
        <x-ws::divider label="ou" />
        <x-ws::divider label="Continuer avec" />
        <x-ws::divider label="Section 2" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::divider label="ou" /&gt;
&lt;x-ws::divider label="Continuer avec" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Utilisation dans un formulaire</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-4">
        <x-ws::button color="neutral" class="w-full" variant="outline">
            <x-ws::icon name="globe-alt" size="sm" />
            Continuer avec Google
        </x-ws::button>
        <x-ws::divider label="ou" />
        <x-ws::input label="Email" type="email" placeholder="vous@exemple.com" />
        <x-ws::input label="Mot de passe" type="password" placeholder="••••••••" />
        <x-ws::button color="primary" class="w-full">Se connecter</x-ws::button>
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Divider vertical</h2>
<x-docs::demo>
    <div class="flex items-center gap-4 h-12">
        <span class="text-sm text-zinc-600 dark:text-zinc-400">Élément 1</span>
        <x-ws::divider orientation="vertical" />
        <span class="text-sm text-zinc-600 dark:text-zinc-400">Élément 2</span>
        <x-ws::divider orientation="vertical" />
        <span class="text-sm text-zinc-600 dark:text-zinc-400">Élément 3</span>
    </div>
</x-docs::demo>
<x-docs::code>&lt;div class="flex items-center gap-4 h-12"&gt;
    &lt;span&gt;Élément 1&lt;/span&gt;
    &lt;x-ws::divider orientation="vertical" /&gt;
    &lt;span&gt;Élément 2&lt;/span&gt;
&lt;/div&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.tooltip') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Tooltip</a>
    <a href="{{ route('docs.copy-button') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">CopyButton →</a>
</div>

</x-layouts.docs>
