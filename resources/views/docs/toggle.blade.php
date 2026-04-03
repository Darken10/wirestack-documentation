<x-layouts.docs title="Toggle">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>Toggle</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Toggle</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Interrupteur (switch) pour activer ou désactiver une option. Alternative visuelle à la checkbox.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-3">
        <x-ws::toggle label="Activer les notifications" name="notifications" :checked="true" />
        <x-ws::toggle label="Mode sombre" name="dark_mode" />
        <x-ws::toggle label="Synchronisation automatique" name="sync" :checked="true" hint="Synchronisation toutes les 5 minutes." />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::toggle label="Activer les notifications" name="notifications" /&gt;
&lt;x-ws::toggle label="Mode sombre" :checked="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['label',    'string', '',        'Texte affiché à côté du toggle'],
    ['name',     'string', '',        'Attribut name du champ'],
    ['hint',     'string', 'null',    'Texte d\'aide affiché sous le label'],
    ['color',    'string', 'primary', 'primary | secondary | success | danger | warning'],
    ['disabled', 'bool',   'false',   'Désactive le toggle'],
    ['checked',  'bool',   'false',   'État activé par défaut'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <div class="space-y-2">
        @foreach(['primary','secondary','success','danger','warning'] as $color)
            <x-ws::toggle :label="ucfirst($color)" :color="$color" :checked="true" />
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::toggle label="Primary" color="primary" :checked="true" /&gt;
&lt;x-ws::toggle label="Success" color="success" :checked="true" /&gt;
&lt;x-ws::toggle label="Danger" color="danger" :checked="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec hint</h2>
<x-docs::demo>
    <div class="space-y-3">
        <x-ws::toggle
            label="Notifications par email"
            name="email_notifs"
            hint="Recevez un résumé quotidien de votre activité."
            :checked="true"
        />
        <x-ws::toggle
            label="Authentification à deux facteurs"
            name="2fa"
            hint="Sécurisez votre compte avec un code supplémentaire."
        />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::toggle
    label="Notifications par email"
    hint="Recevez un résumé quotidien."
    :checked="true"
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Désactivé</h2>
<x-docs::demo>
    <div class="space-y-2">
        <x-ws::toggle label="Option désactivée (off)" :disabled="true" />
        <x-ws::toggle label="Option désactivée (on)" :disabled="true" :checked="true" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::toggle label="Désactivé" :disabled="true" /&gt;
&lt;x-ws::toggle label="Désactivé activé" :disabled="true" :checked="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Paramètres utilisateur</h2>
<x-docs::demo>
    <div class="space-y-4 max-w-sm">
        <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Préférences de notification</p>
        <x-ws::toggle label="Nouvelles commandes" name="notif_orders" :checked="true" color="primary" />
        <x-ws::toggle label="Commentaires" name="notif_comments" :checked="true" color="primary" />
        <x-ws::toggle label="Mentions" name="notif_mentions" color="primary" />
        <x-ws::divider />
        <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Confidentialité</p>
        <x-ws::toggle label="Profil public" name="public_profile" :checked="true" color="success" />
        <x-ws::toggle label="Afficher l'activité" name="show_activity" color="success" />
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.radio') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Radio</a>
    <a href="{{ route('docs.range') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Range →</a>
</div>

</x-layouts.docs>
