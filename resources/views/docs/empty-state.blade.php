<x-layouts.docs title="EmptyState">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Données</span><span>/</span><span>EmptyState</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">EmptyState</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Placeholder affiché lorsqu'une liste ou une zone de contenu est vide. Guide l'utilisateur vers une action.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::empty-state
        icon="inbox"
        title="Aucun message"
        description="Vous n'avez pas encore reçu de message. Commencez une conversation !"
    >
        <x-slot name="action">
            <x-ws::button color="primary" icon="plus">Nouveau message</x-ws::button>
        </x-slot>
    </x-ws::empty-state>
</x-docs::demo>

<x-docs::code>&lt;x-ws::empty-state
    icon="inbox"
    title="Aucun message"
    description="Vous n'avez pas encore reçu de message."
&gt;
    &lt;x-slot name="action"&gt;
        &lt;x-ws::button color="primary"&gt;Nouveau message&lt;/x-ws::button&gt;
    &lt;/x-slot&gt;
&lt;/x-ws::empty-state&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['title',       'string', '',     'Titre principal'],
    ['description', 'string', 'null', 'Sous-titre ou message d\'aide'],
    ['icon',        'string', '',     'Icône Heroicons'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Sans action</h2>
<x-docs::demo>
    <x-ws::empty-state
        icon="document-text"
        title="Aucun rapport disponible"
        description="Les rapports apparaîtront ici une fois que des données seront collectées."
    />
</x-docs::demo>
<x-docs::code>&lt;x-ws::empty-state
    icon="document-text"
    title="Aucun rapport disponible"
    description="Les rapports apparaîtront ici automatiquement."
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec action principale</h2>
<x-docs::demo>
    <x-ws::empty-state
        icon="users"
        title="Aucun utilisateur"
        description="Commencez par inviter des membres à rejoindre votre équipe."
    >
        <x-slot name="action">
            <x-ws::button color="primary" icon="user-plus">Inviter des membres</x-ws::button>
        </x-slot>
    </x-ws::empty-state>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Résultats de recherche vides</h2>
<x-docs::demo>
    <x-ws::empty-state
        icon="magnifying-glass"
        title="Aucun résultat trouvé"
        description="Aucun élément ne correspond à votre recherche « wireframe ». Essayez d'autres mots-clés."
    >
        <x-slot name="action">
            <x-ws::button color="neutral" variant="outline">Effacer la recherche</x-ws::button>
        </x-slot>
    </x-ws::empty-state>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Dans une table vide</h2>
<x-docs::demo>
    <x-ws::card>
        <x-ws::card-header title="Commandes récentes">
            <x-slot name="actions">
                <x-ws::button size="sm" color="primary" icon="plus">Nouvelle commande</x-ws::button>
            </x-slot>
        </x-ws::card-header>
        <x-ws::card-body>
            <x-ws::empty-state
                icon="shopping-bag"
                title="Aucune commande"
                description="Vos commandes apparaîtront ici."
            />
        </x-ws::card-body>
    </x-ws::card>
</x-docs::demo>
<x-docs::code>&lt;x-ws::card&gt;
    &lt;x-ws::card-header title="Commandes" /&gt;
    &lt;x-ws::card-body&gt;
        &lt;x-ws::empty-state
            icon="shopping-bag"
            title="Aucune commande"
        /&gt;
    &lt;/x-ws::card-body&gt;
&lt;/x-ws::card&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.alert') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Alert</a>
    <a href="{{ route('docs.accordion') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Accordion →</a>
</div>

</x-layouts.docs>
