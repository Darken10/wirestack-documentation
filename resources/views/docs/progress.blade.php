<x-layouts.docs title="Progress">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Données</span><span>/</span><span>Progress</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Progress</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Barre de progression avec couleurs, tailles et modes animés. <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">ProgressBar</code> regroupe plusieurs barres.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-3">
        <x-ws::progress :value="75" color="primary" label="Progression générale" :showValue="true" />
        <x-ws::progress :value="45" color="success" label="Tâches complétées" :showValue="true" />
        <x-ws::progress :value="90" color="warning" label="Espace disque" :showValue="true" />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::progress :value="75" color="primary" label="Progression" :showValue="true" /&gt;
&lt;x-ws::progress :value="45" color="success" :showValue="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Progress</h2>
<x-docs::props :rows="[
    ['value',     'int',    '0',       'Valeur actuelle (0–max)'],
    ['max',       'int',    '100',     'Valeur maximale'],
    ['size',      'string', 'md',      'xs | sm | md | lg'],
    ['color',     'string', 'primary', 'primary | secondary | success | danger | warning | info | neutral'],
    ['label',     'string', 'null',    'Label affiché au-dessus de la barre'],
    ['showValue', 'bool',   'false',   'Affiche le pourcentage'],
    ['animated',  'bool',   'false',   'Animation de progression continue'],
    ['striped',   'bool',   'false',   'Motif rayé sur la barre'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs</h2>
<x-docs::demo>
    <div class="space-y-2">
        @foreach(['primary','secondary','success','danger','warning','info','neutral'] as $color)
            <x-ws::progress :value="65" :color="$color" :label="ucfirst($color)" />
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::progress :value="65" color="primary" /&gt;
&lt;x-ws::progress :value="65" color="success" /&gt;
&lt;x-ws::progress :value="65" color="danger" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="space-y-3">
        @foreach(['xs','sm','md','lg'] as $size)
            <div>
                <p class="text-xs text-zinc-500 mb-1">size="{{ $size }}"</p>
                <x-ws::progress :value="60" color="primary" :size="$size" />
            </div>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::progress :value="60" size="xs" /&gt;
&lt;x-ws::progress :value="60" size="sm" /&gt;
&lt;x-ws::progress :value="60" size="md" /&gt;
&lt;x-ws::progress :value="60" size="lg" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Animé et Rayé</h2>
<x-docs::demo>
    <div class="space-y-3">
        <x-ws::progress :value="70" color="primary" label="Téléchargement..." :animated="true" />
        <x-ws::progress :value="55" color="success" label="Installation..." :striped="true" :animated="true" />
        <x-ws::progress :value="85" color="warning" label="Compression..." :striped="true" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::progress :value="70" color="primary" :animated="true" label="Téléchargement..." /&gt;
&lt;x-ws::progress :value="55" color="success" :striped="true" :animated="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">ProgressBar — barres empilées</h2>
<x-docs::demo>
    <div class="space-y-4">
        <div>
            <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Répartition du stockage</p>
            <x-ws::progress-bar>
                <x-ws::progress :value="40" color="primary" />
                <x-ws::progress :value="30" color="success" />
                <x-ws::progress :value="20" color="warning" />
                <x-ws::progress :value="10" color="danger" />
            </x-ws::progress-bar>
            <div class="flex gap-4 mt-2 text-xs text-zinc-500">
                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-blue-500 inline-block"></span> Documents 40%</span>
                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span> Photos 30%</span>
                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-yellow-500 inline-block"></span> Vidéos 20%</span>
                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-red-500 inline-block"></span> Autres 10%</span>
            </div>
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::progress-bar&gt;
    &lt;x-ws::progress :value="40" color="primary" /&gt;
    &lt;x-ws::progress :value="30" color="success" /&gt;
    &lt;x-ws::progress :value="20" color="warning" /&gt;
    &lt;x-ws::progress :value="10" color="danger" /&gt;
&lt;/x-ws::progress-bar&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.timeline') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Timeline</a>
    <a href="{{ route('docs.code') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Code →</a>
</div>

</x-layouts.docs>
