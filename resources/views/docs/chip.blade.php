<x-layouts.docs title="Chip">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Chip</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Chip</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Étiquettes interactives compactes pour les filtres, tags, sélections ou catégories. Supporte les icônes et la fermeture.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-2 items-center">
        <x-ws::chip label="Laravel" color="primary" />
        <x-ws::chip label="Livewire" color="secondary" />
        <x-ws::chip label="Succès" color="success" />
        <x-ws::chip label="Danger" color="danger" />
        <x-ws::chip label="Attention" color="warning" />
        <x-ws::chip label="Info" color="info" />
        <x-ws::chip label="Neutre" color="neutral" />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::chip label="Laravel" color="primary" /&gt;
&lt;x-ws::chip label="Livewire" color="secondary" /&gt;
&lt;x-ws::chip label="Succès" color="success" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['label',      'string', '',        'Texte affiché dans le chip'],
    ['color',      'string', 'neutral', 'primary | secondary | success | danger | warning | info | neutral'],
    ['size',       'string', 'sm',      'xs | sm | md'],
    ['icon',       'string', '',        'Nom d\'icône Heroicons à afficher en début de chip'],
    ['dismissible','bool',   'false',   'Affiche un bouton de fermeture'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-2">
        @foreach(['primary','secondary','success','danger','warning','info','neutral'] as $color)
            <x-ws::chip :label="ucfirst($color)" :color="$color" />
        @endforeach
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-3 items-center">
        <div class="text-center">
            <x-ws::chip label="Extra Small" color="primary" size="xs" />
            <p class="text-xs text-zinc-400 mt-1">xs</p>
        </div>
        <div class="text-center">
            <x-ws::chip label="Small" color="primary" size="sm" />
            <p class="text-xs text-zinc-400 mt-1">sm</p>
        </div>
        <div class="text-center">
            <x-ws::chip label="Medium" color="primary" size="md" />
            <p class="text-xs text-zinc-400 mt-1">md</p>
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::chip label="Extra Small" color="primary" size="xs" /&gt;
&lt;x-ws::chip label="Small" color="primary" size="sm" /&gt;
&lt;x-ws::chip label="Medium" color="primary" size="md" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec icône</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-2">
        <x-ws::chip label="Accueil" color="primary" icon="home" />
        <x-ws::chip label="Utilisateur" color="secondary" icon="user" />
        <x-ws::chip label="Paramètres" color="neutral" icon="cog-6-tooth" />
        <x-ws::chip label="Notification" color="warning" icon="bell" />
        <x-ws::chip label="Validé" color="success" icon="check-circle" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::chip label="Accueil" color="primary" icon="home" /&gt;
&lt;x-ws::chip label="Validé" color="success" icon="check-circle" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Dismissible</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Le chip peut être fermé via le bouton <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">×</code>. Utilisez Alpine.js pour gérer la visibilité.</p>
<x-docs::demo x-data="{ tags: ['Vue.js', 'Laravel', 'Tailwind', 'Livewire'] }">
    <div class="flex flex-wrap gap-2">
        <template x-for="(tag, index) in tags" :key="tag">
            <x-ws::chip :dismissible="true" color="primary" x-bind:label="tag" @dismiss="tags.splice(index, 1)" />
        </template>
        <button x-show="tags.length === 0" @click="tags = ['Vue.js', 'Laravel', 'Tailwind', 'Livewire']" class="text-xs text-blue-500 underline">Réinitialiser</button>
    </div>
</x-docs::demo>
<x-docs::code>&lt;div x-data="{ visible: true }"&gt;
    &lt;x-ws::chip
        label="Dismissible"
        color="primary"
        :dismissible="true"
        x-show="visible"
        &#64;dismiss="visible = false"
    /&gt;
&lt;/div&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.avatar') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Avatar</a>
    <a href="{{ route('docs.kbd') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Kbd →</a>
</div>

</x-layouts.docs>
