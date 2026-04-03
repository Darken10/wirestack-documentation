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
        {{-- Avec label prop (trigger automatique) --}}
        <x-ws::dropdown label="Mon compte">
            <x-ws::dropdown-item label="Profil" href="#" icon="user" />
            <x-ws::dropdown-item label="Paramètres" href="#" icon="cog-6-tooth" />
            <x-ws::dropdown-item label="Analytiques" href="#" icon="chart-bar" />
            <x-ws::dropdown-item separator />
            <x-ws::dropdown-item label="Déconnexion" href="#" icon="arrow-right-on-rectangle" danger />
        </x-ws::dropdown>
    </div>
</x-docs::demo>

<x-docs::code>{{-- Avec label prop : bouton trigger généré automatiquement --}}
&lt;x-ws::dropdown label="Mon compte"&gt;
    &lt;x-ws::dropdown-item label="Profil"      href="/profile"  icon="user" /&gt;
    &lt;x-ws::dropdown-item label="Paramètres"  href="/settings" icon="cog-6-tooth" /&gt;
    &lt;x-ws::dropdown-item separator /&gt;
    &lt;x-ws::dropdown-item label="Déconnexion" href="/logout"   icon="arrow-right-on-rectangle" danger /&gt;
&lt;/x-ws::dropdown&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Dropdown</h2>
<x-docs::props :rows="[
    ['label', 'string', '—',     'Libellé du bouton déclencheur (trigger automatique)'],
    ['align', 'string', 'left',  'left | right — alignement du menu'],
    ['width', 'string', '48',    'Largeur Tailwind (w-{width}, ex: 48 = 12rem)'],
    ['arrow', 'bool',   'false', 'Affiche une flèche pointant vers le trigger'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-6 mb-2">Props — DropdownItem</h2>
<x-docs::props :rows="[
    ['label',     'string', '—',     'Libellé de l\'entrée'],
    ['href',      'string', '—',     'URL de destination (sinon bouton)'],
    ['icon',      'string', '—',     'Icône Heroicons'],
    ['danger',    'bool',   'false', 'Surligne l\'item en rouge'],
    ['disabled',  'bool',   'false', 'Désactive l\'item'],
    ['separator', 'bool',   'false', 'Affiche un séparateur (ignore les autres props)'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Trigger personnalisé</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Utilisez le slot <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">trigger</code> pour un déclencheur sur mesure (avatar, icône, etc.).</p>
<x-docs::demo>
    <x-ws::dropdown align="right">
        <x-slot:trigger>
            <button class="flex items-center gap-2 rounded-full hover:ring-2 hover:ring-blue-300 transition">
                <x-ws::avatar initials="JD" color="primary" size="sm" />
            </button>
        </x-slot:trigger>
        <div class="px-4 py-2 border-b border-zinc-100 dark:border-zinc-700">
            <p class="text-sm font-medium text-zinc-900 dark:text-zinc-100">Jean Dupont</p>
            <p class="text-xs text-zinc-500">jean@exemple.com</p>
        </div>
        <x-ws::dropdown-item label="Mon profil"   href="#" icon="user" />
        <x-ws::dropdown-item label="Paramètres"   href="#" icon="cog-6-tooth" />
        <x-ws::dropdown-item label="Aide"         href="#" icon="question-mark-circle" />
        <x-ws::dropdown-item separator />
        <x-ws::dropdown-item label="Déconnexion"  href="#" icon="arrow-right-on-rectangle" danger />
    </x-ws::dropdown>
</x-docs::demo>
<x-docs::code>&lt;x-ws::dropdown align="right"&gt;
    &lt;x-slot:trigger&gt;
        &lt;x-ws::avatar initials="JD" size="sm" class="cursor-pointer" /&gt;
    &lt;/x-slot:trigger&gt;
    &lt;x-ws::dropdown-item label="Mon profil" href="/profile"  icon="user" /&gt;
    &lt;x-ws::dropdown-item label="Paramètres" href="/settings" icon="cog-6-tooth" /&gt;
    &lt;x-ws::dropdown-item separator /&gt;
    &lt;x-ws::dropdown-item label="Déconnexion" href="/logout"   icon="arrow-right-on-rectangle" danger /&gt;
&lt;/x-ws::dropdown&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Alignement</h2>
<x-docs::demo>
    <div class="flex gap-4 justify-start">
        <x-ws::dropdown label="Gauche" align="left">
            <x-ws::dropdown-item label="Option 1" />
            <x-ws::dropdown-item label="Option 2" />
        </x-ws::dropdown>

        <x-ws::dropdown label="Droite" align="right">
            <x-ws::dropdown-item label="Option 1" />
            <x-ws::dropdown-item label="Option 2" />
        </x-ws::dropdown>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::dropdown label="Gauche" align="left"&gt;...&lt;/x-ws::dropdown&gt;
&lt;x-ws::dropdown label="Droite" align="right"&gt;...&lt;/x-ws::dropdown&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Item danger, désactivé & séparateur</h2>
<x-docs::demo>
    <x-ws::dropdown label="Actions">
        <x-ws::dropdown-item label="Modifier"             icon="pencil" />
        <x-ws::dropdown-item label="Dupliquer"            icon="document-duplicate" />
        <x-ws::dropdown-item label="Archiver (désactivé)" icon="archive-box" disabled />
        <x-ws::dropdown-item separator />
        <x-ws::dropdown-item label="Supprimer"            icon="trash" danger />
    </x-ws::dropdown>
</x-docs::demo>
<x-docs::code>&lt;x-ws::dropdown label="Actions"&gt;
    &lt;x-ws::dropdown-item label="Modifier"   icon="pencil" /&gt;
    &lt;x-ws::dropdown-item label="Archiver"   icon="archive-box" disabled /&gt;
    &lt;x-ws::dropdown-item separator /&gt;
    &lt;x-ws::dropdown-item label="Supprimer"  icon="trash" danger /&gt;
&lt;/x-ws::dropdown&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Dropdown export</h2>
<x-docs::demo>
    <x-ws::dropdown label="Exporter" align="right" width="56">
        <x-ws::dropdown-item label="Export CSV"   icon="table-cells" />
        <x-ws::dropdown-item label="Export Excel" icon="document-chart-bar" />
        <x-ws::dropdown-item label="Export PDF"   icon="document-text" />
    </x-ws::dropdown>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.collapsible') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Collapsible</a>
    <a href="{{ route('docs.popover') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Popover →</a>
</div>

</x-layouts.docs>
