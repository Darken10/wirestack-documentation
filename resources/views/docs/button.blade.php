<x-layouts.docs title="Button">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span class="text-zinc-900 dark:text-zinc-100">Button</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Button</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Bouton interactif polyvalent. Supporte variants, couleurs, tailles, icônes, état de chargement et liens.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

{{-- Demo principal --}}
<x-docs.demo label="Aperçu">
    <div class="flex flex-wrap gap-3 items-center">
        <x-ws::button variant="solid" color="primary">Solid</x-ws::button>
        <x-ws::button variant="outline" color="primary">Outline</x-ws::button>
        <x-ws::button variant="ghost" color="primary">Ghost</x-ws::button>
        <x-ws::button variant="soft" color="primary">Soft</x-ws::button>
        <x-ws::button variant="link" color="primary">Link</x-ws::button>
    </div>
</x-docs.demo>

<x-docs.code label="Blade">&lt;x-ws::button variant="solid" color="primary"&gt;Solid&lt;/x-ws::button&gt;
&lt;x-ws::button variant="outline" color="primary"&gt;Outline&lt;/x-ws::button&gt;
&lt;x-ws::button variant="ghost" color="primary"&gt;Ghost&lt;/x-ws::button&gt;
&lt;x-ws::button variant="soft" color="primary"&gt;Soft&lt;/x-ws::button&gt;
&lt;x-ws::button variant="link" color="primary"&gt;Link&lt;/x-ws::button&gt;</x-docs.code>

{{-- Props --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs.props :rows="[
    ['variant',     'string', 'solid',   'solid | outline | ghost | soft | link'],
    ['color',       'string', 'primary', 'primary | secondary | success | danger | warning | info | neutral'],
    ['size',        'string', 'md',      'xs | sm | md | lg | xl'],
    ['rounded',     'string', 'md',      'none | sm | md | lg | full'],
    ['loading',     'bool',   'false',   'Affiche un spinner et désactive le bouton'],
    ['disabled',    'bool',   'false',   'Désactive le bouton'],
    ['full',        'bool',   'false',   'Largeur 100%'],
    ['square',      'bool',   'false',   'Taille égale (carré, pour icônes seules)'],
    ['icon',        'string', '',        'Nom d\'icône Heroicons (avant le texte)'],
    ['iconTrailing','string', '',        'Nom d\'icône Heroicons (après le texte)'],
    ['href',        'string', 'null',    'Si défini, rend une balise &lt;a&gt;'],
    ['buttonType',  'string', 'button',  'button | submit | reset'],
    ['confirm',     'string', 'null',    'Affiche une confirmation avant l\'action'],
]" />

{{-- Couleurs --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs.demo>
    <div class="flex flex-wrap gap-2">
        @foreach(['primary','secondary','success','danger','warning','info','neutral'] as $color)
            <x-ws::button variant="solid" :color="$color">{{ ucfirst($color) }}</x-ws::button>
        @endforeach
    </div>
</x-docs.demo>
<x-docs.code>&lt;x-ws::button color="primary"&gt;Primary&lt;/x-ws::button&gt;
&lt;x-ws::button color="secondary"&gt;Secondary&lt;/x-ws::button&gt;
&lt;x-ws::button color="success"&gt;Success&lt;/x-ws::button&gt;
&lt;x-ws::button color="danger"&gt;Danger&lt;/x-ws::button&gt;
&lt;x-ws::button color="warning"&gt;Warning&lt;/x-ws::button&gt;
&lt;x-ws::button color="info"&gt;Info&lt;/x-ws::button&gt;
&lt;x-ws::button color="neutral"&gt;Neutral&lt;/x-ws::button&gt;</x-docs.code>

{{-- Tailles --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs.demo>
    <div class="flex flex-wrap gap-2 items-center">
        @foreach(['xs','sm','md','lg','xl'] as $size)
            <x-ws::button variant="solid" color="primary" :size="$size">{{ strtoupper($size) }}</x-ws::button>
        @endforeach
    </div>
</x-docs.demo>
<x-docs.code>&lt;x-ws::button size="xs"&gt;XS&lt;/x-ws::button&gt;
&lt;x-ws::button size="sm"&gt;SM&lt;/x-ws::button&gt;
&lt;x-ws::button size="md"&gt;MD&lt;/x-ws::button&gt;
&lt;x-ws::button size="lg"&gt;LG&lt;/x-ws::button&gt;
&lt;x-ws::button size="xl"&gt;XL&lt;/x-ws::button&gt;</x-docs.code>

{{-- Icônes --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec icônes</h2>
<x-docs.demo>
    <div class="flex flex-wrap gap-3 items-center">
        <x-ws::button variant="solid" color="primary" icon="plus">Ajouter</x-ws::button>
        <x-ws::button variant="outline" color="neutral" icon="arrow-down-tray">Télécharger</x-ws::button>
        <x-ws::button variant="soft" color="danger" icon-trailing="trash">Supprimer</x-ws::button>
        <x-ws::button variant="solid" color="primary" :square="true" icon="pencil" />
    </div>
</x-docs.demo>
<x-docs.code>&lt;!-- Icône avant --&gt;
&lt;x-ws::button icon="plus"&gt;Ajouter&lt;/x-ws::button&gt;

&lt;!-- Icône après --&gt;
&lt;x-ws::button icon-trailing="trash"&gt;Supprimer&lt;/x-ws::button&gt;

&lt;!-- Bouton carré (icône seule) --&gt;
&lt;x-ws::button :square="true" icon="pencil" /&gt;</x-docs.code>

{{-- États --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">États</h2>
<x-docs.demo>
    <div class="flex flex-wrap gap-3 items-center">
        <x-ws::button variant="solid" color="primary" :loading="true">Chargement…</x-ws::button>
        <x-ws::button variant="solid" color="primary" :disabled="true">Désactivé</x-ws::button>
        <x-ws::button variant="solid" color="primary" :full="true">Pleine largeur</x-ws::button>
    </div>
</x-docs.demo>
<x-docs.code>&lt;!-- Loading --&gt;
&lt;x-ws::button :loading="true"&gt;Enregistrement…&lt;/x-ws::button&gt;

&lt;!-- Disabled --&gt;
&lt;x-ws::button :disabled="true"&gt;Non disponible&lt;/x-ws::button&gt;

&lt;!-- Full width --&gt;
&lt;x-ws::button :full="true"&gt;Pleine largeur&lt;/x-ws::button&gt;</x-docs::code>

{{-- Lien --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Bouton-lien</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Passez <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">href</code> pour rendre une balise <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;a&gt;</code> avec le style d'un bouton.</p>
<x-docs.demo>
    <x-ws::button variant="solid" color="primary" href="{{ route('docs.badge') }}" icon-trailing="arrow-right">
        Voir Badge
    </x-ws::button>
</x-docs.demo>
<x-docs.code>&lt;x-ws::button href="{{ route('docs.badge') }}" icon-trailing="arrow-right"&gt;
    Voir Badge
&lt;/x-ws::button&gt;</x-docs.code>

{{-- Confirmation --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Confirmation</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">La prop <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">confirm</code> affiche une boîte de dialogue native avant de soumettre.</p>
<x-docs.code>&lt;x-ws::button
    color="danger"
    variant="solid"
    confirm="Êtes-vous sûr de vouloir supprimer cet élément ?"
    wire:click="delete"&gt;
    Supprimer
&lt;/x-ws::button&gt;</x-docs.code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.tokens') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Design Tokens</a>
    <a href="{{ route('docs.badge') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Badge →</a>
</div>

</x-layouts.docs>
