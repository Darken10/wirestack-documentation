<x-layouts.docs title="Spinner">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Spinner</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Spinner</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Indicateur de chargement animé. Utilisé pour indiquer qu'une opération est en cours.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-6 items-center">
        <x-ws::spinner size="sm" color="primary" />
        <x-ws::spinner size="md" color="secondary" />
        <x-ws::spinner size="lg" color="success" />
        <x-ws::spinner size="xl" color="danger" />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::spinner /&gt;
&lt;x-ws::spinner size="lg" color="primary" /&gt;
&lt;x-ws::spinner size="xl" color="danger" label="Envoi en cours..." /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['size',  'string', 'md',           'xs | sm | md | lg | xl'],
    ['color', 'string', 'primary',      'primary | secondary | success | danger | warning | info | neutral | current'],
    ['label', 'string', 'Chargement...','Texte pour les lecteurs d\'écran (sr-only)'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-6 items-end">
        @foreach(['xs','sm','md','lg','xl'] as $size)
            <div class="text-center">
                <x-ws::spinner :size="$size" color="primary" />
                <p class="text-xs text-zinc-400 mt-2">{{ $size }}</p>
            </div>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::spinner size="xs" /&gt;
&lt;x-ws::spinner size="sm" /&gt;
&lt;x-ws::spinner size="md" /&gt;
&lt;x-ws::spinner size="lg" /&gt;
&lt;x-ws::spinner size="xl" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-4 items-center">
        @foreach(['primary','secondary','success','danger','warning','info','neutral'] as $color)
            <div class="text-center">
                <x-ws::spinner :color="$color" size="md" />
                <p class="text-xs text-zinc-400 mt-1">{{ $color }}</p>
            </div>
        @endforeach
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Inline avec texte</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Le spinner peut s'utiliser en ligne dans des boutons ou des phrases de chargement.</p>
<x-docs::demo>
    <div class="flex flex-col gap-3">
        <div class="flex items-center gap-2 text-sm text-zinc-600 dark:text-zinc-400">
            <x-ws::spinner size="sm" color="primary" />
            <span>Chargement des données...</span>
        </div>
        <x-ws::button color="primary" :disabled="true">
            <x-ws::spinner size="xs" color="current" />
            Envoi en cours...
        </x-ws::button>
        <div class="flex items-center gap-2 text-sm text-zinc-600 dark:text-zinc-400">
            <x-ws::spinner size="sm" color="success" />
            <span>Synchronisation en cours...</span>
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;div class="flex items-center gap-2"&gt;
    &lt;x-ws::spinner size="sm" color="primary" /&gt;
    &lt;span&gt;Chargement des données...&lt;/span&gt;
&lt;/div&gt;

&lt;x-ws::button color="primary" :disabled="true"&gt;
    &lt;x-ws::spinner size="xs" color="current" /&gt;
    Envoi en cours...
&lt;/x-ws::button&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.icon') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Icon</a>
    <a href="{{ route('docs.skeleton') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Skeleton →</a>
</div>

</x-layouts.docs>
