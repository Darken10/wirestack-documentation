# DataTable (Livewire)

`<livewire:ws::data-table>` — Tableau de données interactif avec recherche, tri, sélection et pagination, entièrement géré par Livewire.

---

## Utilisation basique

```blade
<livewire:ws::data-table
    :columns="[
        ['key' => 'id',         'label' => '#',        'sortable' => true,  'align' => 'center', 'width' => '4rem'],
        ['key' => 'name',       'label' => 'Nom',      'sortable' => true],
        ['key' => 'email',      'label' => 'Email',    'sortable' => true],
        ['key' => 'role',       'label' => 'Rôle',     'sortable' => false],
        ['key' => 'created_at', 'label' => 'Créé le',  'sortable' => true,  'align' => 'right'],
    ]"
    :rows="$users"
    searchable
    selectable
    :per-page="25"
/>
```

---

## Utilisation avancée avec cellules personnalisées

```blade
<livewire:ws::data-table
    :columns="$columns"
    :rows="$users"
    searchable
    selectable
    :per-page-options="[10, 25, 50, 100]"
    empty-message="Aucun utilisateur trouvé."
>
    {{-- Personnaliser l'affichage d'une cellule --}}
    <x-slot:cell-role="{ row }">
        <x-ws::badge
            :label="$row['role']"
            :color="match($row['role']) {
                'admin'    => 'danger',
                'editor'   => 'warning',
                default    => 'neutral',
            }"
        />
    </x-slot:cell-role>

    <x-slot:cell-status="{ row }">
        <x-ws::toggle :checked="$row['active']" wire:click="toggleActive({{ $row['id'] }})" />
    </x-slot:cell-status>

    {{-- Actions par ligne --}}
    <x-slot:actions="{ row }">
        <x-ws::button size="xs" variant="ghost" icon="pencil"  :href="route('users.edit', $row['id'])" />
        <x-ws::button size="xs" variant="ghost" icon="trash"   color="danger" wire:click="delete({{ $row['id'] }})" />
    </x-slot:actions>
</livewire:ws::data-table>
```

---

## Props

| Prop               | Type             | Défaut            | Description                            |
| ------------------ | ---------------- | ----------------- | -------------------------------------- |
| `columns`          | array            | —                 | **Requis** — définition des colonnes   |
| `rows`             | array/Collection | `[]`              | Données à afficher                     |
| `searchable`       | bool             | `false`           | Champ de recherche global              |
| `selectable`       | bool             | `false`           | Cases à cocher pour sélection multiple |
| `empty-message`    | string           | `Aucun résultat.` | Message quand `rows` est vide          |
| `per-page`         | int              | `15`              | Nombre de lignes par page              |
| `per-page-options` | array            | `[15, 30, 50]`    | Options du sélecteur de lignes/page    |

---

## Définition des colonnes

```php
$columns = [
    [
        'key'      => 'name',    // Clé dans chaque ligne
        'label'    => 'Nom',     // En-tête
        'sortable' => true,      // Tri activé (défaut: false)
        'align'    => 'left',    // 'left' | 'center' | 'right' (défaut: 'left')
        'width'    => '10rem',   // Largeur fixe optionnelle (CSS)
    ],
];
```

---

## Propriétés Livewire publiques

Ces propriétés peuvent être lues ou liées depuis un composant parent :

| Propriété   | Type   | Description                 |
| ----------- | ------ | --------------------------- |
| `$search`   | string | Terme de recherche en cours |
| `$sortBy`   | string | Colonne de tri active       |
| `$sortDir`  | string | `asc` ou `desc`             |
| `$selected` | array  | IDs des lignes cochées      |
| `$perPage`  | int    | Lignes affichées par page   |

---

## Méthodes Livewire internes

| Méthode             | Déclencheur              | Description                     |
| ------------------- | ------------------------ | ------------------------------- |
| `sort(string $key)` | Clic sur l'en-tête       | Trie par la colonne `$key`      |
| `toggleSelectAll()` | Clic sur la case globale | Coche/décoche toutes les lignes |
| `updatedSearch()`   | Mise à jour de `$search` | Réinitialise la page à 1        |

---

## Écouter la sélection depuis un parent (Livewire)

```php
// Dans le composant parent
#[On('data-table:selection-changed')]
public function handleSelection(array $selected): void
{
    $this->selectedIds = $selected;
}
```

---

## Exemple complet — gestion d'utilisateurs

```blade
{{-- resources/views/livewire/users/index.blade.php --}}
<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Utilisateurs</h1>
        <x-ws::button label="Ajouter" icon="plus" href="{{ route('users.create') }}" />
    </div>

    <livewire:ws::data-table
        :columns="[
            ['key' => 'id',    'label' => '#',       'sortable' => true,  'align' => 'center', 'width' => '4rem'],
            ['key' => 'name',  'label' => 'Nom',     'sortable' => true],
            ['key' => 'email', 'label' => 'Email',   'sortable' => true],
            ['key' => 'role',  'label' => 'Rôle'],
        ]"
        :rows="$users"
        searchable
        selectable
        :per-page="25"
        empty-message="Aucun utilisateur trouvé."
    >
        <x-slot:cell-role="{ row }">
            <x-ws::badge :label="$row['role']" color="primary" />
        </x-slot:cell-role>

        <x-slot:actions="{ row }">
            <x-ws::button
                size="xs"
                variant="ghost"
                icon="pencil"
                :href="route('users.edit', $row['id'])"
            />
            <x-ws::button
                size="xs"
                variant="ghost"
                icon="trash"
                color="danger"
                onclick="DsModal.open('delete-{{ $row['id'] }}')"
            />
        </x-slot:actions>
    </livewire:ws::data-table>
</div>
```
