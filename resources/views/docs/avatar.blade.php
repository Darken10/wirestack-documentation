<x-layouts.docs title="Avatar">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Avatar</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Avatar</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Représentation visuelle d'un utilisateur : photo, initiales ou icône générique. Supporte les indicateurs de statut.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-4 items-center">
        <x-ws::avatar initials="JD" color="primary" />
        <x-ws::avatar initials="AB" color="secondary" status="online" />
        <x-ws::avatar initials="WS" color="success" size="lg" />
        <x-ws::avatar src="https://i.pravatar.cc/100?img=1" alt="User" size="md" />
        <x-ws::avatar src="https://i.pravatar.cc/100?img=2" alt="User" shape="square" status="busy" />
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::avatar initials="JD" color="primary" /&gt;
&lt;x-ws::avatar initials="AB" color="secondary" status="online" /&gt;
&lt;x-ws::avatar src="https://i.pravatar.cc/100" alt="User" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['src',      'string', 'null',   'URL de l\'image'],
    ['alt',      'string', '',       'Texte alternatif de l\'image'],
    ['initials', 'string', '',       'Initiales à afficher si pas d\'image'],
    ['size',     'string', 'md',     'xs | sm | md | lg | xl | 2xl'],
    ['shape',    'string', 'circle', 'circle | square | rounded'],
    ['status',   'string', '',       'online | offline | busy | away'],
    ['color',    'string', 'neutral','primary | secondary | success | warning | danger | info | neutral'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-3 items-end">
        @foreach(['xs','sm','md','lg','xl','2xl'] as $size)
            <div class="text-center">
                <x-ws::avatar initials="WS" color="primary" :size="$size" />
                <p class="text-xs text-zinc-400 mt-1">{{ $size }}</p>
            </div>
        @endforeach
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Formes</h2>
<x-docs::demo>
    <div class="flex gap-4 items-center">
        <div class="text-center">
            <x-ws::avatar initials="WS" color="primary" shape="circle" />
            <p class="text-xs text-zinc-400 mt-1">circle</p>
        </div>
        <div class="text-center">
            <x-ws::avatar initials="WS" color="secondary" shape="square" />
            <p class="text-xs text-zinc-400 mt-1">square</p>
        </div>
        <div class="text-center">
            <x-ws::avatar initials="WS" color="success" shape="rounded" />
            <p class="text-xs text-zinc-400 mt-1">rounded</p>
        </div>
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Statuts</h2>
<x-docs::demo>
    <div class="flex gap-4 items-center">
        @foreach(['online','offline','busy','away'] as $status)
            <div class="text-center">
                <x-ws::avatar initials="{{ strtoupper(substr($status,0,1)) }}" color="neutral" :status="$status" />
                <p class="text-xs text-zinc-400 mt-1">{{ $status }}</p>
            </div>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::avatar initials="JD" status="online" /&gt;
&lt;x-ws::avatar initials="JD" status="busy" /&gt;
&lt;x-ws::avatar initials="JD" status="away" /&gt;
&lt;x-ws::avatar initials="JD" status="offline" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Groupe d'avatars</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Le composant <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">avatar-group</code> empile les avatars avec un overlap automatique.</p>
<x-docs::demo>
    <x-ws::avatar-group>
        <x-ws::avatar initials="JD" color="primary" />
        <x-ws::avatar initials="AB" color="secondary" />
        <x-ws::avatar initials="WS" color="success" />
        <x-ws::avatar initials="+5" color="neutral" />
    </x-ws::avatar-group>
</x-docs::demo>
<x-docs::code>&lt;x-ws::avatar-group&gt;
    &lt;x-ws::avatar initials="JD" color="primary" /&gt;
    &lt;x-ws::avatar initials="AB" color="secondary" /&gt;
    &lt;x-ws::avatar initials="WS" color="success" /&gt;
    &lt;x-ws::avatar initials="+5" color="neutral" /&gt;
&lt;/x-ws::avatar-group&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.badge') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Badge</a>
    <a href="{{ route('docs.chip') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Chip →</a>
</div>

</x-layouts.docs>
