<x-layouts.docs title="Alert">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Données</span><span>/</span><span>Alert</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Alert</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Messages contextuels pour informer, avertir ou signaler des erreurs à l'utilisateur.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-3">
        <x-ws::alert color="info">Une mise à jour est disponible pour votre application.</x-ws::alert>
        <x-ws::alert color="success">Votre profil a été sauvegardé avec succès.</x-ws::alert>
        <x-ws::alert color="warning">Votre abonnement expire dans 3 jours.</x-ws::alert>
        <x-ws::alert color="danger">Une erreur est survenue lors du traitement.</x-ws::alert>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::alert color="info"&gt;Message d'information.&lt;/x-ws::alert&gt;
&lt;x-ws::alert color="success"&gt;Opération réussie.&lt;/x-ws::alert&gt;
&lt;x-ws::alert color="warning"&gt;Attention requise.&lt;/x-ws::alert&gt;
&lt;x-ws::alert color="danger"&gt;Erreur survenue.&lt;/x-ws::alert&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['variant',    'string', 'soft',    'soft | solid | outline'],
    ['color',      'string', 'info',    'info | success | warning | danger | neutral'],
    ['title',      'string', 'null',    'Titre en gras au-dessus du message'],
    ['icon',       'string', '',        'Icône Heroicons personnalisée'],
    ['dismissible','bool',   'false',   'Affiche un bouton de fermeture'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variantes</h2>
<x-docs::demo>
    <div class="space-y-2">
        <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide">Soft (défaut)</p>
        <x-ws::alert variant="soft" color="primary">Variante soft avec fond léger.</x-ws::alert>
        <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mt-3">Solid</p>
        <x-ws::alert variant="solid" color="primary">Variante solid avec fond plein.</x-ws::alert>
        <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mt-3">Outline</p>
        <x-ws::alert variant="outline" color="primary">Variante outline avec bordure colorée.</x-ws::alert>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::alert variant="soft" color="primary"&gt;...&lt;/x-ws::alert&gt;
&lt;x-ws::alert variant="solid" color="primary"&gt;...&lt;/x-ws::alert&gt;
&lt;x-ws::alert variant="outline" color="primary"&gt;...&lt;/x-ws::alert&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec titre</h2>
<x-docs::demo>
    <div class="space-y-3">
        <x-ws::alert color="success" title="Paiement confirmé">
            Votre commande a été traitée avec succès. Un email de confirmation vous a été envoyé.
        </x-ws::alert>
        <x-ws::alert color="danger" title="Erreur de validation">
            Les informations saisies sont incorrectes. Veuillez vérifier les champs en rouge.
        </x-ws::alert>
        <x-ws::alert color="warning" title="Action requise">
            Vous devez vérifier votre adresse email avant de pouvoir publier du contenu.
        </x-ws::alert>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::alert color="success" title="Paiement confirmé"&gt;
    Votre commande a été traitée avec succès.
&lt;/x-ws::alert&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Dismissible</h2>
<x-docs::demo x-data="{ shown: true }">
    <div>
        <x-ws::alert
            color="info"
            title="Nouveau en Wirestack UI 2.0"
            :dismissible="true"
            x-show="shown"
            @dismiss="shown = false"
        >
            Découvrez les nouveaux composants DataTable, CommandPalette et Drawer dans cette version.
        </x-ws::alert>
        <button x-show="!shown" @click="shown = true" class="text-xs text-blue-500 underline">Réafficher</button>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::alert
    color="info"
    title="Nouveau disponible"
    :dismissible="true"
    x-show="shown"
    &#64;dismiss="shown = false"
&gt;
    Découvrez les nouveaux composants.
&lt;/x-ws::alert&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Toutes les couleurs</h2>
<x-docs::demo>
    <div class="space-y-2">
        @foreach(['info','success','warning','danger','neutral'] as $color)
            <x-ws::alert :color="$color">Alerte de type {{ $color }}</x-ws::alert>
        @endforeach
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.code') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Code</a>
    <a href="{{ route('docs.empty-state') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">EmptyState →</a>
</div>

</x-layouts.docs>
