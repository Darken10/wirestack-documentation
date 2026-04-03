<x-layouts.docs title="Skeleton">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Skeleton</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Skeleton</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Placeholder animé indiquant qu'un contenu est en cours de chargement. Améliore la perception de performance.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-2 max-w-sm">
        <x-ws::skeleton height="4" width="3/4" />
        <x-ws::skeleton height="4" width="full" />
        <x-ws::skeleton height="4" width="5/6" />
        <x-ws::skeleton height="4" width="2/3" />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::skeleton width="full" height="4" /&gt;
&lt;x-ws::skeleton width="3/4" height="4" /&gt;
&lt;x-ws::skeleton width="full" height="32" rounded="lg" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['width',   'string', 'full', 'Largeur (valeurs Tailwind : full, 1/2, 3/4, 48, etc.)'],
    ['height',  'string', '4',   'Hauteur (valeurs Tailwind : 4, 6, 8, 12, 32, etc.)'],
    ['rounded', 'string', 'md',  'none | sm | md | lg | full'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Skeleton texte</h2>
<x-docs::demo>
    <div class="space-y-2 max-w-md">
        <x-ws::skeleton height="6" width="1/3" rounded="md" />
        <x-ws::skeleton height="4" width="full" />
        <x-ws::skeleton height="4" width="full" />
        <x-ws::skeleton height="4" width="4/5" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;div class="space-y-2"&gt;
    &lt;x-ws::skeleton height="6" width="1/3" rounded="md" /&gt;
    &lt;x-ws::skeleton height="4" width="full" /&gt;
    &lt;x-ws::skeleton height="4" width="full" /&gt;
    &lt;x-ws::skeleton height="4" width="4/5" /&gt;
&lt;/div&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Skeleton carte</h2>
<x-docs::demo>
    <div class="border border-zinc-200 dark:border-zinc-700 rounded-xl p-4 max-w-sm space-y-3">
        <x-ws::skeleton height="40" rounded="lg" />
        <x-ws::skeleton height="5" width="2/3" />
        <div class="space-y-2">
            <x-ws::skeleton height="4" width="full" />
            <x-ws::skeleton height="4" width="full" />
            <x-ws::skeleton height="4" width="3/4" />
        </div>
        <div class="flex gap-2 pt-1">
            <x-ws::skeleton height="8" width="24" rounded="lg" />
            <x-ws::skeleton height="8" width="24" rounded="lg" />
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;div class="border rounded-xl p-4 space-y-3"&gt;
    &lt;x-ws::skeleton height="40" rounded="lg" /&gt;
    &lt;x-ws::skeleton height="5" width="2/3" /&gt;
    &lt;x-ws::skeleton height="4" width="full" /&gt;
    &lt;x-ws::skeleton height="4" width="full" /&gt;
    &lt;x-ws::skeleton height="4" width="3/4" /&gt;
&lt;/div&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avatar + texte</h2>
<x-docs::demo>
    <div class="flex items-center gap-3 max-w-xs">
        <x-ws::skeleton width="10" height="10" rounded="full" />
        <div class="flex-1 space-y-2">
            <x-ws::skeleton height="4" width="1/2" />
            <x-ws::skeleton height="3" width="3/4" />
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;div class="flex items-center gap-3"&gt;
    &lt;x-ws::skeleton width="10" height="10" rounded="full" /&gt;
    &lt;div class="flex-1 space-y-2"&gt;
        &lt;x-ws::skeleton height="4" width="1/2" /&gt;
        &lt;x-ws::skeleton height="3" width="3/4" /&gt;
    &lt;/div&gt;
&lt;/div&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Formes (rounded)</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-4 items-center">
        @foreach(['none','sm','md','lg','full'] as $r)
            <div class="text-center">
                <x-ws::skeleton width="16" height="16" :rounded="$r" />
                <p class="text-xs text-zinc-400 mt-1">{{ $r }}</p>
            </div>
        @endforeach
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.spinner') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Spinner</a>
    <a href="{{ route('docs.tooltip') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Tooltip →</a>
</div>

</x-layouts.docs>
