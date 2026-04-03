<x-layouts.docs title="Icon">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Icon</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Icon</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Icônes vectorielles basées sur Heroicons. Supporte trois variantes (outline, solid, mini) et plusieurs tailles.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-4 items-center">
        <x-ws::icon name="home" />
        <x-ws::icon name="user" />
        <x-ws::icon name="cog-6-tooth" />
        <x-ws::icon name="bell" />
        <x-ws::icon name="check-circle" />
        <x-ws::icon name="x-circle" />
        <x-ws::icon name="magnifying-glass" />
        <x-ws::icon name="plus" />
        <x-ws::icon name="trash" />
        <x-ws::icon name="pencil" />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::icon name="home" /&gt;
&lt;x-ws::icon name="star" variant="solid" size="lg" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['name',    'string', 'required', 'Nom de l\'icône Heroicons (ex: home, user, check-circle)'],
    ['size',    'string', 'md',       'xs | sm | md | lg | xl'],
    ['variant', 'string', 'outline',  'outline | solid | mini'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variantes</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-8">
        <div class="text-center">
            <x-ws::icon name="heart" variant="outline" size="lg" />
            <p class="text-xs text-zinc-400 mt-2">outline</p>
        </div>
        <div class="text-center">
            <x-ws::icon name="heart" variant="solid" size="lg" />
            <p class="text-xs text-zinc-400 mt-2">solid</p>
        </div>
        <div class="text-center">
            <x-ws::icon name="heart" variant="mini" size="lg" />
            <p class="text-xs text-zinc-400 mt-2">mini</p>
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::icon name="heart" variant="outline" /&gt;
&lt;x-ws::icon name="heart" variant="solid" /&gt;
&lt;x-ws::icon name="heart" variant="mini" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-6 items-end">
        @foreach(['xs','sm','md','lg','xl'] as $size)
            <div class="text-center">
                <x-ws::icon name="star" variant="solid" :size="$size" class="text-amber-500" />
                <p class="text-xs text-zinc-400 mt-1">{{ $size }}</p>
            </div>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::icon name="star" size="xs" /&gt;
&lt;x-ws::icon name="star" size="sm" /&gt;
&lt;x-ws::icon name="star" size="md" /&gt;
&lt;x-ws::icon name="star" size="lg" /&gt;
&lt;x-ws::icon name="star" size="xl" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Icônes courantes</h2>
<x-docs::demo>
    <div class="grid grid-cols-5 gap-4 sm:grid-cols-10">
        @foreach(['home','user','cog-6-tooth','bell','check-circle','x-circle','magnifying-glass','plus','trash','pencil','envelope','phone','camera','film','chart-bar','globe-alt','lock-closed','shield-check','star','heart'] as $icon)
            <div class="text-center p-2">
                <x-ws::icon :name="$icon" class="text-zinc-600 dark:text-zinc-400 mx-auto" />
                <p class="text-[10px] text-zinc-400 mt-1 truncate">{{ $icon }}</p>
            </div>
        @endforeach
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Couleurs via Tailwind</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Utilisez les classes Tailwind pour coloriser les icônes.</p>
<x-docs::demo>
    <div class="flex flex-wrap gap-4 items-center">
        <x-ws::icon name="check-circle" variant="solid" class="text-green-500" size="lg" />
        <x-ws::icon name="x-circle" variant="solid" class="text-red-500" size="lg" />
        <x-ws::icon name="exclamation-triangle" variant="solid" class="text-yellow-500" size="lg" />
        <x-ws::icon name="information-circle" variant="solid" class="text-blue-500" size="lg" />
        <x-ws::icon name="star" variant="solid" class="text-amber-400" size="lg" />
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::icon name="check-circle" variant="solid" class="text-green-500" size="lg" /&gt;
&lt;x-ws::icon name="x-circle" variant="solid" class="text-red-500" size="lg" /&gt;
&lt;x-ws::icon name="star" variant="solid" class="text-amber-400" size="lg" /&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.kbd') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Kbd</a>
    <a href="{{ route('docs.spinner') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Spinner →</a>
</div>

</x-layouts.docs>
