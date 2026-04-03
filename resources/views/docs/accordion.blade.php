<x-layouts.docs title="Accordion">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Superpositions</span><span>/</span><span>Accordion</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Accordion</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Panneau repliable pour afficher du contenu progressivement. Supporte mode simple et multiple.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::accordion>
        <x-ws::accordion-item title="Qu'est-ce que Wirestack UI ?" :open="true">
            Wirestack UI est une bibliothèque de composants Laravel/Livewire construite avec Tailwind CSS.
            Elle fournit des composants prêts à l'emploi pour accélérer le développement d'interfaces.
        </x-ws::accordion-item>
        <x-ws::accordion-item title="Comment installer Wirestack UI ?">
            Exécutez <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">composer require wirestack/ui</code>
            puis <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">php artisan wirestack:install</code>.
        </x-ws::accordion-item>
        <x-ws::accordion-item title="Wirestack UI est-il compatible avec Livewire 4 ?">
            Oui, Wirestack UI est entièrement compatible avec Livewire 4 et supporte les composants
            Blade et Volt. Les composants interactifs utilisent Alpine.js.
        </x-ws::accordion-item>
    </x-ws::accordion>
</x-docs::demo>

<x-docs::code>&lt;x-ws::accordion&gt;
    &lt;x-ws::accordion-item title="Question 1" :open="true"&gt;
        Réponse à la première question...
    &lt;/x-ws::accordion-item&gt;
    &lt;x-ws::accordion-item title="Question 2"&gt;
        Réponse à la deuxième question...
    &lt;/x-ws::accordion-item&gt;
&lt;/x-ws::accordion&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Accordion</h2>
<x-docs::props :rows="[
    ['multiple', 'bool',   'false',    'Permet d\'ouvrir plusieurs items simultanément'],
    ['variant',  'string', 'bordered', 'bordered | ghost'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — AccordionItem</h2>
<x-docs::props :rows="[
    ['title', 'string', '',      'Titre de l\'item (toujours visible)'],
    ['open',  'bool',   'false', 'Ouvrir l\'item par défaut'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Mode multiple</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Avec <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">:multiple="true"</code>, plusieurs items peuvent être ouverts en même temps.</p>
<x-docs::demo>
    <x-ws::accordion :multiple="true">
        <x-ws::accordion-item title="Section A — Général" :open="true">
            Paramètres généraux de l'application : nom, langue, fuseau horaire.
        </x-ws::accordion-item>
        <x-ws::accordion-item title="Section B — Sécurité" :open="true">
            Authentification à deux facteurs, gestion des sessions et historique de connexions.
        </x-ws::accordion-item>
        <x-ws::accordion-item title="Section C — Notifications">
            Préférences d'envoi d'emails, SMS et notifications push.
        </x-ws::accordion-item>
    </x-ws::accordion>
</x-docs::demo>
<x-docs::code>&lt;x-ws::accordion :multiple="true"&gt;
    &lt;x-ws::accordion-item title="Section A" :open="true"&gt;...&lt;/x-ws::accordion-item&gt;
    &lt;x-ws::accordion-item title="Section B" :open="true"&gt;...&lt;/x-ws::accordion-item&gt;
    &lt;x-ws::accordion-item title="Section C"&gt;...&lt;/x-ws::accordion-item&gt;
&lt;/x-ws::accordion&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variante Ghost</h2>
<x-docs::demo>
    <x-ws::accordion variant="ghost">
        <x-ws::accordion-item title="Sans bordures visibles">
            La variante ghost supprime les bordures pour une apparence plus légère.
        </x-ws::accordion-item>
        <x-ws::accordion-item title="Style minimaliste">
            Idéal pour les sections de documentation ou les FAQs dans des pages de contenu.
        </x-ws::accordion-item>
    </x-ws::accordion>
</x-docs::demo>
<x-docs::code>&lt;x-ws::accordion variant="ghost"&gt;
    &lt;x-ws::accordion-item title="Item sans bordure"&gt;
        Contenu...
    &lt;/x-ws::accordion-item&gt;
&lt;/x-ws::accordion&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">FAQ exemple</h2>
<x-docs::demo>
    <x-ws::accordion>
        <x-ws::accordion-item title="Le paiement est-il sécurisé ?">
            Oui, tous les paiements sont traités par Stripe avec un chiffrement SSL 256 bits.
            Vos données bancaires ne sont jamais stockées sur nos serveurs.
        </x-ws::accordion-item>
        <x-ws::accordion-item title="Puis-je annuler mon abonnement ?">
            Oui, vous pouvez annuler à tout moment depuis votre espace client.
            L'annulation prend effet à la fin de la période de facturation en cours.
        </x-ws::accordion-item>
        <x-ws::accordion-item title="Y a-t-il une période d'essai ?">
            Nous offrons une période d'essai gratuite de 14 jours sans carte bancaire requise.
        </x-ws::accordion-item>
        <x-ws::accordion-item title="Comment contacter le support ?">
            Notre équipe est disponible 24h/24 via le chat en direct ou par email à support&#64;wirestack.dev.
        </x-ws::accordion-item>
    </x-ws::accordion>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.empty-state') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← EmptyState</a>
    <a href="{{ route('docs.collapsible') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Collapsible →</a>
</div>

</x-layouts.docs>
