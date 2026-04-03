<x-layouts.docs title="Card">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Layout</span><span>/</span><span>Card</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Card</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Conteneur de contenu polyvalent avec header, body et footer. Supporte plusieurs variantes, tailles et effets.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-ws::card>
            <x-ws::card-header title="Titre de la carte" description="Sous-titre ou description courte." />
            <x-ws::card-body>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Contenu principal de la carte. Peut contenir du texte, des composants ou n'importe quel HTML.</p>
            </x-ws::card-body>
            <x-ws::card-footer>
                <div class="flex gap-2">
                    <x-ws::button size="sm" color="primary">Action</x-ws::button>
                    <x-ws::button size="sm" variant="outline" color="neutral">Annuler</x-ws::button>
                </div>
            </x-ws::card-footer>
        </x-ws::card>

        <x-ws::card variant="elevated">
            <x-ws::card-header title="Carte élevée" description="Avec ombre portée." />
            <x-ws::card-body>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Variante <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">elevated</code> avec une ombre plus prononcée.</p>
            </x-ws::card-body>
        </x-ws::card>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::card&gt;
    &lt;x-ws::card-header title="Titre" description="Sous-titre." /&gt;
    &lt;x-ws::card-body&gt;
        Contenu principal...
    &lt;/x-ws::card-body&gt;
    &lt;x-ws::card-footer&gt;
        &lt;x-ws::button color="primary"&gt;Action&lt;/x-ws::button&gt;
    &lt;/x-ws::card-footer&gt;
&lt;/x-ws::card&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — Card</h2>
<x-docs::props :rows="[
    ['variant', 'string', 'bordered', 'bordered | elevated | flat | ghost'],
    ['padding', 'string', 'md',       'none | sm | md | lg | xl'],
    ['rounded', 'string', 'xl',       'none | sm | md | lg | xl | 2xl'],
    ['hover',   'bool',   'false',    'Effet de survol au hover'],
    ['shadow',  'bool',   'false',    'Ombre portée'],
    ['color',   'string', 'white',    'white | neutral | primary'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props — CardHeader</h2>
<x-docs::props :rows="[
    ['title',       'string', '',     'Titre principal de la carte'],
    ['description', 'string', 'null', 'Sous-titre ou description'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Variantes</h2>
<x-docs::demo>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach(['bordered','elevated','flat','ghost'] as $variant)
            <x-ws::card :variant="$variant">
                <x-ws::card-body>
                    <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300">{{ ucfirst($variant) }}</p>
                    <p class="text-xs text-zinc-500 mt-1">Variante {{ $variant }}</p>
                </x-ws::card-body>
            </x-ws::card>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::card variant="bordered"&gt;...&lt;/x-ws::card&gt;
&lt;x-ws::card variant="elevated"&gt;...&lt;/x-ws::card&gt;
&lt;x-ws::card variant="flat"&gt;...&lt;/x-ws::card&gt;
&lt;x-ws::card variant="ghost"&gt;...&lt;/x-ws::card&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Card cliquable (hover)</h2>
<x-docs::demo>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        @foreach(['Tableau de bord','Analytiques','Paramètres'] as $item)
            <x-ws::card :hover="true" class="cursor-pointer">
                <x-ws::card-body>
                    <x-ws::icon name="squares-2x2" class="text-blue-500 mb-2" />
                    <p class="text-sm font-medium text-zinc-700 dark:text-zinc-300">{{ $item }}</p>
                    <p class="text-xs text-zinc-400 mt-1">Survolez cette carte</p>
                </x-ws::card-body>
            </x-ws::card>
        @endforeach
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::card :hover="true" class="cursor-pointer"&gt;
    &lt;x-ws::card-body&gt;
        Contenu cliquable
    &lt;/x-ws::card-body&gt;
&lt;/x-ws::card&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Carte profil utilisateur</h2>
<x-docs::demo>
    <div class="max-w-sm">
        <x-ws::card variant="bordered">
            <x-ws::card-body>
                <div class="flex items-center gap-3 mb-4">
                    <x-ws::avatar initials="JD" color="primary" size="lg" status="online" />
                    <div>
                        <p class="font-semibold text-zinc-900 dark:text-zinc-100">Jean Dupont</p>
                        <p class="text-sm text-zinc-500">jean@exemple.com</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <x-ws::badge color="primary" variant="soft">Admin</x-ws::badge>
                    <x-ws::badge color="success" variant="soft">Vérifié</x-ws::badge>
                </div>
            </x-ws::card-body>
            <x-ws::card-footer>
                <div class="flex gap-2 w-full">
                    <x-ws::button size="sm" color="primary" class="flex-1">Voir le profil</x-ws::button>
                    <x-ws::button size="sm" variant="outline" color="neutral" icon="ellipsis-horizontal" :square="true" />
                </div>
            </x-ws::card-footer>
        </x-ws::card>
    </div>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Paddings</h2>
<x-docs::demo>
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
        @foreach(['none','sm','md','lg','xl'] as $pad)
            <x-ws::card :padding="$pad">
                <x-ws::card-body>
                    <p class="text-xs text-zinc-500">{{ $pad }}</p>
                </x-ws::card-body>
            </x-ws::card>
        @endforeach
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.form-section') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← FormSection</a>
    <a href="{{ route('docs.container') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Container →</a>
</div>

</x-layouts.docs>
