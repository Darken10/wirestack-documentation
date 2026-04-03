<x-layouts.docs title="Tooltip">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Tooltip</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Tooltip</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Info-bulle contextuelle affichée au survol d'un élément. Supporte plusieurs positions et couleurs.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-4 items-center justify-center py-4">
        <x-ws::tooltip text="Info-bulle en haut" position="top">
            <x-ws::button color="primary">Survolez-moi</x-ws::button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Info-bulle en bas" position="bottom">
            <x-ws::button color="secondary">Bas</x-ws::button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Info-bulle à gauche" position="left">
            <x-ws::button color="neutral">Gauche</x-ws::button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Info-bulle à droite" position="right">
            <x-ws::button color="neutral">Droite</x-ws::button>
        </x-ws::tooltip>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::tooltip text="Ceci est une info-bulle"&gt;
    &lt;x-ws::button&gt;Survolez-moi&lt;/x-ws::button&gt;
&lt;/x-ws::tooltip&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['text',     'string', '',     'Texte affiché dans l\'info-bulle'],
    ['position', 'string', 'top',  'top | bottom | left | right'],
    ['color',    'string', 'dark', 'dark | light'],
    ['arrow',    'bool',   'true', 'Affiche une flèche pointant vers l\'élément'],
    ['delay',    'int',    '0',    'Délai avant l\'affichage en millisecondes'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Positions</h2>
<x-docs::demo>
    <div class="grid grid-cols-2 gap-4 max-w-xs mx-auto py-4">
        <x-ws::tooltip text="Haut" position="top">
            <x-ws::button variant="outline" color="neutral" class="w-full">top</x-ws::button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Bas" position="bottom">
            <x-ws::button variant="outline" color="neutral" class="w-full">bottom</x-ws::button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Gauche" position="left">
            <x-ws::button variant="outline" color="neutral" class="w-full">left</x-ws::button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Droite" position="right">
            <x-ws::button variant="outline" color="neutral" class="w-full">right</x-ws::button>
        </x-ws::tooltip>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::tooltip text="Haut" position="top"&gt;...&lt;/x-ws::tooltip&gt;
&lt;x-ws::tooltip text="Bas" position="bottom"&gt;...&lt;/x-ws::tooltip&gt;
&lt;x-ws::tooltip text="Gauche" position="left"&gt;...&lt;/x-ws::tooltip&gt;
&lt;x-ws::tooltip text="Droite" position="right"&gt;...&lt;/x-ws::tooltip&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <div class="flex gap-4 items-center">
        <x-ws::tooltip text="Thème sombre" color="dark" position="top">
            <x-ws::button color="neutral">Dark</x-ws::button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Thème clair" color="light" position="top">
            <x-ws::button color="neutral">Light</x-ws::button>
        </x-ws::tooltip>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::tooltip text="Info-bulle sombre" color="dark"&gt;
    &lt;x-ws::button&gt;Dark&lt;/x-ws::button&gt;
&lt;/x-ws::tooltip&gt;

&lt;x-ws::tooltip text="Info-bulle claire" color="light"&gt;
    &lt;x-ws::button&gt;Light&lt;/x-ws::button&gt;
&lt;/x-ws::tooltip&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Sur des icônes</h2>
<x-docs::demo>
    <div class="flex gap-4 items-center">
        <x-ws::tooltip text="Modifier" position="top">
            <button class="p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800">
                <x-ws::icon name="pencil" class="text-zinc-500" />
            </button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Supprimer" position="top">
            <button class="p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800">
                <x-ws::icon name="trash" class="text-zinc-500" />
            </button>
        </x-ws::tooltip>
        <x-ws::tooltip text="Partager" position="top">
            <button class="p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800">
                <x-ws::icon name="share" class="text-zinc-500" />
            </button>
        </x-ws::tooltip>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::tooltip text="Modifier" position="top"&gt;
    &lt;button class="p-2 rounded-lg hover:bg-zinc-100"&gt;
        &lt;x-ws::icon name="pencil" /&gt;
    &lt;/button&gt;
&lt;/x-ws::tooltip&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.skeleton') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Skeleton</a>
    <a href="{{ route('docs.divider') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Divider →</a>
</div>

</x-layouts.docs>
