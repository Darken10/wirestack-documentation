<x-layouts.docs title="FormGroup">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>FormGroup</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">FormGroup</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Enveloppe un champ de formulaire avec son label, hint et message d'erreur de manière cohérente.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="max-w-sm space-y-4">
        <x-ws::form-group label="Nom d'utilisateur" hint="Choisissez un nom unique visible publiquement.">
            <x-ws::input placeholder="jean_dupont" />
        </x-ws::form-group>
        <x-ws::form-group label="Email" :required="true">
            <x-ws::input type="email" placeholder="vous@exemple.com" icon="envelope" />
        </x-ws::form-group>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::form-group label="Nom d'utilisateur" hint="Choisissez un nom unique."&gt;
    &lt;x-ws::input placeholder="jean_dupont" /&gt;
&lt;/x-ws::form-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['label',    'string', '',      'Label affiché au-dessus du champ'],
    ['hint',     'string', 'null',  'Texte d\'aide affiché sous le champ'],
    ['error',    'string', 'null',  'Message d\'erreur'],
    ['required', 'bool',   'false', 'Affiche un astérisque sur le label'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec différents champs</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-4">
        <x-ws::form-group label="Pays" hint="Sélectionnez votre pays de résidence.">
            <x-ws::select placeholder="Choisir un pays...">
                <option>France</option>
                <option>Canada</option>
                <option>Belgique</option>
            </x-ws::select>
        </x-ws::form-group>

        <x-ws::form-group label="Bio" hint="Maximum 160 caractères.">
            <x-ws::textarea placeholder="Parlez de vous..." :rows="3" />
        </x-ws::form-group>

        <x-ws::form-group label="Notifications">
            <x-ws::toggle label="Recevoir des emails" />
        </x-ws::form-group>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::form-group label="Pays" hint="Résidence principale."&gt;
    &lt;x-ws::select placeholder="Choisir..."&gt;
        &lt;option&gt;France&lt;/option&gt;
    &lt;/x-ws::select&gt;
&lt;/x-ws::form-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">État d'erreur</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-4">
        <x-ws::form-group label="Email" error="L'adresse email est déjà utilisée." :required="true">
            <x-ws::input type="email" value="jean@exemple.com" />
        </x-ws::form-group>

        <x-ws::form-group label="Mot de passe" error="Le mot de passe doit contenir au moins 8 caractères." :required="true">
            <x-ws::input type="password" value="123" />
        </x-ws::form-group>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::form-group label="Email" error="Email déjà utilisé." :required="true"&gt;
    &lt;x-ws::input type="email" value="jean@exemple.com" /&gt;
&lt;/x-ws::form-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Champ requis</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-4">
        <x-ws::form-group label="Prénom" :required="true">
            <x-ws::input placeholder="Jean" />
        </x-ws::form-group>
        <x-ws::form-group label="Nom de famille" :required="true">
            <x-ws::input placeholder="Dupont" />
        </x-ws::form-group>
        <x-ws::form-group label="Téléphone">
            <x-ws::input type="tel" placeholder="Optionnel" />
        </x-ws::form-group>
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.input-group') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← InputGroup</a>
    <a href="{{ route('docs.form-section') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">FormSection →</a>
</div>

</x-layouts.docs>
