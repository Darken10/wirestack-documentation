<x-layouts.docs title="Checkbox">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>Checkbox</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Checkbox</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Case à cocher avec label, hint et gestion des erreurs. Supporte plusieurs couleurs.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-2">
        <x-ws::checkbox label="J'accepte les conditions d'utilisation" name="terms" />
        <x-ws::checkbox label="S'abonner à la newsletter" name="newsletter" :checked="true" />
        <x-ws::checkbox label="Recevoir des notifications" name="notifs" hint="Vous pouvez modifier cela à tout moment." />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::checkbox label="J'accepte les conditions" name="terms" /&gt;
&lt;x-ws::checkbox label="Newsletter" name="newsletter" :checked="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['label',    'string', '',        'Texte affiché à côté de la case'],
    ['name',     'string', '',        'Attribut name du champ HTML'],
    ['hint',     'string', 'null',    'Texte d\'aide affiché sous le label'],
    ['error',    'string', 'null',    'Message d\'erreur'],
    ['disabled', 'bool',   'false',   'Désactive la case'],
    ['required', 'bool',   'false',   'Marque comme obligatoire'],
    ['checked',  'bool',   'false',   'État coché par défaut'],
    ['color',    'string', 'primary', 'primary | secondary | success | danger | warning'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <div class="space-y-2">
        @foreach(['primary','secondary','success','danger','warning'] as $color)
            <x-ws::checkbox :label="ucfirst($color)" :color="$color" :checked="true" />
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::checkbox label="Primary" color="primary" :checked="true" /&gt;
&lt;x-ws::checkbox label="Success" color="success" :checked="true" /&gt;
&lt;x-ws::checkbox label="Danger" color="danger" :checked="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec hint</h2>
<x-docs::demo>
    <div class="space-y-3">
        <x-ws::checkbox
            label="Sauvegarder mes informations"
            name="save_info"
            hint="Vos données seront stockées de manière sécurisée."
        />
        <x-ws::checkbox
            label="Activer les notifications push"
            name="push_notifs"
            hint="Recevez des alertes en temps réel sur votre appareil."
        />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::checkbox
    label="Sauvegarder mes informations"
    hint="Vos données seront sécurisées."
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">État d'erreur</h2>
<x-docs::demo>
    <x-ws::checkbox
        label="J'accepte les conditions générales d'utilisation"
        name="terms"
        error="Vous devez accepter les conditions pour continuer."
    />
</x-docs::demo>
<x-docs::code>&lt;x-ws::checkbox
    label="J'accepte les CGU"
    error="Vous devez accepter pour continuer."
/&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Désactivé</h2>
<x-docs::demo>
    <div class="space-y-2">
        <x-ws::checkbox label="Option désactivée (non cochée)" :disabled="true" />
        <x-ws::checkbox label="Option désactivée (cochée)" :disabled="true" :checked="true" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::checkbox label="Désactivé" :disabled="true" /&gt;
&lt;x-ws::checkbox label="Désactivé coché" :disabled="true" :checked="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Liste de permissions</h2>
<x-docs::demo>
    <div class="space-y-2">
        <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Permissions de l'utilisateur</p>
        <x-ws::checkbox label="Lire les articles" name="perm_read" :checked="true" color="success" />
        <x-ws::checkbox label="Créer des articles" name="perm_create" :checked="true" color="success" />
        <x-ws::checkbox label="Modifier les articles" name="perm_edit" color="primary" />
        <x-ws::checkbox label="Supprimer des articles" name="perm_delete" color="danger" />
        <x-ws::checkbox label="Gérer les utilisateurs" name="perm_users" :disabled="true" />
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.select') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Select</a>
    <a href="{{ route('docs.radio') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Radio →</a>
</div>

</x-layouts.docs>
