<x-layouts.docs title="Kbd">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Atomes</span><span>/</span><span>Kbd</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Kbd</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Affiche une touche de clavier ou un raccourci clavier avec un rendu visuel réaliste.</p>
        </div>
        <x-ws::badge variant="soft" color="neutral">Blade</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-3 items-center">
        <x-ws::kbd>⌘</x-ws::kbd>
        <x-ws::kbd>K</x-ws::kbd>
        <x-ws::kbd>Ctrl</x-ws::kbd>
        <x-ws::kbd>Shift</x-ws::kbd>
        <x-ws::kbd>Alt</x-ws::kbd>
        <x-ws::kbd>Enter</x-ws::kbd>
        <x-ws::kbd>Esc</x-ws::kbd>
        <x-ws::kbd>Tab</x-ws::kbd>
    </div>
</x-docs::demo>

<x-docs::code>&lt;x-ws::kbd&gt;⌘K&lt;/x-ws::kbd&gt;
&lt;x-ws::kbd&gt;Ctrl&lt;/x-ws::kbd&gt; + &lt;x-ws::kbd&gt;S&lt;/x-ws::kbd&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-2">Props</h2>
<x-docs::props :rows="[
    ['size', 'string', 'md', 'sm | md | lg — taille du composant kbd'],
]" />

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Tailles</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-4 items-center">
        <div class="text-center">
            <x-ws::kbd size="sm">⌘K</x-ws::kbd>
            <p class="text-xs text-zinc-400 mt-1">sm</p>
        </div>
        <div class="text-center">
            <x-ws::kbd size="md">⌘K</x-ws::kbd>
            <p class="text-xs text-zinc-400 mt-1">md</p>
        </div>
        <div class="text-center">
            <x-ws::kbd size="lg">⌘K</x-ws::kbd>
            <p class="text-xs text-zinc-400 mt-1">lg</p>
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::kbd size="sm"&gt;⌘K&lt;/x-ws::kbd&gt;
&lt;x-ws::kbd size="md"&gt;⌘K&lt;/x-ws::kbd&gt;
&lt;x-ws::kbd size="lg"&gt;⌘K&lt;/x-ws::kbd&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Combinaisons de touches</h2>
<x-docs::demo>
    <div class="flex flex-col gap-4">
        <div class="flex items-center gap-2">
            <x-ws::kbd>⌘</x-ws::kbd>
            <span class="text-zinc-400">+</span>
            <x-ws::kbd>K</x-ws::kbd>
            <span class="text-sm text-zinc-500 ml-2">Ouvrir la palette de commandes</span>
        </div>
        <div class="flex items-center gap-2">
            <x-ws::kbd>Ctrl</x-ws::kbd>
            <span class="text-zinc-400">+</span>
            <x-ws::kbd>S</x-ws::kbd>
            <span class="text-sm text-zinc-500 ml-2">Sauvegarder</span>
        </div>
        <div class="flex items-center gap-2">
            <x-ws::kbd>Ctrl</x-ws::kbd>
            <span class="text-zinc-400">+</span>
            <x-ws::kbd>Shift</x-ws::kbd>
            <span class="text-zinc-400">+</span>
            <x-ws::kbd>P</x-ws::kbd>
            <span class="text-sm text-zinc-500 ml-2">Palette de commandes VS Code</span>
        </div>
        <div class="flex items-center gap-2">
            <x-ws::kbd>Alt</x-ws::kbd>
            <span class="text-zinc-400">+</span>
            <x-ws::kbd>F4</x-ws::kbd>
            <span class="text-sm text-zinc-500 ml-2">Fermer la fenêtre</span>
        </div>
    </div>
</x-docs::demo>
<x-docs::code>&lt;x-ws::kbd&gt;Ctrl&lt;/x-ws::kbd&gt; + &lt;x-ws::kbd&gt;S&lt;/x-ws::kbd&gt;
&lt;x-ws::kbd&gt;Ctrl&lt;/x-ws::kbd&gt; + &lt;x-ws::kbd&gt;Shift&lt;/x-ws::kbd&gt; + &lt;x-ws::kbd&gt;P&lt;/x-ws::kbd&gt;</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Intégré dans du texte</h2>
<p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">Le composant s'intègre naturellement dans les phrases pour documenter des raccourcis.</p>
<x-docs::demo>
    <div class="space-y-3 text-sm text-zinc-700 dark:text-zinc-300">
        <p>Appuyez sur <x-ws::kbd>⌘K</x-ws::kbd> pour ouvrir la recherche rapide.</p>
        <p>Utilisez <x-ws::kbd>Tab</x-ws::kbd> pour naviguer entre les champs du formulaire.</p>
        <p>Appuyez sur <x-ws::kbd>Esc</x-ws::kbd> pour fermer la fenêtre modale.</p>
        <p>Sauvegardez avec <x-ws::kbd>Ctrl</x-ws::kbd> + <x-ws::kbd>S</x-ws::kbd> ou <x-ws::kbd>⌘</x-ws::kbd> + <x-ws::kbd>S</x-ws::kbd> sur Mac.</p>
    </div>
</x-docs::demo>
<x-docs::code>&lt;p&gt;Appuyez sur &lt;x-ws::kbd&gt;⌘K&lt;/x-ws::kbd&gt; pour ouvrir la recherche.&lt;/p&gt;
&lt;p&gt;Utilisez &lt;x-ws::kbd&gt;Tab&lt;/x-ws::kbd&gt; pour naviguer entre les champs.&lt;/p&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.chip') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Chip</a>
    <a href="{{ route('docs.icon') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Icon →</a>
</div>

</x-layouts.docs>
