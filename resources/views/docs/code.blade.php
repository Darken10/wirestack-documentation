<x-layouts.docs title="Code">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Données</span><span>/</span><span>Code</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Code</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Affichage de code en ligne ou en bloc avec coloration syntaxique et bouton de copie optionnel.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="space-y-4">
        <p class="text-sm text-zinc-700 dark:text-zinc-300">
            Installez le package avec <x-ws::code :inline="true">composer require wirestack/ui</x-ws::code> puis publiez les assets.
        </p>
        <x-ws::code language="bash" copy>composer require wirestack/ui
php artisan wirestack:install</x-ws::code>
    </div>
</x-docs::demo>

<x-docs::code>&lt;!-- Inline --&gt;
&lt;x-ws::code :inline="true"&gt;npm install&lt;/x-ws::code&gt;

&lt;!-- Block --&gt;
&lt;x-ws::code language="bash" copy&gt;composer require wirestack/ui&lt;/x-ws::code&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['inline',   'bool',   'false', 'Affichage inline dans du texte'],
    ['language', 'string', '—',      'Langage de coloration : php, bash, js, html, css, json, blade...'],
    ['copy',     'bool',   'false',  'Ajoute un bouton copier'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Code inline</h2>
<x-docs::demo>
    <div class="space-y-2 text-sm text-zinc-700 dark:text-zinc-300">
        <p>Utilisez <x-ws::code :inline="true">php artisan migrate</x-ws::code> pour migrer la base de données.</p>
        <p>La variable d'environnement <x-ws::code :inline="true">APP_ENV=production</x-ws::code> active le mode production.</p>
        <p>Le fichier <x-ws::code :inline="true">.env</x-ws::code> contient la configuration locale.</p>
    </div>
</x-docs::demo>
<x-docs::code>&lt;p&gt;Utilisez &lt;x-ws::code :inline="true"&gt;php artisan migrate&lt;/x-ws::code&gt; pour migrer.&lt;/p&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Bloc PHP</h2>
<x-docs::demo>
    <x-ws::code language="php" copy>&lt;?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}</x-ws::code>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Bloc Blade</h2>
<x-docs::demo>
    <x-ws::code language="blade" copy>&lt;x-ws::card&gt;
    &lt;x-ws::card-header title="Titre" /&gt;
    &lt;x-ws::card-body&gt;
        &#64;foreach($users as $user)
            &lt;p&gt;{{ $user->name }}&lt;/p&gt;
        &#64;endforeach
    &lt;/x-ws::card-body&gt;
&lt;/x-ws::card&gt;</x-ws::code>
</x-docs::demo>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Bloc shell</h2>
<x-docs::demo>
    <x-ws::code language="bash" copy>composer require wirestack/ui
php artisan vendor:publish --tag=wirestack-assets
npm install && npm run build</x-ws::code>
</x-docs::demo>
<x-docs::code>&lt;x-ws::code language="bash" copy&gt;
    composer require wirestack/ui
&lt;/x-ws::code&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.progress') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Progress</a>
    <a href="{{ route('docs.alert') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Alert →</a>
</div>

</x-layouts.docs>
