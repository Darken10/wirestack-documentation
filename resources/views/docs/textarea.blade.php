<x-layouts.docs title="Textarea">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Formulaires</span><span>/</span><span>Textarea</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Textarea</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Zone de texte multi-lignes avec les mêmes options de style que l'Input : label, hint, erreur, variantes.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="max-w-sm">
        <x-ws::textarea label="Message" placeholder="Écrivez votre message ici..." :rows="4" hint="Maximum 500 caractères." />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::textarea label="Message" placeholder="Écrivez votre message..." :rows="4" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['variant',     'string', 'bordered',  'bordered | filled | ghost | underline'],
    ['size',        'string', 'md',        'sm | md | lg'],
    ['label',       'string', 'null',      'Label affiché au-dessus du champ'],
    ['hint',        'string', 'null',      'Texte d\'aide affiché sous le champ'],
    ['error',       'string', 'null',      'Message d\'erreur'],
    ['rows',        'int',    '3',         'Nombre de lignes visibles'],
    ['resize',      'string', 'vertical',  'none | vertical | horizontal | both'],
    ['disabled',    'bool',   'false',     'Désactive le champ'],
    ['readonly',    'bool',   'false',     'Champ en lecture seule'],
    ['required',    'bool',   'false',     'Marque le champ comme obligatoire'],
    ['placeholder', 'string', 'null',      'Texte d\'espace réservé'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variantes</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::textarea variant="bordered" label="Bordered" placeholder="Variante par défaut..." :rows="2" />
        <x-ws::textarea variant="filled" label="Filled" placeholder="Fond coloré..." :rows="2" />
        <x-ws::textarea variant="ghost" label="Ghost" placeholder="Transparente..." :rows="2" />
        <x-ws::textarea variant="underline" label="Underline" placeholder="Bordure inférieure uniquement..." :rows="2" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::textarea variant="bordered" label="Bordered" /&gt;
&lt;x-ws::textarea variant="filled" label="Filled" /&gt;
&lt;x-ws::textarea variant="ghost" label="Ghost" /&gt;
&lt;x-ws::textarea variant="underline" label="Underline" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Options de redimensionnement</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::textarea label="Vertical (défaut)" resize="vertical" placeholder="Redimensionnement vertical..." :rows="2" />
        <x-ws::textarea label="Horizontal" resize="horizontal" placeholder="Redimensionnement horizontal..." :rows="2" />
        <x-ws::textarea label="Les deux" resize="both" placeholder="Redimensionnement libre..." :rows="2" />
        <x-ws::textarea label="Aucun" resize="none" placeholder="Pas de redimensionnement..." :rows="2" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::textarea resize="vertical" /&gt;
&lt;x-ws::textarea resize="horizontal" /&gt;
&lt;x-ws::textarea resize="both" /&gt;
&lt;x-ws::textarea resize="none" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">États</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::textarea label="Avec hint" placeholder="Décrivez votre projet..." hint="Soyez précis et concis." :rows="2" />
        <x-ws::textarea label="Avec erreur" placeholder="Votre commentaire..." error="Ce champ est obligatoire." :rows="2" />
        <x-ws::textarea label="Désactivé" :disabled="true" value="Ce contenu ne peut pas être modifié." :rows="2" />
        <x-ws::textarea label="Lecture seule" :readonly="true" value="Contenu en lecture seule." :rows="2" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::textarea label="Avec hint" hint="Texte d'aide..." /&gt;
&lt;x-ws::textarea label="Avec erreur" error="Message d'erreur." /&gt;
&lt;x-ws::textarea label="Désactivé" :disabled="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles et nombre de lignes</h2>
<x-docs::demo>
    <div class="max-w-sm space-y-3">
        <x-ws::textarea size="sm" label="Small (2 lignes)" :rows="2" placeholder="sm..." />
        <x-ws::textarea size="md" label="Medium (4 lignes)" :rows="4" placeholder="md..." />
        <x-ws::textarea size="lg" label="Large (6 lignes)" :rows="6" placeholder="lg..." />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::textarea size="sm" :rows="2" /&gt;
&lt;x-ws::textarea size="md" :rows="4" /&gt;
&lt;x-ws::textarea size="lg" :rows="6" /&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.input') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Input</a>
    <a href="{{ route('docs.select') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Select →</a>
</div>

</x-layouts.docs>
