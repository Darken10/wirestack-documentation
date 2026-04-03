<x-layouts.docs title="API JavaScript">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Démarrage</span><span>/</span><span class="text-zinc-900 dark:text-zinc-100">API JavaScript</span>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">API JavaScript</h1>
        <p class="text-zinc-600 dark:text-zinc-400">Après avoir ajouté <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded text-sm">&#64;wsScripts</code> dans votre layout, les helpers suivants sont disponibles globalement dans le navigateur.</p>
    </div>
</div>

{{-- DsToast --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">DsToast — Notifications</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Déclenche des notifications flottantes gérées par le composant <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;livewire:ws::toast /&gt;</code>.</p>

<div class="p-4 rounded-xl bg-blue-50 dark:bg-blue-950/30 border border-blue-200 dark:border-blue-800 mb-4">
    <p class="text-sm text-blue-800 dark:text-blue-200"><strong>Prérequis :</strong> <code class="bg-blue-100 dark:bg-blue-900/50 px-1 rounded">&lt;livewire:ws::toast /&gt;</code> doit être présent dans votre layout principal.</p>
</div>

<x-docs::demo label="Aperçu — 4 types de toast">
    <div class="flex flex-wrap gap-2">
        <x-ws::button color="success" variant="soft" onclick="DsToast.success('Enregistré avec succès !')">Success</x-ws::button>
        <x-ws::button color="danger" variant="soft" onclick="DsToast.error('Une erreur est survenue.', { title: 'Erreur' })">Error</x-ws::button>
        <x-ws::button color="warning" variant="soft" onclick="DsToast.warning('Votre session expire bientôt.')">Warning</x-ws::button>
        <x-ws::button color="info" variant="soft" onclick="DsToast.info('Nouvelle version disponible.')">Info</x-ws::button>
    </div>
</x-docs::demo>

<x-docs::code>DsToast.success(message, options = {});
DsToast.error(message, options = {});
DsToast.warning(message, options = {});
DsToast.info(message, options = {});</x-docs::code>

<div class="overflow-auto my-5">
<table class="w-full text-sm border border-zinc-200 dark:border-zinc-700 rounded-lg overflow-hidden">
    <thead class="bg-zinc-50 dark:bg-zinc-800">
        <tr>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Option</th>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Type</th>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Défaut</th>
            <th class="text-left px-4 py-2.5 font-semibold text-zinc-700 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700">Description</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800 text-zinc-600 dark:text-zinc-400">
        <tr><td class="px-4 py-2.5 font-mono text-xs">title</td><td class="px-4 py-2.5">string</td><td class="px-4 py-2.5">—</td><td class="px-4 py-2.5">Titre affiché en gras au-dessus du message</td></tr>
        <tr><td class="px-4 py-2.5 font-mono text-xs">duration</td><td class="px-4 py-2.5">number</td><td class="px-4 py-2.5">4000</td><td class="px-4 py-2.5">Durée en ms avant auto-dismiss (0 = persistant)</td></tr>
    </tbody>
</table>
</div>

<x-docs::code>// Simple
DsToast.success("Enregistré avec succès");
DsToast.error("Une erreur est survenue");

// Avec titre
DsToast.success("Le fichier a été importé.", { title: "Import réussi" });

// Persistant (fermeture manuelle)
DsToast.error("Connexion refusée", { title: "Erreur réseau", duration: 0 });

// Durée personnalisée
DsToast.info("Redirection dans 3 secondes...", { duration: 3000 });</x-docs::code>

{{-- DsModal --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">DsModal — Modales</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Contrôle des composants <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;livewire:ws::modal&gt;</code> par leur <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">modal-id</code>.</p>

<x-docs::demo label="Aperçu">
    <livewire:ws::modal modal-id="js-api-modal" title="Modale déclenchée via JS">
        <p class="text-zinc-600 dark:text-zinc-400 text-sm">Cette modale a été ouverte avec <code>DsModal.open('js-api-modal')</code>.</p>
    </livewire:ws::modal>
    <x-ws::button color="primary" onclick="DsModal.open('js-api-modal')">Ouvrir la modale</x-ws::button>
</x-docs::demo>

<x-docs::code>DsModal.open("identifiant-de-la-modale");
DsModal.close("identifiant-de-la-modale");

{{-- Déclaration dans la vue --}}
&lt;livewire:ws::modal modal-id="confirm-delete" title="Confirmer"&gt;
    Êtes-vous sûr de vouloir supprimer cet élément ?
&lt;/livewire:ws::modal&gt;

&lt;!-- Déclencheur --&gt;
&lt;button onclick="DsModal.open('confirm-delete')"&gt;Ouvrir&lt;/button&gt;</x-docs::code>

{{-- DsDrawer --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">DsDrawer — Panneaux coulissants</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Contrôle des composants <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;livewire:ws::drawer&gt;</code> par leur <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">drawer-id</code>.</p>

<x-docs::demo label="Aperçu">
    <livewire:ws::drawer drawer-id="js-api-drawer" title="Paramètres utilisateur" position="right">
        <x-ws::stack gap="4">
            <x-ws::input label="Nom d'affichage" placeholder="Jean Dupont" />
            <x-ws::input label="Email" type="email" placeholder="jean@exemple.com" />
            <x-ws::button color="primary">Enregistrer</x-ws::button>
        </x-ws::stack>
    </livewire:ws::drawer>
    <x-ws::button color="neutral" variant="outline" onclick="DsDrawer.open('js-api-drawer')">Ouvrir le drawer</x-ws::button>
</x-docs::demo>

<x-docs::code>DsDrawer.open("identifiant-du-drawer");
DsDrawer.close("identifiant-du-drawer");

&lt;livewire:ws::drawer drawer-id="user-settings" title="Paramètres"&gt;
    &lt;!-- contenu --&gt;
&lt;/livewire:ws::drawer&gt;

&lt;button onclick="DsDrawer.open('user-settings')"&gt;Ouvrir&lt;/button&gt;</x-docs::code>

{{-- DsCommandPalette --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">DsCommandPalette — Palette de commandes</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-3">Contrôle du composant <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;livewire:ws::command-palette&gt;</code>.</p>
<div class="p-4 rounded-xl bg-zinc-50 dark:bg-zinc-800/60 border border-zinc-200 dark:border-zinc-700 mb-4">
    <p class="text-sm text-zinc-700 dark:text-zinc-300"><strong>Raccourci clavier intégré :</strong> <kbd class="px-1.5 py-0.5 rounded bg-white dark:bg-zinc-700 border border-zinc-200 dark:border-zinc-600 text-xs font-mono">⌘K</kbd> (macOS) ou <kbd class="px-1.5 py-0.5 rounded bg-white dark:bg-zinc-700 border border-zinc-200 dark:border-zinc-600 text-xs font-mono">Ctrl+K</kbd> ouvre automatiquement la palette sans configuration supplémentaire.</p>
</div>

<x-docs::code>DsCommandPalette.open();
DsCommandPalette.close();</x-docs::code>

<x-docs::code>&lt;button onclick="DsCommandPalette.open()"&gt;
    Rechercher...
    &lt;span class="text-xs opacity-60"&gt;⌘K&lt;/span&gt;
&lt;/button&gt;</x-docs::code>

{{-- DsCopy --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">DsCopy — Presse-papiers</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Copie du texte dans le presse-papiers avec feedback visuel optionnel. Le composant <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">&lt;x-ws::copy-button&gt;</code> utilise <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">DsCopy</code> en interne.</p>

<x-docs::code>// Retourne true si la copie a réussi
const success = await DsCopy.copy(text, buttonElement);

// Exemple avec un élément bouton pour le feedback visuel
const btn = document.getElementById('copy-btn');
const ok = await DsCopy.copy('npm install wirestack-ui', btn);
if (ok) { console.log('Copié !'); }</x-docs::code>

{{-- Livewire $dispatch --}}
<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Utilisation depuis Livewire (PHP)</h2>
<p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">Vous pouvez déclencher les helpers JS depuis un composant Livewire via <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">$this->dispatch()</code> :</p>

<x-docs::code>// Dans un composant Livewire

// Toast
$this-&gt;dispatch('ds-toast', type: 'success', message: 'Enregistré !');
$this-&gt;dispatch('ds-toast', type: 'error', message: 'Erreur', title: 'Oops');

// Modal
$this-&gt;dispatch('ds-modal-open:confirm-delete');
$this-&gt;dispatch('ds-modal-close:confirm-delete');

// Drawer
$this-&gt;dispatch('ds-drawer-open:user-settings');
$this-&gt;dispatch('ds-drawer-close:user-settings');</x-docs::code>

<p class="text-sm text-zinc-600 dark:text-zinc-400 mt-4">Ou depuis une vue Blade avec <code class="bg-zinc-100 dark:bg-zinc-800 px-1 rounded">$dispatch</code> Alpine.js :</p>
<x-docs::code>&lt;x-ws::button
    x-on:click="$dispatch('ds-toast', { type: 'success', message: 'Action réussie !' })"
&gt;
    Envoyer
&lt;/x-ws::button&gt;

&lt;x-ws::button
    x-on:click="$dispatch('ds-modal-open:confirm-delete')"
    color="danger"
&gt;
    Supprimer
&lt;/x-ws::button&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.directives') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Directives Blade</a>
    <a href="{{ route('docs.button') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Button →</a>
</div>

</x-layouts.docs>
