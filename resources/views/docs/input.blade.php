<x-layouts.docs title="Input">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>Input</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Input</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Champ de saisie polyvalent avec support des labels, hints, erreurs, icônes, préfixes/suffixes et états variés.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="max-w-sm space-y-3">
        <x-ws::input label="Nom complet" placeholder="Jean Dupont" />
        <x-ws::input label="Email" type="email" placeholder="vous@exemple.com" icon="envelope" />
        <x-ws::input label="Recherche" placeholder="Rechercher..." icon="magnifying-glass" clearable />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::input label="Nom complet" placeholder="Jean Dupont" /&gt;
&lt;x-ws::input label="Email" type="email" icon="envelope" /&gt;
&lt;x-ws::input label="Recherche" icon="magnifying-glass" :clearable="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['type',          'string', 'text',     'Type HTML : text | email | password | number | tel | url | search'],
    ['variant',       'string', 'bordered', 'bordered | filled | ghost | underline'],
    ['size',          'string', 'md',       'sm | md | lg'],
    ['label',         'string', 'null',     'Label affiché au-dessus du champ'],
    ['hint',          'string', 'null',     'Texte d\'aide affiché sous le champ'],
    ['error',         'string', 'null',     'Message d\'erreur (remplace hint)'],
    ['icon',          'string', '',         'Icône Heroicons en début de champ'],
    ['iconTrailing',  'string', '',         'Icône Heroicons en fin de champ'],
    ['prefix',        'string', '',         'Texte ou symbole fixé en début de champ'],
    ['suffix',        'string', '',         'Texte ou symbole fixé en fin de champ'],
    ['loading',       'bool',   'false',    'Affiche un spinner de chargement'],
    ['clearable',     'bool',   'false',    'Affiche un bouton pour vider le champ'],
    ['disabled',      'bool',   'false',    'Désactive le champ'],
    ['readonly',      'bool',   'false',    'Champ en lecture seule'],
    ['required',      'bool',   'false',    'Marque le champ comme obligatoire'],
    ['placeholder',   'string', 'null',     'Texte d\'espace réservé'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variantes</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::input variant="bordered" label="Bordered" placeholder="Variante par défaut" />
        <x-ws::input variant="filled" label="Filled" placeholder="Fond coloré" />
        <x-ws::input variant="ghost" label="Ghost" placeholder="Transparente" />
        <x-ws::input variant="underline" label="Underline" placeholder="Seulement la bordure inférieure" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::input variant="bordered" label="Bordered" /&gt;
&lt;x-ws::input variant="filled" label="Filled" /&gt;
&lt;x-ws::input variant="ghost" label="Ghost" /&gt;
&lt;x-ws::input variant="underline" label="Underline" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec icônes</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::input label="Email" type="email" placeholder="vous@exemple.com" icon="envelope" />
        <x-ws::input label="Recherche" placeholder="Rechercher..." icon="magnifying-glass" />
        <x-ws::input label="Mot de passe" type="password" placeholder="••••••••" icon="lock-closed" iconTrailing="eye" />
        <x-ws::input label="Utilisateur" placeholder="@username" iconTrailing="user" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::input label="Email" icon="envelope" type="email" /&gt;
&lt;x-ws::input label="Mot de passe" icon="lock-closed" iconTrailing="eye" type="password" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Préfixe et suffixe</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::input label="Téléphone" placeholder="6 12 34 56 78" prefix="+33" />
        <x-ws::input label="Site web" placeholder="exemple" suffix=".com" />
        <x-ws::input label="Prix" placeholder="0.00" prefix="€" suffix="HT" />
        <x-ws::input label="Nom de domaine" placeholder="votre-site" prefix="https://" suffix=".fr" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::input label="Téléphone" prefix="+33" placeholder="6 12 34 56 78" /&gt;
&lt;x-ws::input label="Site web" suffix=".com" placeholder="exemple" /&gt;
&lt;x-ws::input label="Prix" prefix="€" suffix="HT" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">États</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::input label="Avec hint" placeholder="Entrez votre pseudo" hint="Votre pseudo public visible par tous." />
        <x-ws::input label="Avec erreur" placeholder="Entrez votre email" error="L'adresse email est invalide." value="pas-un-email" />
        <x-ws::input label="Désactivé" placeholder="Non modifiable" :disabled="true" value="Valeur désactivée" />
        <x-ws::input label="Lecture seule" :readonly="true" value="Valeur en lecture seule" />
        <x-ws::input label="Requis" placeholder="Obligatoire" :required="true" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::input label="Avec hint" hint="Texte d'aide visible sous le champ." /&gt;
&lt;x-ws::input label="Avec erreur" error="Ce champ est invalide." /&gt;
&lt;x-ws::input label="Désactivé" :disabled="true" /&gt;
&lt;x-ws::input label="Lecture seule" :readonly="true" /&gt;
&lt;x-ws::input label="Requis" :required="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::input size="sm" placeholder="Taille sm" label="Small" />
        <x-ws::input size="md" placeholder="Taille md (défaut)" label="Medium" />
        <x-ws::input size="lg" placeholder="Taille lg" label="Large" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::input size="sm" label="Small" /&gt;
&lt;x-ws::input size="md" label="Medium" /&gt;
&lt;x-ws::input size="lg" label="Large" /&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.copy-button') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← CopyButton</a>
    <a href="{{ route('docs.textarea') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Textarea →</a>
</div>

</x-layouts.docs>
