<x-layouts.docs title="InputGroup">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>InputGroup</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">InputGroup</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Regroupe visuellement plusieurs champs ou un champ avec un bouton en une seule unité cohérente.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="max-w-sm space-y-3">
        <x-ws::input-group>
            <x-ws::input placeholder="Rechercher..." />
            <x-ws::button icon="magnifying-glass" :square="true" color="primary" />
        </x-ws::input-group>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::input-group&gt;
    &lt;x-ws::input placeholder="Rechercher..." /&gt;
    &lt;x-ws::button icon="magnifying-glass" :square="true" color="primary" /&gt;
&lt;/x-ws::input-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Champ + bouton</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::input-group>
            <x-ws::input placeholder="Rechercher..." />
            <x-ws::button color="primary">Rechercher</x-ws::button>
        </x-ws::input-group>

        <x-ws::input-group>
            <x-ws::input type="email" placeholder="Votre adresse email" />
            <x-ws::button color="primary">S'abonner</x-ws::button>
        </x-ws::input-group>

        <x-ws::input-group>
            <x-ws::button icon="arrow-left" :square="true" color="neutral" variant="outline" />
            <x-ws::input placeholder="URL de la page" value="https://wirestack.dev" />
            <x-ws::button icon="arrow-path" :square="true" color="neutral" variant="outline" />
        </x-ws::input-group>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::input-group&gt;
    &lt;x-ws::input type="email" placeholder="Votre email" /&gt;
    &lt;x-ws::button color="primary"&gt;S'abonner&lt;/x-ws::button&gt;
&lt;/x-ws::input-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec préfixe URL</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::input-group>
            <x-ws::input prefix="https://" placeholder="votre-site.com" />
            <x-ws::button color="neutral" variant="outline">Vérifier</x-ws::button>
        </x-ws::input-group>

        <x-ws::input-group>
            <x-ws::input prefix="+33" placeholder="6 12 34 56 78" type="tel" />
            <x-ws::button icon="phone" :square="true" color="success" />
        </x-ws::input-group>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::input-group&gt;
    &lt;x-ws::input prefix="https://" placeholder="votre-site.com" /&gt;
    &lt;x-ws::button color="neutral" variant="outline"&gt;Vérifier&lt;/x-ws::button&gt;
&lt;/x-ws::input-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Select + Input</h2>
<x-docs::demo>
    <div class="max-w-sm">
        <x-ws::input-group>
            <x-ws::select class="w-24">
                <option>FR</option>
                <option>EN</option>
                <option>DE</option>
            </x-ws::select>
            <x-ws::input placeholder="Numéro de téléphone" type="tel" />
        </x-ws::input-group>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::input-group&gt;
    &lt;x-ws::select class="w-24"&gt;
        &lt;option&gt;FR&lt;/option&gt;
        &lt;option&gt;EN&lt;/option&gt;
    &lt;/x-ws::select&gt;
    &lt;x-ws::input placeholder="Numéro de téléphone" type="tel" /&gt;
&lt;/x-ws::input-group&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.range') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Range</a>
    <a href="{{ route('docs.form-group') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">FormGroup →</a>
</div>

</x-layouts.docs>
