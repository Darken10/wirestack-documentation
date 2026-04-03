<x-layouts.docs title="Steps">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Navigation</span><span>/</span><span>Steps</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Steps</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Indicateur de progression pour les formulaires multi-étapes ou les processus. Horizontal et vertical.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu — Horizontal">
    <x-ws::steps>
        <x-ws::step label="Compte" description="Informations de connexion" status="completed" />
        <x-ws::step label="Profil" description="Vos informations personnelles" status="completed" />
        <x-ws::step label="Paiement" description="Mode de paiement" status="current" />
        <x-ws::step label="Confirmation" description="Résumé de la commande" status="pending" />
    </x-ws::steps>
</x-docs::demo>

<x-docs::code>&lt;x-ws::steps&gt;
    &lt;x-ws::step label="Compte" status="completed" /&gt;
    &lt;x-ws::step label="Profil" status="completed" /&gt;
    &lt;x-ws::step label="Paiement" status="current" /&gt;
    &lt;x-ws::step label="Confirmation" status="pending" /&gt;
&lt;/x-ws::steps&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Step</h2>
<x-docs::props :rows="[
    ['label',       'string', '',        'Titre de l\'étape'],
    ['description', 'string', 'null',    'Sous-titre ou description courte'],
    ['status',      'string', 'pending', 'pending | current | completed | error'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tous les statuts</h2>
<x-docs::demo>
    <x-ws::steps>
        <x-ws::step label="Complété" description="Étape terminée avec succès" status="completed" />
        <x-ws::step label="En cours" description="Étape actuellement active" status="current" />
        <x-ws::step label="Erreur" description="Quelque chose a mal tourné" status="error" />
        <x-ws::step label="En attente" description="Pas encore commencée" status="pending" />
    </x-ws::steps>
</x-docs::demo>
<x-docs::code>&lt;x-ws::step label="Complété" status="completed" /&gt;
&lt;x-ws::step label="En cours" status="current" /&gt;
&lt;x-ws::step label="Erreur" status="error" /&gt;
&lt;x-ws::step label="En attente" status="pending" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Processus de commande</h2>
<x-docs::demo>
    <x-ws::steps>
        <x-ws::step label="Panier" description="2 articles" status="completed" />
        <x-ws::step label="Livraison" description="Adresse confirmée" status="completed" />
        <x-ws::step label="Paiement" description="Carte bancaire" status="current" />
        <x-ws::step label="Révision" description="Vérifiez votre commande" status="pending" />
        <x-ws::step label="Confirmation" description="Email de confirmation" status="pending" />
    </x-ws::steps>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Orientation verticale</h2>
<x-docs::demo>
    <div class="max-w-xs">
        <x-ws::steps orientation="vertical">
            <x-ws::step label="Inscription" description="Créez votre compte Wirestack" status="completed" />
            <x-ws::step label="Configuration" description="Paramétrez votre workspace" status="completed" />
            <x-ws::step label="Intégration" description="Connectez vos outils" status="current" />
            <x-ws::step label="Déploiement" description="Mettez en ligne votre projet" status="pending" />
        </x-ws::steps>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::steps orientation="vertical"&gt;
    &lt;x-ws::step label="Inscription" status="completed" /&gt;
    &lt;x-ws::step label="Configuration" status="completed" /&gt;
    &lt;x-ws::step label="Intégration" status="current" /&gt;
    &lt;x-ws::step label="Déploiement" status="pending" /&gt;
&lt;/x-ws::steps&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec étape en erreur</h2>
<x-docs::demo>
    <x-ws::steps>
        <x-ws::step label="Données" status="completed" />
        <x-ws::step label="Validation" description="Échec de validation" status="error" />
        <x-ws::step label="Traitement" status="pending" />
        <x-ws::step label="Terminé" status="pending" />
    </x-ws::steps>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.pagination') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Pagination</a>
    <a href="{{ route('docs.table') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Table →</a>
</div>

</x-layouts.docs>
