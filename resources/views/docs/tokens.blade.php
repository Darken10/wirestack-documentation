<x-layouts.docs title="Design Tokens">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Design Tokens</span>
    </div>
    <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Design Tokens</h1>
    <p class="text-zinc-600 dark:text-zinc-400">Variables CSS injectées dans <code class="bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded text-sm">&lt;head&gt;</code> via la directive <code class="bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded text-sm">&#64;wsStyles</code>.</p>
</div>

<x-ws::alert color="info" title="Comment ça marche">
    Wirestack UI utilise des variables CSS (<code>--ds-*</code>) pour piloter les couleurs, rayons, ombres et transitions. Vous les surchargez dans <code>config/ws.php</code> sous la clé <code>tokens</code>.
</x-ws::alert>

<div class="space-y-10 mt-8">

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Couleur primaire (HSL)</h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">La couleur principale est définie via trois tokens HSL, ce qui permet de générer automatiquement toutes les teintes (hover, focus ring, etc.).</p>
        <x-docs::code label="config/ws.php">'tokens' =&gt; [
    // Bleu (défaut)
    'primary-h' =&gt; '221',
    'primary-s' =&gt; '83%',
    'primary-l' =&gt; '53%',

    // Vert émeraude
    // 'primary-h' =&gt; '160',
    // 'primary-s' =&gt; '84%',
    // 'primary-l' =&gt; '39%',

    // Violet
    // 'primary-h' =&gt; '263',
    // 'primary-s' =&gt; '70%',
    // 'primary-l' =&gt; '50%',
],</x-docs::code>

        <x-docs::demo label="Exemples de couleurs primaires">
            <div class="flex flex-wrap gap-3">
                <x-ws::button variant="solid" color="primary">Primaire (Bleu)</x-ws::button>
                <x-ws::button variant="solid" color="secondary">Secondaire</x-ws::button>
                <x-ws::button variant="solid" color="success">Succès</x-ws::button>
                <x-ws::button variant="solid" color="danger">Danger</x-ws::button>
            </div>
        </x-docs::demo>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Border radius</h2>
        <x-docs::code label="config/ws.php">'tokens' =&gt; [
    'radius-sm'   =&gt; '0.25rem',  // --ds-radius-sm
    'radius-md'   =&gt; '0.375rem', // --ds-radius-md
    'radius-lg'   =&gt; '0.5rem',   // --ds-radius-lg
    'radius-xl'   =&gt; '0.75rem',  // --ds-radius-xl
    'radius-2xl'  =&gt; '1rem',     // --ds-radius-2xl
    'radius-full' =&gt; '9999px',   // --ds-radius-full
],</x-docs::code>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Typographie</h2>
        <x-docs::code label="config/ws.php">'tokens' =&gt; [
    'font-sans' =&gt; "'Inter', ui-sans-serif, system-ui, sans-serif",
],</x-docs::code>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Ombres</h2>
        <x-docs::code label="config/ws.php">'tokens' =&gt; [
    'shadow-sm' =&gt; '0 1px 2px 0 rgb(0 0 0 / .05)',
    'shadow-md' =&gt; '0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1)',
    'shadow-lg' =&gt; '0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1)',
    'shadow-xl' =&gt; '0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1)',
],</x-docs::code>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Transitions</h2>
        <x-docs::code label="config/ws.php">'tokens' =&gt; [
    'transition-fast'   =&gt; '100ms ease',
    'transition-normal' =&gt; '180ms ease',
    'transition-slow'   =&gt; '300ms ease',
],</x-docs::code>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-3">Référence complète des variables CSS</h2>
        <x-docs::code label="CSS généré (exemple)">::root {
  --ds-primary-h: 221;
  --ds-primary-s: 83%;
  --ds-primary-l: 53%;
  --ds-radius-sm: 0.25rem;
  --ds-radius-md: 0.375rem;
  --ds-radius-lg: 0.5rem;
  --ds-radius-xl: 0.75rem;
  --ds-radius-2xl: 1rem;
  --ds-radius-full: 9999px;
  --ds-font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
  --ds-transition-fast: 100ms ease;
  --ds-transition-normal: 180ms ease;
  --ds-transition-slow: 300ms ease;
  --ds-shadow-sm: 0 1px 2px 0 rgb(0 0 0 / .05);
  --ds-shadow-md: 0 4px 6px -1px rgb(0 0 0 / .1);
  --ds-shadow-lg: 0 10px 15px -3px rgb(0 0 0 / .1);
  --ds-shadow-xl: 0 20px 25px -5px rgb(0 0 0 / .1);
}</x-docs::code>
    </div>

</div>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.configuration') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Configuration</a>
    <a href="{{ route('docs.button') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Button →</a>
</div>

</x-layouts.docs>
