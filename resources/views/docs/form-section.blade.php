<x-layouts.docs title="FormSection">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>FormSection</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">FormSection</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Divise un long formulaire en sections titrées avec un layout en deux colonnes : titre à gauche, champs à droite.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::form-section title="Informations personnelles" description="Ces informations seront affichées sur votre profil public.">
        <div class="grid grid-cols-2 gap-4">
            <x-ws::input label="Prénom" placeholder="Jean" />
            <x-ws::input label="Nom" placeholder="Dupont" />
        </div>
        <x-ws::input label="Email" type="email" placeholder="jean@exemple.com" icon="envelope" />
        <x-ws::textarea label="Bio" placeholder="Parlez de vous..." :rows="3" hint="Maximum 160 caractères." />
    </x-ws::form-section>
</x-docs::demo>

<x-docs::code>&lt;x-ws::form-section
    title="Informations personnelles"
    description="Ces infos seront affichées sur votre profil."
&gt;
    &lt;div class="grid grid-cols-2 gap-4"&gt;
        &lt;x-ws::input label="Prénom" placeholder="Jean" /&gt;
        &lt;x-ws::input label="Nom" placeholder="Dupont" /&gt;
    &lt;/div&gt;
    &lt;x-ws::input label="Email" type="email" /&gt;
&lt;/x-ws::form-section&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['title',       'string', '',     'Titre de la section'],
    ['description', 'string', 'null', 'Description ou sous-titre de la section'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Formulaire complet multi-sections</h2>
<x-docs::demo>
    <div class="space-y-8">
        <x-ws::form-section title="Informations personnelles" description="Vos informations d'identification.">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-ws::input label="Prénom" placeholder="Jean" :required="true" />
                <x-ws::input label="Nom" placeholder="Dupont" :required="true" />
            </div>
            <x-ws::input label="Email" type="email" icon="envelope" placeholder="jean@exemple.com" :required="true" />
        </x-ws::form-section>

        <x-ws::divider />

        <x-ws::form-section title="Adresse" description="Votre adresse de livraison principale.">
            <x-ws::input label="Adresse" placeholder="123 rue de la Paix" />
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <x-ws::input label="Code postal" placeholder="75001" />
                <div class="sm:col-span-2">
                    <x-ws::input label="Ville" placeholder="Paris" />
                </div>
            </div>
            <x-ws::select label="Pays" placeholder="Choisir...">
                <option>France</option>
                <option>Belgique</option>
                <option>Suisse</option>
            </x-ws::select>
        </x-ws::form-section>

        <x-ws::divider />

        <x-ws::form-section title="Préférences" description="Personnalisez votre expérience.">
            <x-ws::toggle label="Notifications par email" :checked="true" />
            <x-ws::toggle label="Newsletter mensuelle" />
            <x-ws::toggle label="Partager les statistiques d'utilisation" />
        </x-ws::form-section>
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.form-group') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← FormGroup</a>
    <a href="{{ route('docs.card') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Card →</a>
</div>

</x-layouts.docs>
