# Composants Navigation

---

## Breadcrumb

Fil d'Ariane pour indiquer la position dans l'arborescence de l'application.

### Utilisation

```blade
<x-ws::breadcrumb :items="[
    ['label' => 'Accueil',      'href' => '/'],
    ['label' => 'Utilisateurs', 'href' => '/users'],
    ['label' => 'Alice Dupont'],
]" />

{{-- Avec icône sur le premier élément --}}
<x-ws::breadcrumb :items="[
    ['label' => 'Tableau de bord', 'href' => '/dashboard', 'icon' => 'home'],
    ['label' => 'Paramètres',      'href' => '/settings'],
    ['label' => 'Sécurité'],
]" />

{{-- Séparateur personnalisé --}}
<x-ws::breadcrumb separator=">" :items="[...]" />
```

### Props

| Prop        | Type   | Défaut | Description                                          |
| ----------- | ------ | ------ | ---------------------------------------------------- |
| `items`     | array  | `[]`   | Tableau de `['label', 'href' (opt.), 'icon' (opt.)]` |
| `separator` | string | `/`    | Séparateur entre les éléments                        |
| `size`      | string | `md`   | `sm` `md` `lg`                                       |

---

## Pagination

Pagination avec ellipsis automatique et indicateur de résultats.

### Utilisation

```blade
{{-- Standalone --}}
<x-ws::pagination
    :current-page="$currentPage"
    :total-pages="$totalPages"
    :per-page="$perPage"
    :total="$totalItems"
/>

{{-- Sans info résultats --}}
<x-ws::pagination
    :current-page="3"
    :total-pages="12"
    :show-info="false"
/>

{{-- Compact --}}
<x-ws::pagination
    :current-page="$page"
    :total-pages="$pages"
    size="sm"
/>
```

> **Avec Livewire DataTable :** la pagination est gérée entièrement par `<livewire:ws::data-table>`.

### Props

| Prop           | Type   | Défaut | Description                               |
| -------------- | ------ | ------ | ----------------------------------------- |
| `current-page` | int    | `1`    | Page actuelle                             |
| `total-pages`  | int    | `1`    | Nombre total de pages                     |
| `per-page`     | int    | `15`   | Éléments par page (pour l'affichage info) |
| `total`        | int    | `0`    | Nombre total d'éléments                   |
| `show-info`    | bool   | `true` | Affiche « X–Y sur Z résultats »           |
| `size`         | string | `md`   | `sm` `md` `lg`                            |

---

## Steps & Step

Indicateur d'avancement pour formulaires multi-étapes ou processus d'onboarding.

### Utilisation

```blade
<x-ws::steps>
    <x-ws::step number="1" title="Compte"       status="completed" />
    <x-ws::step number="2" title="Profil"        status="completed" />
    <x-ws::step number="3" title="Paiement"      status="current" />
    <x-ws::step number="4" title="Confirmation"  status="pending"   :last="true" />
</x-ws::steps>

{{-- Avec icônes personnalisées --}}
<x-ws::steps color="success">
    <x-ws::step title="Inscription"  icon="user-plus"     status="completed" />
    <x-ws::step title="Vérification" icon="envelope"      status="current" />
    <x-ws::step title="Accès"        icon="lock-open"     status="pending"  :last="true" />
</x-ws::steps>

{{-- Vertical --}}
<x-ws::steps orientation="vertical">
    <x-ws::step number="1" title="Étape 1" description="Description de l'étape" status="completed" />
    <x-ws::step number="2" title="Étape 2" status="current" />
    <x-ws::step number="3" title="Étape 3" status="pending" :last="true" />
</x-ws::steps>
```

> **Important :** Ajouter `:last="true"` au dernier `<x-ws::step>` pour ne pas afficher le connecteur après.

### Steps — Props

| Prop          | Type   | Défaut       | Valeurs                       |
| ------------- | ------ | ------------ | ----------------------------- |
| `orientation` | string | `horizontal` | `horizontal` `vertical`       |
| `color`       | string | `primary`    | `primary` `success` `neutral` |
| `size`        | string | `md`         | `sm` `md` `lg`                |

### Step — Props

| Prop          | Type   | Défaut    | Description                                   |
| ------------- | ------ | --------- | --------------------------------------------- |
| `number`      | int    | —         | Numéro affiché                                |
| `title`       | string | —         | Titre de l'étape                              |
| `description` | string | —         | Sous-titre (visible en orientation verticale) |
| `status`      | string | `pending` | `pending` `current` `completed`               |
| `icon`        | string | —         | Icône Heroicons (remplace le numéro)          |
| `last`        | bool   | `false`   | Supprime le connecteur après l'étape          |

---

## Nav & NavItem

Composant de navigation flexible utilisable en sidebar, en barre d'onglets, ou en menu horizontal.

### Utilisation

```blade
{{-- Sidebar verticale --}}
<x-ws::nav orientation="vertical" variant="pills">
    <x-ws::nav-item href="/dashboard" icon="home" :active="request()->is('dashboard')">
        Tableau de bord
    </x-ws::nav-item>
    <x-ws::nav-item href="/users" icon="users" badge="12" :active="request()->is('users*')">
        Utilisateurs
    </x-ws::nav-item>
    <x-ws::nav-item href="/analytics" icon="chart-bar">
        Analytiques
    </x-ws::nav-item>
    <x-ws::nav-item href="/settings" icon="cog-6-tooth">
        Paramètres
    </x-ws::nav-item>
</x-ws::nav>

{{-- Navigation horizontale --}}
<x-ws::nav orientation="horizontal" variant="underline">
    <x-ws::nav-item href="/overview" :active="true">Vue d'ensemble</x-ws::nav-item>
    <x-ws::nav-item href="/activity">Activité</x-ws::nav-item>
    <x-ws::nav-item href="/billing">Facturation</x-ws::nav-item>
    <x-ws::nav-item href="/danger" disabled>Zone dangereuse</x-ws::nav-item>
</x-ws::nav>
```

### Nav — Props

| Prop          | Type   | Défaut     | Valeurs                                  |
| ------------- | ------ | ---------- | ---------------------------------------- |
| `orientation` | string | `vertical` | `horizontal` `vertical`                  |
| `variant`     | string | `default`  | `default` `pills` `underline` `bordered` |
| `size`        | string | `md`       | `sm` `md` `lg`                           |
| `collapsed`   | bool   | `false`    | Mode icônes seules (sidebar compacte)    |

### NavItem — Props

| Prop       | Type   | Description                        |
| ---------- | ------ | ---------------------------------- |
| `href`     | string | URL de destination                 |
| `active`   | bool   | État actif (style mis en évidence) |
| `icon`     | string | Icône Heroicons                    |
| `badge`    | string | Compteur affiché à droite          |
| `disabled` | bool   | Désactive le lien                  |
