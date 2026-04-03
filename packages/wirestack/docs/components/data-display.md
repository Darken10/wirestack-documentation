# Composants Affichage de données

---

## Stat & StatGroup

Affichage de métriques clés avec tendance et icône.

### Utilisation

```blade
{{-- Stat unique --}}
<x-ws::stat
    label="Chiffre d'affaires"
    value="€ 42 850"
    trend="up"
    trend-value="+12.5%"
    icon="currency-euro"
    icon-color="success"
    description="vs. mois dernier"
/>

{{-- Groupe de 4 stats --}}
<x-ws::stat-group :cols="4">
    <x-ws::stat
        label="Utilisateurs actifs"
        value="1 284"
        trend="up"
        trend-value="+8%"
        icon="users"
        icon-color="primary"
    />
    <x-ws::stat
        label="Taux de conversion"
        value="3.6%"
        trend="down"
        trend-value="-0.4%"
        icon="arrow-trending-up"
        icon-color="warning"
    />
    <x-ws::stat
        label="Tickets ouverts"
        value="17"
        trend="neutral"
        icon="ticket"
        icon-color="neutral"
        description="Aucun changement"
    />
    <x-ws::stat
        label="Temps de réponse"
        value="1.2s"
        trend="up"
        trend-value="-0.3s"
        icon="clock"
        icon-color="success"
    />
</x-ws::stat-group>
```

### Stat — Props

| Prop          | Type   | Description                                                     |
| ------------- | ------ | --------------------------------------------------------------- |
| `label`       | string | Libellé de la métrique                                          |
| `value`       | string | Valeur principale (mise en évidence)                            |
| `trend`       | string | `up` `down` `neutral`                                           |
| `trend-value` | string | Variation affichée (ex. `+12.5%`, `-0.4s`)                      |
| `trend-color` | string | Couleur forcée de la tendance                                   |
| `icon`        | string | Icône Heroicons                                                 |
| `icon-color`  | string | Couleur de fond de l'icône (`primary` `success` `warning` etc.) |
| `description` | string | Texte secondaire sous la valeur                                 |

### StatGroup — Props

| Prop      | Type   | Défaut     | Description              |
| --------- | ------ | ---------- | ------------------------ |
| `cols`    | int    | `3`        | Nombre de colonnes (1–4) |
| `variant` | string | `bordered` | Style des cartes         |

---

## Table

Tableau de données statique (pour des données déjà paginées côté serveur).

> Pour un tableau **interactif** avec recherche, tri et pagination, utilisez [`<livewire:ws::data-table>`](../livewire/datatable.md).

### Utilisation

```blade
<x-ws::table
    :columns="[
        ['key' => 'id',     'label' => '#',       'align' => 'center'],
        ['key' => 'name',   'label' => 'Nom'],
        ['key' => 'email',  'label' => 'Email'],
        ['key' => 'status', 'label' => 'Statut',  'align' => 'center'],
        ['key' => 'created','label' => 'Créé le', 'align' => 'right'],
    ]"
    :rows="$users"
    striped
    hoverable
    responsive
    :caption="count($users) . ' utilisateurs'"
/>

{{-- Avec cellules personnalisées --}}
<x-ws::table :columns="$columns" :rows="$rows" compact>
    <x-slot:cell-status="{ row }">
        <x-ws::badge :color="$row['active'] ? 'success' : 'neutral'">
            {{ $row['active'] ? 'Actif' : 'Inactif' }}
        </x-ws::badge>
    </x-slot:cell-status>
</x-ws::table>
```

### Props

| Prop         | Type   | Défaut  | Description                                  |
| ------------ | ------ | ------- | -------------------------------------------- |
| `columns`    | array  | —       | `[['key', 'label', 'align' (opt.)]]`         |
| `rows`       | array  | `[]`    | Tableau de données                           |
| `striped`    | bool   | `false` | Lignes alternées                             |
| `hoverable`  | bool   | `true`  | Mise en évidence au survol                   |
| `bordered`   | bool   | `false` | Bordures de cellules                         |
| `compact`    | bool   | `false` | Espacement réduit (`py-2` au lieu de `py-3`) |
| `responsive` | bool   | `true`  | Défilement horizontal sur mobile             |
| `caption`    | string | —       | Légende affichée en dessous du tableau       |

### Définition des colonnes

```php
$columns = [
    [
        'key'   => 'name',    // Clé dans le tableau de données
        'label' => 'Nom',     // En-tête
        'align' => 'left',    // 'left' | 'center' | 'right' (défaut: 'left')
    ],
];
```

---

## Timeline & TimelineItem

Historique chronologique d'événements.

### Utilisation

```blade
<x-ws::timeline>
    <x-ws::timeline-item
        date="1 janvier 2026"
        title="Compte créé"
        description="Bienvenue sur la plateforme !"
        icon="user-plus"
        color="success"
    />
    <x-ws::timeline-item
        date="15 février 2026"
        title="Premier achat"
        description="Commande #1042 — 89,00 €"
        icon="shopping-cart"
        color="primary"
    />
    <x-ws::timeline-item
        date="Aujourd'hui"
        title="Abonnement Pro activé"
        icon="star"
        color="warning"
        :last="true"
    />
</x-ws::timeline>

{{-- Vertical (défaut) ou horizontal --}}
<x-ws::timeline orientation="horizontal">
    ...
</x-ws::timeline>
```

### Timeline — Props

| Prop          | Type   | Défaut     | Valeurs                 |
| ------------- | ------ | ---------- | ----------------------- |
| `orientation` | string | `vertical` | `vertical` `horizontal` |
| `size`        | string | `md`       | `sm` `md` `lg`          |

### TimelineItem — Props

| Prop          | Type   | Défaut    | Description                           |
| ------------- | ------ | --------- | ------------------------------------- |
| `date`        | string | —         | Date ou heure de l'événement          |
| `title`       | string | —         | Titre de l'événement                  |
| `description` | string | —         | Détail optionnel                      |
| `icon`        | string | —         | Icône Heroicons                       |
| `color`       | string | `neutral` | Couleur du point ou de l'icône        |
| `last`        | bool   | `false`   | Supprime le connecteur après cet item |

---

## Code

Affichage de blocs de code ou de code inline avec coloration syntaxique optionnelle.

### Utilisation

```blade
{{-- Bloc de code avec copie --}}
<x-ws::code language="bash" copy>
composer require darken10/wirestack
</x-ws::code>

{{-- PHP --}}
<x-ws::code language="php" copy>
$user = User::find(1);
echo $user->name;
</x-ws::code>

{{-- Inline dans du texte --}}
<p>
    Lancez <x-ws::code inline>php artisan serve</x-ws::code>
    pour démarrer le serveur de développement.
</p>

{{-- Sans bouton copie --}}
<x-ws::code language="json">
{ "name": "wirestack/ui" }
</x-ws::code>
```

### Props

| Prop       | Type   | Défaut  | Description                                        |
| ---------- | ------ | ------- | -------------------------------------------------- |
| `language` | string | —       | `php` `bash` `js` `html` `css` `json` `blade` etc. |
| `inline`   | bool   | `false` | Rendu inline dans du texte                         |
| `copy`     | bool   | `false` | Ajoute le bouton copier                            |

---

## CopyButton

Bouton autonome pour copier du texte dans le presse-papiers.

### Utilisation

```blade
<x-ws::copy-button text="composer require darken10/wirestack" />

<x-ws::copy-button text="{{ $user->api_key }}" label="Copier la clé API" />

{{-- Avec variant --}}
<x-ws::copy-button
    text="{{ $inviteLink }}"
    label="Copier le lien"
    variant="outline"
    color="primary"
/>
```

### Props

| Prop      | Type   | Défaut    | Description                 |
| --------- | ------ | --------- | --------------------------- |
| `text`    | string | —         | Texte à copier              |
| `label`   | string | `Copier`  | Libellé du bouton           |
| `variant` | string | `ghost`   | Même variantes que `Button` |
| `color`   | string | `neutral` |                             |
| `size`    | string | `sm`      |                             |
