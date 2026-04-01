# Composants Atomes

Les atomes sont les composants les plus petits et les plus réutilisables du système de design.

---

## Button

Bouton polyvalent rendu comme `<button>` ou `<a>` selon la présence de `href`.

### Utilisation

```blade
{{-- Basique --}}
<x-ws::button>Enregistrer</x-ws::button>

{{-- Variantes --}}
<x-ws::button variant="outline" color="danger" size="lg">Supprimer</x-ws::button>
<x-ws::button variant="ghost" color="neutral">Annuler</x-ws::button>
<x-ws::button variant="soft" color="success">Approuver</x-ws::button>
<x-ws::button variant="link" color="primary">En savoir plus</x-ws::button>

{{-- Lien --}}
<x-ws::button href="/dashboard" icon="home">Tableau de bord</x-ws::button>

{{-- Avec icône --}}
<x-ws::button icon="plus">Créer</x-ws::button>
<x-ws::button icon-trailing="arrow-right">Suivant</x-ws::button>

{{-- Icône seule (carré) --}}
<x-ws::button square icon="trash" variant="ghost" color="danger" />

{{-- États --}}
<x-ws::button loading>Chargement...</x-ws::button>
<x-ws::button disabled>Désactivé</x-ws::button>
<x-ws::button full>Pleine largeur</x-ws::button>

{{-- Confirmation native --}}
<x-ws::button confirm="Êtes-vous sûr ?" wire:click="delete" color="danger">
    Supprimer définitivement
</x-ws::button>

{{-- Formulaire --}}
<x-ws::button button-type="submit" color="primary">Envoyer</x-ws::button>
```

### Props

| Prop            | Type   | Défaut    | Valeurs                                                      |
| --------------- | ------ | --------- | ------------------------------------------------------------ |
| `variant`       | string | `solid`   | `solid` `outline` `ghost` `soft` `link`                      |
| `color`         | string | `primary` | `primary` `secondary` `neutral` `success` `warning` `danger` |
| `size`          | string | `md`      | `xs` `sm` `md` `lg` `xl`                                     |
| `rounded`       | string | `md`      | `none` `sm` `md` `lg` `xl` `full`                            |
| `icon`          | string | —         | Nom d'icône Heroicons                                        |
| `icon-trailing` | string | —         | Icône après le texte                                         |
| `href`          | string | —         | Rend le composant en `<a>`                                   |
| `button-type`   | string | `button`  | `button` `submit` `reset`                                    |
| `loading`       | bool   | `false`   | Spinner + désactivation                                      |
| `disabled`      | bool   | `false`   |                                                              |
| `full`          | bool   | `false`   | `width: 100%`                                                |
| `square`        | bool   | `false`   | Ratio 1:1 (bouton icône)                                     |
| `confirm`       | string | —         | Message `window.confirm()` avant l'action                    |

---

## Badge

Étiquette compacte pour statuts, catégories ou compteurs.

### Utilisation

```blade
<x-ws::badge>Nouveau</x-ws::badge>
<x-ws::badge color="success" variant="solid">Actif</x-ws::badge>
<x-ws::badge color="warning" variant="outline">En attente</x-ws::badge>
<x-ws::badge color="danger" dot>Erreur</x-ws::badge>
<x-ws::badge color="info" icon="bell">3 alertes</x-ws::badge>
<x-ws::badge dismiss>PHP</x-ws::badge>
```

### Props

| Prop      | Type   | Défaut    | Valeurs                                                             |
| --------- | ------ | --------- | ------------------------------------------------------------------- |
| `variant` | string | `soft`    | `soft` `solid` `outline`                                            |
| `color`   | string | `primary` | `primary` `secondary` `neutral` `success` `warning` `danger` `info` |
| `size`    | string | `sm`      | `xs` `sm` `md` `lg`                                                 |
| `rounded` | string | `full`    | `sm` `md` `lg` `full`                                               |
| `icon`    | string | —         | Icône Heroicons à gauche                                            |
| `dot`     | bool   | `false`   | Point coloré à gauche                                               |
| `dismiss` | bool   | `false`   | Bouton fermer (Alpine.js)                                           |

---

## Avatar

Représentation visuelle d'un utilisateur. Initiales en fallback si l'image est absente.

### Utilisation

```blade
{{-- Image --}}
<x-ws::avatar src="/storage/avatars/alice.jpg" alt="Alice Dupont" />

{{-- Initiales --}}
<x-ws::avatar initials="AD" color="primary" />

{{-- Avec statut en ligne --}}
<x-ws::avatar src="/photo.jpg" status="online" size="lg" />

{{-- Formes --}}
<x-ws::avatar initials="AB" shape="square" size="xl" />
<x-ws::avatar initials="AB" shape="rounded" />
```

### Props

| Prop       | Type   | Défaut    | Valeurs                          |
| ---------- | ------ | --------- | -------------------------------- |
| `src`      | string | —         | URL de l'image                   |
| `alt`      | string | —         | Texte alternatif                 |
| `initials` | string | —         | 1 ou 2 lettres (fallback)        |
| `size`     | string | `md`      | `xs` `sm` `md` `lg` `xl` `2xl`   |
| `shape`    | string | `circle`  | `circle` `square` `rounded`      |
| `status`   | string | —         | `online` `offline` `busy` `away` |
| `color`    | string | `primary` | Couleur de fond des initiales    |

## AvatarGroup

Pile d'avatars avec compteur de débordement.

### Utilisation

```blade
<x-ws::avatar-group :max="4">
    <x-ws::avatar src="/u1.jpg" alt="Alice" />
    <x-ws::avatar src="/u2.jpg" alt="Bob" />
    <x-ws::avatar initials="CD" />
    <x-ws::avatar initials="EF" />
    <x-ws::avatar initials="GH" />
</x-ws::avatar-group>
```

### Props

| Prop      | Type   | Défaut  | Description                         |
| --------- | ------ | ------- | ----------------------------------- |
| `max`     | int    | `5`     | Nombre max d'avatars avant `+N`     |
| `size`    | string | `md`    | Taille appliquée à tous les avatars |
| `overlap` | string | `-ml-3` | Chevauchement (classe Tailwind)     |

---

## Spinner

Indicateur de chargement circulaire animé.

### Utilisation

```blade
<x-ws::spinner />
<x-ws::spinner size="lg" color="success" />
<x-ws::spinner size="xl" color="white" />
<x-ws::spinner label="Chargement des données..." />
```

### Props

| Prop    | Type   | Défaut    | Valeurs                                                         |
| ------- | ------ | --------- | --------------------------------------------------------------- |
| `size`  | string | `md`      | `xs` `sm` `md` `lg` `xl`                                        |
| `color` | string | `primary` | `primary` `neutral` `success` `warning` `danger` `info` `white` |
| `label` | string | —         | Texte visible à côté du spinner                                 |

---

## Icon

Icône Heroicons (outline par défaut).

### Utilisation

```blade
<x-ws::icon name="home" />
<x-ws::icon name="user-circle" variant="solid" size="lg" />
<x-ws::icon name="x-mark" class="text-red-500" />
```

### Props

| Prop      | Type   | Défaut    | Valeurs                                       |
| --------- | ------ | --------- | --------------------------------------------- |
| `name`    | string | —         | Nom Heroicons (ex. `home`, `trash`, `pencil`) |
| `variant` | string | `outline` | `outline` `solid` `mini`                      |
| `size`    | string | `md`      | `xs` `sm` `md` `lg` `xl`                      |

---

## Divider

Séparateur horizontal ou vertical, avec texte optionnel.

### Utilisation

```blade
{{-- Horizontal simple --}}
<x-ws::divider />

{{-- Avec texte centré --}}
<x-ws::divider align="center">ou</x-ws::divider>

{{-- Aligné à gauche --}}
<x-ws::divider align="left">Section suivante</x-ws::divider>

{{-- Vertical --}}
<div class="flex items-center h-8">
    <span>Élément A</span>
    <x-ws::divider orientation="vertical" />
    <span>Élément B</span>
</div>

{{-- Styles --}}
<x-ws::divider variant="dashed" />
<x-ws::divider variant="dotted" color="primary" />
```

### Props

| Prop          | Type   | Défaut       | Valeurs                                         |
| ------------- | ------ | ------------ | ----------------------------------------------- |
| `orientation` | string | `horizontal` | `horizontal` `vertical`                         |
| `variant`     | string | `solid`      | `solid` `dashed` `dotted`                       |
| `color`       | string | `default`    | `default` `muted` `primary`                     |
| `align`       | string | `center`     | `left` `center` `right` (pour le texte du slot) |

---

## Kbd

Affichage stylisé d'une touche clavier.

### Utilisation

```blade
<x-ws::kbd>⌘</x-ws::kbd>
<x-ws::kbd>Ctrl</x-ws::kbd>
<x-ws::kbd size="sm">K</x-ws::kbd>

{{-- Combinaison de touches --}}
<span class="inline-flex items-center gap-1">
    <x-ws::kbd>⌘</x-ws::kbd>
    <x-ws::kbd>K</x-ws::kbd>
</span>
```

### Props

| Prop   | Type   | Défaut | Valeurs        |
| ------ | ------ | ------ | -------------- |
| `size` | string | `md`   | `sm` `md` `lg` |

---

## Chip

Étiquette interactive (filtre, tag sélectionnable).

### Utilisation

```blade
<x-ws::chip>PHP</x-ws::chip>
<x-ws::chip color="success" :active="true">Actif</x-ws::chip>
<x-ws::chip color="primary" icon="tag">Catégorie</x-ws::chip>
<x-ws::chip dismissible x-on:dismiss="removeTag('php')">PHP</x-ws::chip>
```

### Props

| Prop          | Type   | Défaut    | Valeurs                                                 |
| ------------- | ------ | --------- | ------------------------------------------------------- |
| `color`       | string | `neutral` | `primary` `neutral` `success` `warning` `danger` `info` |
| `size`        | string | `md`      | `sm` `md` `lg`                                          |
| `active`      | bool   | `false`   | Style sélectionné/actif                                 |
| `dismissible` | bool   | `false`   | Bouton de fermeture (Alpine.js)                         |
| `icon`        | string | —         | Icône Heroicons                                         |
