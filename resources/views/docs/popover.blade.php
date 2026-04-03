<x-layouts.docs title="Popover">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Superpositions</span><span>/</span><span>Popover</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Popover</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Panneau flottant avec contenu riche déclenché au clic ou au survol. Plus grand qu'un tooltip.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex gap-4 py-4">
        <x-ws::popover position="bottom">
            <x-slot name="trigger">
                <x-ws::button color="primary">Afficher le popover</x-ws::button>
            </x-slot>
            <div class="p-4 max-w-xs">
                <h3 class="font-semibold text-zinc-900 dark:text-zinc-100 mb-1">Info-bulle enrichie</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                    Le popover peut contenir du HTML, des composants et du contenu formaté.
                </p>
            </div>
        </x-ws::popover>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::popover position="bottom"&gt;
    &lt;x-slot name="trigger"&gt;
        &lt;x-ws::button&gt;Ouvrir&lt;/x-ws::button&gt;
    &lt;/x-slot&gt;
    &lt;div class="p-4"&gt;
        Contenu du popover...
    &lt;/div&gt;
&lt;/x-ws::popover&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['position', 'string', 'bottom', 'top | bottom | left | right'],
    ['trigger',  'string', 'click',  'click | hover'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Positions</h2>
<x-docs::demo>
    <div class="grid grid-cols-2 gap-4 max-w-sm mx-auto py-4">
        @foreach(['top','bottom','left','right'] as $pos)
            <x-ws::popover :position="$pos">
                <x-slot name="trigger">
                    <x-ws::button color="neutral" variant="outline" class="w-full">{{ ucfirst($pos) }}</x-ws::button>
                </x-slot>
                <div class="p-3">
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Position : <strong>{{ $pos }}</strong></p>
                </div>
            </x-ws::popover>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::popover position="top"&gt;...&lt;/x-ws::popover&gt;
&lt;x-ws::popover position="bottom"&gt;...&lt;/x-ws::popover&gt;
&lt;x-ws::popover position="left"&gt;...&lt;/x-ws::popover&gt;
&lt;x-ws::popover position="right"&gt;...&lt;/x-ws::popover&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Popover avec formulaire</h2>
<x-docs::demo>
    <x-ws::popover position="bottom">
        <x-slot name="trigger">
            <x-ws::button color="neutral" variant="outline" icon="funnel">Filtrer</x-ws::button>
        </x-slot>
        <div class="p-4 space-y-3 w-64">
            <h3 class="font-semibold text-zinc-900 dark:text-zinc-100 text-sm">Filtres</h3>
            <x-ws::select label="Statut" placeholder="Tous">
                <option>Actif</option>
                <option>Inactif</option>
            </x-ws::select>
            <x-ws::select label="Rôle" placeholder="Tous les rôles">
                <option>Admin</option>
                <option>Éditeur</option>
                <option>Lecteur</option>
            </x-ws::select>
            <div class="flex gap-2 pt-1">
                <x-ws::button size="sm" color="primary" class="flex-1">Appliquer</x-ws::button>
                <x-ws::button size="sm" color="neutral" variant="outline">Reset</x-ws::button>
            </div>
        </div>
    </x-ws::popover>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Popover profil utilisateur</h2>
<x-docs::demo>
    <x-ws::popover position="bottom">
        <x-slot name="trigger">
            <button class="flex items-center gap-2 hover:opacity-80 transition">
                <x-ws::avatar initials="ML" color="secondary" size="sm" status="online" />
                <x-ws::icon name="chevron-down" size="xs" class="text-zinc-400" />
            </button>
        </x-slot>
        <div class="p-4 w-56">
            <div class="flex items-center gap-3 mb-3">
                <x-ws::avatar initials="ML" color="secondary" size="md" />
                <div>
                    <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">Marie Laurent</p>
                    <p class="text-xs text-zinc-500">marie@exemple.com</p>
                </div>
            </div>
            <x-ws::divider />
            <div class="space-y-1 pt-2">
                <a href="#" class="flex items-center gap-2 text-sm text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 p-1 rounded hover:bg-zinc-50 dark:hover:bg-zinc-800">
                    <x-ws::icon name="user" size="sm" />Profil
                </a>
                <a href="#" class="flex items-center gap-2 text-sm text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 p-1 rounded hover:bg-zinc-50 dark:hover:bg-zinc-800">
                    <x-ws::icon name="cog-6-tooth" size="sm" />Paramètres
                </a>
            </div>
        </div>
    </x-ws::popover>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.dropdown') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Dropdown</a>
    <a href="{{ route('docs.modal') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Modal →</a>
</div>

</x-layouts.docs>
