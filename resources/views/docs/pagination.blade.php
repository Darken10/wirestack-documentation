<x-layouts.docs title="Pagination">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Navigation</span><span>/</span><span>Pagination</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Pagination</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Composant de navigation entre pages de résultats avec info optionnelle sur le nombre total.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <x-ws::pagination :currentPage="3" :totalPages="10" :total="150" :perPage="15" :showInfo="true" />
</x-docs::demo>

<x-docs::code>&lt;x-ws::pagination :currentPage="3" :totalPages="10" :total="150" :perPage="15" :showInfo="true" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['currentPage', 'int',  '1',    'Numéro de la page actuelle'],
    ['totalPages',  'int',  '1',    'Nombre total de pages'],
    ['perPage',     'int',  '15',   'Nombre d\'éléments par page'],
    ['total',       'int',  '0',    'Nombre total d\'éléments'],
    ['showInfo',    'bool', 'true', 'Affiche l\'info "X-Y sur Z résultats"'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Première page</h2>
<x-docs::demo>
    <x-ws::pagination :currentPage="1" :totalPages="8" :total="112" :perPage="15" :showInfo="true" />
</x-docs::demo>
<x-docs::code>&lt;x-ws::pagination :currentPage="1" :totalPages="8" :total="112" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Dernière page</h2>
<x-docs::demo>
    <x-ws::pagination :currentPage="8" :totalPages="8" :total="112" :perPage="15" :showInfo="true" />
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Page du milieu</h2>
<x-docs::demo>
    <x-ws::pagination :currentPage="5" :totalPages="12" :total="175" :perPage="15" :showInfo="true" />
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Sans info</h2>
<x-docs::demo>
    <x-ws::pagination :currentPage="3" :totalPages="7" :showInfo="false" />
</x-docs::demo>
<x-docs::code>&lt;x-ws::pagination :currentPage="3" :totalPages="7" :showInfo="false" /&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Utilisation avec Laravel Paginator</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Passez les données depuis votre contrôleur Eloquent :</p>
<x-docs::code>{{-- Dans le contrôleur --}}
$users = User::paginate(15);

{{-- Dans la vue --}}
&lt;x-ws::pagination
    :currentPage="$users-&gt;currentPage()"
    :totalPages="$users-&gt;lastPage()"
    :total="$users-&gt;total()"
    :perPage="$users-&gt;perPage()"
    :showInfo="true"
/&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.breadcrumb') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Breadcrumb</a>
    <a href="{{ route('docs.steps') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Steps →</a>
</div>

</x-layouts.docs>
