<x-layouts.docs title="Select">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>Select</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Select</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Menu déroulant de sélection avec le même système de style que l'Input : label, hint, erreurs, variantes.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="max-w-sm">
        <x-ws::select label="Pays" placeholder="Choisir un pays...">
            <option>France</option>
            <option>Canada</option>
            <option>Belgique</option>
            <option>Suisse</option>
        </x-ws::select>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::select label="Pays" placeholder="Choisir un pays..."&gt;
    &lt;option&gt;France&lt;/option&gt;
    &lt;option&gt;Canada&lt;/option&gt;
    &lt;option&gt;Belgique&lt;/option&gt;
&lt;/x-ws::select&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['variant',     'string', 'bordered', 'bordered | filled | ghost | underline'],
    ['size',        'string', 'md',       'sm | md | lg'],
    ['label',       'string', 'null',     'Label affiché au-dessus du select'],
    ['hint',        'string', 'null',     'Texte d\'aide affiché sous le select'],
    ['error',       'string', 'null',     'Message d\'erreur'],
    ['disabled',    'bool',   'false',    'Désactive le select'],
    ['required',    'bool',   'false',    'Marque comme obligatoire'],
    ['placeholder', 'string', 'null',     'Option désactivée affichée par défaut'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variantes</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::select variant="bordered" label="Bordered">
            <option>Option 1</option>
            <option>Option 2</option>
        </x-ws::select>
        <x-ws::select variant="filled" label="Filled">
            <option>Option 1</option>
            <option>Option 2</option>
        </x-ws::select>
        <x-ws::select variant="ghost" label="Ghost">
            <option>Option 1</option>
            <option>Option 2</option>
        </x-ws::select>
        <x-ws::select variant="underline" label="Underline">
            <option>Option 1</option>
            <option>Option 2</option>
        </x-ws::select>
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec groupes d'options</h2>
<x-docs::demo>
    <div class="max-w-sm">
        <x-ws::select label="Catégorie" placeholder="Choisir une catégorie...">
            <optgroup label="Technologie">
                <option value="web">Développement Web</option>
                <option value="mobile">Mobile</option>
                <option value="devops">DevOps</option>
            </optgroup>
            <optgroup label="Design">
                <option value="ui">UI Design</option>
                <option value="ux">UX Design</option>
            </optgroup>
        </x-ws::select>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::select label="Catégorie" placeholder="Choisir..."&gt;
    &lt;optgroup label="Technologie"&gt;
        &lt;option value="web"&gt;Développement Web&lt;/option&gt;
        &lt;option value="mobile"&gt;Mobile&lt;/option&gt;
    &lt;/optgroup&gt;
    &lt;optgroup label="Design"&gt;
        &lt;option value="ui"&gt;UI Design&lt;/option&gt;
    &lt;/optgroup&gt;
&lt;/x-ws::select&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">États</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::select label="Avec hint" hint="Sélectionnez votre région de livraison.">
            <option>Île-de-France</option>
            <option>Bretagne</option>
            <option>Occitanie</option>
        </x-ws::select>
        <x-ws::select label="Avec erreur" error="Veuillez sélectionner une option.">
            <option>Option 1</option>
        </x-ws::select>
        <x-ws::select label="Désactivé" :disabled="true">
            <option>Option désactivée</option>
        </x-ws::select>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::select label="Avec hint" hint="Texte d'aide."&gt;...&lt;/x-ws::select&gt;
&lt;x-ws::select label="Avec erreur" error="Sélection requise."&gt;...&lt;/x-ws::select&gt;
&lt;x-ws::select label="Désactivé" :disabled="true"&gt;...&lt;/x-ws::select&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::select size="sm" label="Small">
            <option>Option</option>
        </x-ws::select>
        <x-ws::select size="md" label="Medium">
            <option>Option</option>
        </x-ws::select>
        <x-ws::select size="lg" label="Large">
            <option>Option</option>
        </x-ws::select>
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.textarea') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Textarea</a>
    <a href="{{ route('docs.checkbox') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Checkbox →</a>
</div>

</x-layouts.docs>
