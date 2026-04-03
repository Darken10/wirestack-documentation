<x-layouts.docs title="Timeline">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Données</span><span>/</span><span>Timeline</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Timeline</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Chronologie d'événements avec icônes, couleurs et dates. Idéal pour les historiques et les logs d'activité.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::timeline>
        <x-ws::timeline-item
            title="Produit lancé"
            description="Wirestack UI v1.0 est officiellement disponible en production."
            date="15 janvier 2025"
            icon="rocket-launch"
            color="primary"
        />
        <x-ws::timeline-item
            title="Nouvelle fonctionnalité ajoutée"
            description="Ajout du composant DataTable avec recherche et pagination intégrées."
            date="3 février 2025"
            icon="plus-circle"
            color="success"
        />
        <x-ws::timeline-item
            title="Bug corrigé"
            description="Correction d'un problème d'affichage sur mobile avec le composant Modal."
            date="12 février 2025"
            icon="wrench-screwdriver"
            color="warning"
        />
        <x-ws::timeline-item
            title="Mise à jour majeure"
            description="Version 2.0 publiée avec support Livewire 4 et Tailwind CSS 4."
            date="1er mars 2025"
            icon="arrow-up-circle"
            color="info"
        />
    </x-ws::timeline>
</x-docs::demo>

<x-docs::code>&lt;x-ws::timeline&gt;
    &lt;x-ws::timeline-item
        title="Produit lancé"
        description="Disponible en production."
        date="15 janvier 2025"
        icon="rocket-launch"
        color="primary"
    /&gt;
    &lt;x-ws::timeline-item
        title="Bug corrigé"
        description="Correction d'un problème mobile."
        date="12 février 2025"
        icon="wrench-screwdriver"
        color="warning"
    /&gt;
&lt;/x-ws::timeline&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — TimelineItem</h2>
<x-docs::props :rows="[
    ['title',       'string', '',        'Titre de l\'événement'],
    ['description', 'string', 'null',    'Description détaillée'],
    ['date',        'string', 'null',    'Date ou heure de l\'événement'],
    ['icon',        'string', '',        'Icône Heroicons'],
    ['color',       'string', 'primary', 'primary | secondary | success | danger | warning | info | neutral'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Historique d'activité utilisateur</h2>
<x-docs::demo>
    <x-ws::timeline>
        <x-ws::timeline-item
            title="Connexion"
            description="Connexion depuis Paris, France (Chrome, macOS)"
            date="Il y a 2 min"
            icon="arrow-right-on-rectangle"
            color="success"
        />
        <x-ws::timeline-item
            title="Profil modifié"
            description="Modification de l'adresse email et de la photo de profil"
            date="Il y a 1h"
            icon="pencil"
            color="primary"
        />
        <x-ws::timeline-item
            title="Tentative de connexion échouée"
            description="3 tentatives échouées depuis une adresse IP inconnue"
            date="Hier, 23h42"
            icon="exclamation-triangle"
            color="danger"
        />
        <x-ws::timeline-item
            title="Abonnement Pro activé"
            description="Passage à l'abonnement Pro mensuel"
            date="12 mars 2025"
            icon="star"
            color="warning"
        />
    </x-ws::timeline>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <x-ws::timeline>
        @foreach([
            ['primary',   'rocket-launch', 'Événement primaire'],
            ['secondary', 'bookmark',      'Événement secondaire'],
            ['success',   'check-circle',  'Succès'],
            ['warning',   'exclamation-triangle', 'Avertissement'],
            ['danger',    'x-circle',      'Erreur'],
            ['info',      'information-circle', 'Information'],
            ['neutral',   'minus-circle',  'Neutre'],
        ] as [$color, $icon, $label])
            <x-ws::timeline-item :title="$label" :icon="$icon" :color="$color" />
        @endforeach
    </x-ws::timeline>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.stat') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Stat</a>
    <a href="{{ route('docs.progress') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Progress →</a>
</div>

</x-layouts.docs>
