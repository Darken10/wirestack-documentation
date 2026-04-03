<x-layouts.docs title="Radio">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>Radio</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Radio</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Bouton radio pour sélection unique dans un groupe. Utiliser <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">RadioGroup</code> pour regrouper plusieurs radios.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::radio-group label="Abonnement">
        <x-ws::radio name="plan" value="free" label="Gratuit — Fonctionnalités de base" />
        <x-ws::radio name="plan" value="pro" label="Pro — Toutes les fonctionnalités" :checked="true" />
        <x-ws::radio name="plan" value="enterprise" label="Entreprise — Sur mesure" />
    </x-ws::radio-group>
</x-docs::demo>

<x-docs::code>&lt;x-ws::radio-group label="Abonnement"&gt;
    &lt;x-ws::radio name="plan" value="free" label="Gratuit" /&gt;
    &lt;x-ws::radio name="plan" value="pro" label="Pro" /&gt;
    &lt;x-ws::radio name="plan" value="enterprise" label="Entreprise" /&gt;
&lt;/x-ws::radio-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Radio</h2>
<x-docs::props :rows="[
    ['name',     'string', '',      'Attribut name pour grouper les radios'],
    ['value',    'string', '',      'Valeur du bouton radio'],
    ['label',    'string', '',      'Texte affiché à côté du radio'],
    ['hint',     'string', 'null',  'Texte d\'aide sous le label'],
    ['disabled', 'bool',   'false', 'Désactive ce radio'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — RadioGroup</h2>
<x-docs::props :rows="[
    ['label', 'string', '',     'Label du groupe de radios'],
    ['error', 'string', 'null', 'Message d\'erreur pour le groupe'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec hints</h2>
<x-docs::demo>
    <x-ws::radio-group label="Mode de livraison">
        <x-ws::radio name="shipping" value="standard" label="Livraison standard" hint="3-5 jours ouvrés — Gratuit" />
        <x-ws::radio name="shipping" value="express" label="Livraison express" hint="24h — 9,90 €" :checked="true" />
        <x-ws::radio name="shipping" value="pickup" label="Retrait en magasin" hint="Disponible sous 2h" />
    </x-ws::radio-group>
</x-docs::demo>
<x-docs::code>&lt;x-ws::radio-group label="Mode de livraison"&gt;
    &lt;x-ws::radio name="shipping" value="standard" label="Standard" hint="3-5 jours — Gratuit" /&gt;
    &lt;x-ws::radio name="shipping" value="express" label="Express" hint="24h — 9,90 €" /&gt;
&lt;/x-ws::radio-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec erreur</h2>
<x-docs::demo>
    <x-ws::radio-group label="Taille" error="Veuillez sélectionner une taille.">
        <x-ws::radio name="size" value="s" label="S" />
        <x-ws::radio name="size" value="m" label="M" />
        <x-ws::radio name="size" value="l" label="L" />
        <x-ws::radio name="size" value="xl" label="XL" />
    </x-ws::radio-group>
</x-docs::demo>
<x-docs::code>&lt;x-ws::radio-group label="Taille" error="Sélection requise."&gt;
    &lt;x-ws::radio name="size" value="s" label="S" /&gt;
    &lt;x-ws::radio name="size" value="m" label="M" /&gt;
&lt;/x-ws::radio-group&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Désactivé</h2>
<x-docs::demo>
    <x-ws::radio-group label="Langue (non modifiable)">
        <x-ws::radio name="lang" value="fr" label="Français" :checked="true" :disabled="true" />
        <x-ws::radio name="lang" value="en" label="English" :disabled="true" />
        <x-ws::radio name="lang" value="de" label="Deutsch" :disabled="true" />
    </x-ws::radio-group>
</x-docs::demo>
<x-docs::code>&lt;x-ws::radio name="lang" value="fr" label="Français" :disabled="true" /&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.checkbox') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Checkbox</a>
    <a href="{{ route('docs.toggle') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Toggle →</a>
</div>

</x-layouts.docs>
