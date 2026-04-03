<x-layouts.docs title="Range">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>Range</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Range</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Curseur de plage pour sélectionner une valeur numérique entre un minimum et un maximum.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="max-w-sm space-y-4">
        <x-ws::range label="Volume" :min="0" :max="100" :step="1" />
        <x-ws::range label="Prix maximum" :min="0" :max="1000" :step="10" show-value />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::range label="Volume" :min="0" :max="100" /&gt;
&lt;x-ws::range label="Prix" :min="0" :max="1000" show-value /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['label',     'string', '',        'Label affiché au-dessus du curseur'],
    ['min',       'int',    '0',       'Valeur minimale'],
    ['max',       'int',    '100',     'Valeur maximale'],
    ['step',      'int',    '1',       'Incrément entre chaque valeur'],
    ['color',     'string', 'primary', 'primary | secondary | success | danger | warning | info'],
    ['show-value', 'bool',  'false',   'Affiche la valeur courante (Alpine.js)'],
    ['hint',      'string', '—',       'Texte d\'aide sous le curseur'],
    ['wire:model','string', '—',       'Intégration Livewire'],
    ['disabled',  'bool',   'false',   'Désactive le curseur'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec affichage de valeur</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-4">
        <x-ws::range label="Luminosité" :min="0" :max="100" show-value />
        <x-ws::range label="Zoom" :min="50" :max="200" :step="10" show-value />
        <x-ws::range label="Budget (€)" :min="0" :max="5000" :step="100" show-value />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::range label="Luminosité" :min="0" :max="100" show-value /&gt;
&lt;x-ws::range label="Budget (€)" :min="0" :max="5000" :step="100" show-value /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        @foreach(['primary','secondary','success','danger','warning','info'] as $color)
            <x-ws::range :label="ucfirst($color)" :color="$color" show-value />
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::range label="Primary" color="primary" /&gt;
&lt;x-ws::range label="Success" color="success" /&gt;
&lt;x-ws::range label="Danger" color="danger" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Désactivé</h2>
<x-docs::demo>
    <div class="max-w-sm">
        <x-ws::range label="Valeur non modifiable" disabled show-value />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::range label="Désactivé" :disabled="true" /&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.toggle') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Toggle</a>
    <a href="{{ route('docs.input-group') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">InputGroup →</a>
</div>

</x-layouts.docs>
