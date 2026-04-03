<x-layouts.docs title="Configuration">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span>
        <span>Configuration</span>
    </div>
    <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Configuration</h1>
    <p class="text-zinc-600 dark:text-zinc-400">Personnalisez le comportement global de Wirestack UI via <code class="bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded text-sm">config/ws.php</code>.</p>
</div>

<div class="space-y-10">

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Fichier complet</h2>
        <x-docs::code label="config/ws.php">&lt;?php

return [

    /*
    | Préfixe des composants Blade.
    | Défaut : &lt;x-ws::button&gt; / &lt;livewire:ws::modal&gt;
    */
    'prefix' =&gt; 'ws',

    /*
    | Thème par défaut : 'light' | 'dark' | 'system'
    */
    'theme' =&gt; 'system',

    /*
    | Design Tokens — variables CSS injectées dans &lt;head&gt;
    */
    'tokens' =&gt; [
        'primary-h'   =&gt; '221',
        'primary-s'   =&gt; '83%',
        'primary-l'   =&gt; '53%',
        'radius-sm'   =&gt; '0.25rem',
        'radius-md'   =&gt; '0.375rem',
        'radius-lg'   =&gt; '0.5rem',
        'radius-xl'   =&gt; '0.75rem',
        'font-sans'   =&gt; "'Instrument Sans', ui-sans-serif, system-ui, sans-serif",
    ],

    /*
    | Valeurs par défaut des composants
    */
    'defaults' =&gt; [
        'button'   =&gt; ['variant' =&gt; 'solid',    'color' =&gt; 'primary', 'size' =&gt; 'md'],
        'badge'    =&gt; ['variant' =&gt; 'soft',     'color' =&gt; 'primary', 'size' =&gt; 'sm'],
        'avatar'   =&gt; ['size' =&gt; 'md',          'shape' =&gt; 'circle'],
        'input'    =&gt; ['variant' =&gt; 'bordered',  'size' =&gt; 'md'],
        'card'     =&gt; ['variant' =&gt; 'bordered',  'padding' =&gt; 'md'],
        'alert'    =&gt; ['variant' =&gt; 'soft',     'color' =&gt; 'info'],
        'modal'    =&gt; ['size' =&gt; 'md'],
        'drawer'   =&gt; ['position' =&gt; 'right',   'size' =&gt; 'md'],
    ],

    /*
    | Toast
    */
    'toast' =&gt; [
        'position' =&gt; 'bottom-right', // top-right | top-left | bottom-right | bottom-left | top-center | bottom-center
        'duration'  =&gt; 4000,           // ms avant fermeture automatique (0 = jamais)
        'max'       =&gt; 5,              // nombre maximum de toasts visibles
    ],
];</x-docs::code>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Changer le préfixe</h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Par défaut, le préfixe est <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">ws</code>. Vous pouvez le changer selon vos préférences.</p>
        <x-docs::code label="config/ws.php">'prefix' =&gt; 'ui', // &lt;x-ui::button&gt; au lieu de &lt;x-ws::button&gt;</x-docs::code>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Valeurs par défaut globales</h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">
            Définissez les props par défaut pour tous les composants. Ainsi, vous n'avez plus besoin de les répéter partout.
        </p>
        <x-docs::code label="config/ws.php">// Tous les boutons auront variant=outline et color=neutral par défaut
'defaults' =&gt; [
    'button' =&gt; ['variant' =&gt; 'outline', 'color' =&gt; 'neutral', 'size' =&gt; 'sm'],
],</x-docs::code>
        <x-docs::code label="Blade (équivalent)">&lt;!-- Avant --&gt;
&lt;x-ws::button variant="outline" color="neutral" size="sm"&gt;Enregistrer&lt;/x-ws::button&gt;

&lt;!-- Après (defaults configurés) --&gt;
&lt;x-ws::button&gt;Enregistrer&lt;/x-ws::button&gt;</x-docs::code>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Configuration du Toast</h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Contrôlez le comportement global des toasts.</p>
        <x-docs::code label="config/ws.php">'toast' =&gt; [
    'position' =&gt; 'top-right',  // Position sur l'écran
    'duration'  =&gt; 3000,         // 3 secondes avant fermeture automatique
    'max'       =&gt; 3,            // 3 toasts visibles au maximum
],</x-docs::code>
    </div>

</div>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.installation') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Installation</a>
    <a href="{{ route('docs.tokens') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Design Tokens →</a>
</div>

</x-layouts.docs>
