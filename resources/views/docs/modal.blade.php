<x-layouts.docs title="Modal">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Livewire</span><span>/</span><span>Modal</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Modal</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Fenêtre modale Livewire. Déclenché via JS (<code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">DsModal.open(id)</code>) ou événements Livewire.</p>
        </div>
        <x-ws::badge variant="soft" color="warning">Livewire</x-ws::badge>
    </div>
</div>

{{-- Déclarer la modal Livewire --}}
<livewire:ws::modal modal-id="docs-modal" title="Confirmation requise" />
<livewire:ws::modal modal-id="docs-modal-form" title="Modifier le profil" size="lg" />

<x-docs::demo label="Aperçu">
    <div class="flex gap-3">
        <x-ws::button color="primary" @click="DsModal.open('docs-modal')">
            Ouvrir la modal
        </x-ws::button>
        <x-ws::button color="secondary" variant="outline" @click="DsModal.open('docs-modal-form')">
            Modal formulaire
        </x-ws::button>
    </div>
</x-docs::demo>

<x-docs::code>{{-- 1. Déclarer la modal dans le template (une seule fois) --}}
&lt;livewire:ws::modal modal-id="confirm-modal" title="Confirmer la suppression" /&gt;

{{-- 2. Ouvrir via JavaScript --}}
&lt;x-ws::button &#64;click="DsModal.open('confirm-modal')"&gt;
    Supprimer
&lt;/x-ws::button&gt;

{{-- 3. Ouvrir depuis Livewire --}}
$this-&gt;dispatch('ds-modal-open:confirm-modal');</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['modalId',     'string', 'modal',  'Identifiant unique de la modal'],
    ['size',        'string', 'md',     'sm | md | lg | xl | 2xl | full'],
    ['position',    'string', 'center', 'center | top'],
    ['closeable',   'bool',   'true',   'L\'utilisateur peut fermer la modal'],
    ['backdrop',    'bool',   'true',   'Fond sombre cliquable pour fermer'],
    ['title',       'string', 'null',   'Titre affiché dans le header'],
    ['description', 'string', 'null',   'Sous-titre sous le titre'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">API JavaScript</h2>
<x-docs::demo>
    <div class="bg-zinc-50 dark:bg-zinc-800 rounded-xl p-4 space-y-2 font-mono text-sm">
        <p class="text-zinc-700 dark:text-zinc-300"><span class="text-blue-500">DsModal</span>.<span class="text-green-500">open</span>(<span class="text-amber-500">'modal-id'</span>)</p>
        <p class="text-zinc-700 dark:text-zinc-300"><span class="text-blue-500">DsModal</span>.<span class="text-red-500">close</span>(<span class="text-amber-500">'modal-id'</span>)</p>
    </div>
</x-docs::demo>
<x-docs::code>// Ouvrir
DsModal.open('ma-modal')

// Fermer
DsModal.close('ma-modal')

// Événements Livewire
$dispatch('ds-modal-open:ma-modal')
$dispatch('ds-modal-close:ma-modal')</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles disponibles</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-2">
        @foreach(['sm','md','lg','xl','2xl','full'] as $size)
            <x-ws::button color="neutral" variant="outline" size="sm" @click="DsModal.open('docs-modal-{{ $size }}')">
                {{ $size }}
            </x-ws::button>
            <livewire:ws::modal :modal-id="'docs-modal-' . $size" title="Modal {{ $size }}" :size="$size" />
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;livewire:ws::modal modal-id="modal-sm" title="Petite modal" size="sm" /&gt;
&lt;livewire:ws::modal modal-id="modal-lg" title="Grande modal" size="lg" /&gt;
&lt;livewire:ws::modal modal-id="modal-full" title="Modal plein écran" size="full" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Modal avec formulaire</h2>
<x-docs::demo>
    <x-ws::button color="primary" icon="pencil" @click="DsModal.open('docs-modal-form')">
        Modifier le profil
    </x-ws::button>
</x-docs::demo>
<x-docs::code>{{-- Déclaration --}}
&lt;livewire:ws::modal modal-id="edit-profile" title="Modifier le profil" size="lg"&gt;
    &lt;x-slot name="content"&gt;
        &lt;div class="space-y-4"&gt;
            &lt;div class="grid grid-cols-2 gap-4"&gt;
                &lt;x-ws::input label="Prénom" value="Jean" /&gt;
                &lt;x-ws::input label="Nom" value="Dupont" /&gt;
            &lt;/div&gt;
            &lt;x-ws::input label="Email" type="email" value="jean@exemple.com" /&gt;
            &lt;x-ws::textarea label="Bio" :rows="3" /&gt;
        &lt;/div&gt;
    &lt;/x-slot&gt;
    &lt;x-slot name="footer"&gt;
        &lt;x-ws::button color="neutral" variant="outline" &#64;click="DsModal.close('edit-profile')"&gt;
            Annuler
        &lt;/x-ws::button&gt;
        &lt;x-ws::button color="primary"&gt;Sauvegarder&lt;/x-ws::button&gt;
    &lt;/x-slot&gt;
&lt;/livewire:ws::modal&gt;

{{-- Déclencheur --}}
&lt;x-ws::button &#64;click="DsModal.open('edit-profile')"&gt;Modifier&lt;/x-ws::button&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.popover') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Popover</a>
    <a href="{{ route('docs.drawer') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Drawer →</a>
</div>

</x-layouts.docs>
