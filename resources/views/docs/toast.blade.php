<x-layouts.docs title="Toast">

<div class="mb-8">
    <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400 mb-3">
        <a href="{{ route('docs.index') }}" class="hover:text-zinc-900 dark:hover:text-zinc-100">Docs</a>
        <span>/</span><span>Livewire</span><span>/</span><span>Toast</span>
    </div>
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mb-2">Toast</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Notifications temporaires Livewire en coin d'écran. Déclaré une seule fois dans le layout principal.</p>
        </div>
        <x-ws::badge variant="soft" color="warning">Livewire</x-ws::badge>
    </div>
</div>

<x-docs::demo label="Aperçu">
    <div class="flex flex-wrap gap-3">
        <x-ws::button color="success" @click="DsToast.success('Profil sauvegardé avec succès !')">
            <x-ws::icon name="check-circle" size="sm" />
            Succès
        </x-ws::button>
        <x-ws::button color="danger" @click="DsToast.error('Une erreur est survenue.')">
            <x-ws::icon name="x-circle" size="sm" />
            Erreur
        </x-ws::button>
        <x-ws::button color="warning" @click="DsToast.warning('Votre session expire bientôt.')">
            <x-ws::icon name="exclamation-triangle" size="sm" />
            Attention
        </x-ws::button>
        <x-ws::button color="info" @click="DsToast.info('Une nouvelle version est disponible.')">
            <x-ws::icon name="information-circle" size="sm" />
            Info
        </x-ws::button>
    </div>
</x-docs::demo>

<x-docs::code>{{-- Dans le layout (une seule fois) --}}
&lt;livewire:ws::toast /&gt;

{{-- Déclencher depuis le frontend --}}
&lt;x-ws::button &#64;click="DsToast.success('Sauvegardé !')"&gt;Sauvegarder&lt;/x-ws::button&gt;

{{-- Depuis Livewire (PHP) --}}
$this-&gt;dispatch('ds-toast', [
    'type'    =&gt; 'success',
    'message' =&gt; 'Profil mis à jour avec succès.',
]);</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">API JavaScript</h2>
<x-docs::demo>
    <div class="bg-zinc-50 dark:bg-zinc-800 rounded-xl p-4 space-y-2 font-mono text-sm">
        <p><span class="text-blue-500">DsToast</span>.<span class="text-green-500">success</span>(<span class="text-amber-500">message</span>, options)</p>
        <p><span class="text-blue-500">DsToast</span>.<span class="text-red-500">error</span>(<span class="text-amber-500">message</span>, options)</p>
        <p><span class="text-blue-500">DsToast</span>.<span class="text-yellow-500">warning</span>(<span class="text-amber-500">message</span>, options)</p>
        <p><span class="text-blue-500">DsToast</span>.<span class="text-blue-400">info</span>(<span class="text-amber-500">message</span>, options)</p>
    </div>
</x-docs::demo>
<x-docs::code>// Options disponibles
DsToast.success('Opération réussie !', {
    title: 'Succès',      // Titre au-dessus du message
    duration: 4000,       // Durée en ms (défaut: 4000)
    position: 'top-right' // Position
})</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Avec titre</h2>
<x-docs::demo>
    <div class="flex flex-wrap gap-3">
        <x-ws::button
            color="success"
            variant="outline"
            @click="DsToast.success('Votre commande a été confirmée et sera livrée sous 48h.', { title: 'Commande confirmée' })"
        >
            Avec titre
        </x-ws::button>
        <x-ws::button
            color="danger"
            variant="outline"
            @click="DsToast.error('Impossible de traiter votre paiement.', { title: 'Paiement refusé', duration: 6000 })"
        >
            Avec titre + durée longue
        </x-ws::button>
    </div>
</x-docs::demo>
<x-docs::code>DsToast.success('Commande confirmée.', {
    title: 'Succès',
    duration: 5000
})

DsToast.error('Paiement refusé.', {
    title: 'Erreur de paiement',
    duration: 8000
})</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Depuis Livewire (PHP)</h2>
<x-docs::code>// Dans un composant Livewire
public function save(): void
{
    $this->user->save();

    $this-&gt;dispatch('ds-toast', [
        'type'    =&gt; 'success',
        'message' =&gt; 'Profil mis à jour avec succès.',
        'title'   =&gt; 'Sauvegardé',
        'duration' =&gt; 4000,
    ]);
}</x-docs::code>

<h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100 mt-10 mb-3">Installation dans le layout</h2>
<x-docs::code>{{-- resources/views/components/layouts/app.blade.php --}}
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;
    &#123;&#123; &#36;slot &#125;&#125;

    {{-- Ajouter une seule fois dans le layout racine --}}
    &lt;livewire:ws::toast /&gt;
&lt;/body&gt;
&lt;/html&gt;</x-docs::code>

<div class="mt-10 pt-8 border-t border-zinc-200 dark:border-zinc-700 flex items-center justify-between">
    <a href="{{ route('docs.drawer') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">← Drawer</a>
    <a href="{{ route('docs.data-table') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">DataTable →</a>
</div>

</x-layouts.docs>
