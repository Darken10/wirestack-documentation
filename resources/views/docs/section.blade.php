<x-layouts.docs title="Section">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Layout</span><span>/</span><span>Section</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Section</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Composant de mise en page qui ajoute un titre et une description au-dessus d'un bloc de contenu.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::section title="Dernières commandes" description="Consultez et gérez vos commandes récentes.">
        <div class="space-y-2">
            @foreach(['Commande #1042 — Livré','Commande #1041 — En transit','Commande #1040 — Traitement'] as $order)
                <div class="flex items-center justify-between p-3 rounded-lg bg-zinc-50 dark:bg-zinc-800">
                    <span class="text-sm text-zinc-700 dark:text-zinc-300">{{ $order }}</span>
                    <x-ws::button size="sm" variant="ghost">Détails</x-ws::button>
                </div>
            @endforeach
        </div>
    </x-ws::section>
</x-docs::demo>

<x-docs::code>&lt;x-ws::section title="Titre de la section" description="Description optionnelle."&gt;
    Contenu de la section...
&lt;/x-ws::section&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['title',       'string', '',     'Titre affiché en en-tête de section'],
    ['description', 'string', 'null', 'Sous-titre ou description'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Section simple</h2>
<x-docs::demo>
    <x-ws::section title="Membres de l'équipe">
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            @foreach([
                ['JD','Jean Dupont','Développeur','primary'],
                ['ML','Marie Laurent','Designer','secondary'],
                ['PC','Paul Chen','Product','success'],
            ] as [$initials, $name, $role, $color])
                <x-ws::card>
                    <x-ws::card-body>
                        <div class="flex items-center gap-2">
                            <x-ws::avatar :initials="$initials" :color="$color" size="sm" />
                            <div>
                                <p class="text-xs font-medium text-zinc-700 dark:text-zinc-300">{{ $name }}</p>
                                <p class="text-xs text-zinc-400">{{ $role }}</p>
                            </div>
                        </div>
                    </x-ws::card-body>
                </x-ws::card>
            @endforeach
        </div>
    </x-ws::section>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Plusieurs sections</h2>
<x-docs::demo>
    <div class="space-y-8">
        <x-ws::section title="Informations générales" description="Résumé de votre compte.">
            <div class="grid grid-cols-2 gap-3">
                <x-ws::card><x-ws::card-body><p class="text-xs text-zinc-500">Nom</p><p class="text-sm font-medium">Jean Dupont</p></x-ws::card-body></x-ws::card>
                <x-ws::card><x-ws::card-body><p class="text-xs text-zinc-500">Email</p><p class="text-sm font-medium">jean@exemple.com</p></x-ws::card-body></x-ws::card>
            </div>
        </x-ws::section>
        <x-ws::section title="Sécurité" description="Gestion de vos accès.">
            <x-ws::card>
                <x-ws::card-body>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium">Mot de passe</p>
                            <p class="text-xs text-zinc-400">Dernière modification il y a 3 mois</p>
                        </div>
                        <x-ws::button size="sm" variant="outline">Modifier</x-ws::button>
                    </div>
                </x-ws::card-body>
            </x-ws::card>
        </x-ws::section>
    </div>
</x-docs::demo>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.container') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Container</a>
    <a href="{{ route('docs.panel') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Panel →</a>
</div>

</x-layouts.docs>
