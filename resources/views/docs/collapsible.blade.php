<x-layouts.docs title="Collapsible">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Superpositions</span><span>/</span><span>Collapsible</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Collapsible</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Section repliable simple avec un déclencheur et du contenu qui s'affiche ou se cache au clic.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::collapsible title="Paramètres avancés" icon="cog-6-tooth">
        <div class="space-y-3 pt-2">
            <x-ws::toggle label="Mode debug" hint="Affiche les erreurs détaillées" />
            <x-ws::toggle label="Cache activé" :checked="true" hint="Mise en cache des requêtes" />
            <x-ws::toggle label="Compression GZIP" :checked="true" />
        </div>
    </x-ws::collapsible>
</x-docs::demo>

<x-docs::code>&lt;x-ws::collapsible title="Paramètres avancés" icon="cog-6-tooth"&gt;
    Contenu repliable...
&lt;/x-ws::collapsible&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['title', 'string', '',      'Titre du déclencheur'],
    ['open',  'bool',   'false', 'Ouvert par défaut'],
    ['icon',  'string', '',      'Icône Heroicons dans le déclencheur'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Ouvert par défaut</h2>
<x-docs::demo>
    <x-ws::collapsible title="Filtres de recherche" :open="true" icon="funnel">
        <div class="space-y-3 pt-2">
            <x-ws::input label="Nom" placeholder="Filtrer par nom..." />
            <x-ws::select label="Statut" placeholder="Tous les statuts">
                <option>Actif</option>
                <option>Inactif</option>
                <option>En attente</option>
            </x-ws::select>
            <div class="flex gap-2 pt-1">
                <x-ws::button color="primary" size="sm">Appliquer</x-ws::button>
                <x-ws::button color="neutral" variant="outline" size="sm">Réinitialiser</x-ws::button>
            </div>
        </div>
    </x-ws::collapsible>
</x-docs::demo>
<x-docs::code>&lt;x-ws::collapsible title="Filtres" :open="true" icon="funnel"&gt;
    &lt;x-ws::input label="Nom" placeholder="Filtrer..." /&gt;
    &lt;x-ws::button color="primary"&gt;Appliquer&lt;/x-ws::button&gt;
&lt;/x-ws::collapsible&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Informations supplémentaires</h2>
<x-docs::demo>
    <div class="space-y-2">
        <x-ws::collapsible title="À propos de ce composant">
            <p class="text-sm text-zinc-600 dark:text-zinc-400 pt-2">
                Le composant Collapsible utilise Alpine.js pour gérer l'état d'ouverture/fermeture.
                Il est idéal pour masquer du contenu secondaire ou des options avancées afin de ne pas
                surcharger l'interface utilisateur principale.
            </p>
        </x-ws::collapsible>
        <x-ws::collapsible title="Informations de livraison">
            <div class="text-sm text-zinc-600 dark:text-zinc-400 pt-2 space-y-1">
                <p><strong>Adresse :</strong> 123 rue de la Paix, Paris 75001</p>
                <p><strong>Transporteur :</strong> DHL Express</p>
                <p><strong>Délai estimé :</strong> 2-3 jours ouvrés</p>
            </div>
        </x-ws::collapsible>
        <x-ws::collapsible title="Notes et commentaires">
            <x-ws::textarea placeholder="Ajoutez une note..." :rows="3" class="mt-2" />
        </x-ws::collapsible>
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.accordion') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Accordion</a>
    <a href="{{ route('docs.dropdown') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Dropdown →</a>
</div>

</x-layouts.docs>
