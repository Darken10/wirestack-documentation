<x-layouts.docs title="Dropdown">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Superpositions</span><span>/</span><span>Dropdown</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Dropdown</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Menu contextuel déroulant déclenché au clic ou au survol. Supporte icônes, séparateurs et items désactivés.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex gap-4">
        <x-ws::dropdown>
            <x-slot name="trigger">
                <x-ws::button color="primary" iconTrailing="chevron-down">Mon compte</x-ws::button>
            </x-slot>
            <x-ws::dropdown-item href="#" icon="user">Profil</x-ws::dropdown-item>
            <x-ws::dropdown-item href="#" icon="cog-6-tooth">Paramètres</x-ws::dropdown-item>
            <x-ws::dropdown-item href="#" icon="chart-bar">Analytiques</x-ws::dropdown-item>
            <x-ws::divider />
            <x-ws::dropdown-item href="#" icon="arrow-right-on-rectangle" class="text-red-600">Déconnexion</x-ws::dropdown-item>
        </x-ws::dropdown>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::dropdown&gt;
    &lt;x-slot name="trigger"&gt;
        &lt;x-ws::button iconTrailing="chevron-down"&gt;Mon compte&lt;/x-ws::button&gt;
    &lt;/x-slot&gt;
    &lt;x-ws::dropdown-item href="/profile" icon="user"&gt;Profil&lt;/x-ws::dropdown-item&gt;
    &lt;x-ws::dropdown-item href="/settings" icon="cog-6-tooth"&gt;Paramètres&lt;/x-ws::dropdown-item&gt;
    &lt;x-ws::divider /&gt;
    &lt;x-ws::dropdown-item href="/logout" icon="arrow-right-on-rectangle"&gt;Déconnexion&lt;/x-ws::dropdown-item&gt;
&lt;/x-ws::dropdown&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Dropdown</h2>
<x-docs::props :rows="[
    ['align',   'string', 'left',  'left | right | center — alignement du menu'],
    ['width',   'string', '48',    'Largeur Tailwind (48 = 12rem)'],
    ['arrow',   'bool',   'false', 'Affiche une flèche vers le déclencheur'],
    ['trigger', 'string', 'click', 'click | hover — déclencheur'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — DropdownItem</h2>
<x-docs::props :rows="[
    ['href',     'string', 'null',  'URL de destination (sinon bouton)'],
    ['icon',     'string', '',      'Icône Heroicons'],
    ['disabled', 'bool',   'false', 'Désactive l\'item'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Alignement</h2>
<x-docs::demo>
    <div class="flex gap-4 justify-start">
        <x-ws::dropdown align="left">
            <x-slot name="trigger">
                <x-ws::button color="neutral" variant="outline" size="sm">Gauche</x-ws::button>
            </x-slot>
            <x-ws::dropdown-item>Option 1</x-ws::dropdown-item>
            <x-ws::dropdown-item>Option 2</x-ws::dropdown-item>
        </x-ws::dropdown>

        <x-ws::dropdown align="right">
            <x-slot name="trigger">
                <x-ws::button color="neutral" variant="outline" size="sm">Droite</x-ws::button>
            </x-slot>
            <x-ws::dropdown-item>Option 1</x-ws::dropdown-item>
            <x-ws::dropdown-item>Option 2</x-ws::dropdown-item>
        </x-ws::dropdown>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::dropdown align="left"&gt;...&lt;/x-ws::dropdown&gt;
&lt;x-ws::dropdown align="right"&gt;...&lt;/x-ws::dropdown&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec items désactivés</h2>
<x-docs::demo>
    <x-ws::dropdown>
        <x-slot name="trigger">
            <x-ws::button color="neutral" variant="outline" iconTrailing="chevron-down">Actions</x-ws::button>
        </x-slot>
        <x-ws::dropdown-item icon="pencil">Modifier</x-ws::dropdown-item>
        <x-ws::dropdown-item icon="document-duplicate">Dupliquer</x-ws::dropdown-item>
        <x-ws::dropdown-item icon="archive-box" :disabled="true">Archiver (désactivé)</x-ws::dropdown-item>
        <x-ws::divider />
        <x-ws::dropdown-item icon="trash" class="text-red-600">Supprimer</x-ws::dropdown-item>
    </x-ws::dropdown>
</x-docs::demo>
<x-docs::code>&lt;x-ws::dropdown-item icon="archive-box" :disabled="true"&gt;Archiver&lt;/x-ws::dropdown-item&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Dropdown avec avatar</h2>
<x-docs::demo>
    <x-ws::dropdown align="right">
        <x-slot name="trigger">
            <button class="flex items-center gap-2 rounded-full hover:ring-2 hover:ring-blue-300 transition">
                <x-ws::avatar initials="JD" color="primary" size="sm" />
            </button>
        </x-slot>
        <div class="px-4 py-2 border-b border-zinc-100 dark:border-zinc-700">
            <p class="text-sm font-medium text-zinc-900 dark:text-zinc-100">Jean Dupont</p>
            <p class="text-xs text-zinc-500">jean@exemple.com</p>
        </div>
        <x-ws::dropdown-item href="#" icon="user">Mon profil</x-ws::dropdown-item>
        <x-ws::dropdown-item href="#" icon="cog-6-tooth">Paramètres</x-ws::dropdown-item>
        <x-ws::dropdown-item href="#" icon="question-mark-circle">Aide</x-ws::dropdown-item>
        <x-ws::divider />
        <x-ws::dropdown-item href="#" icon="arrow-right-on-rectangle" class="text-red-600">Déconnexion</x-ws::dropdown-item>
    </x-ws::dropdown>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.collapsible') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Collapsible</a>
    <a href="{{ route('docs.popover') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Popover →</a>
</div>

</x-layouts.docs>
