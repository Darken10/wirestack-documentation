# Composants Mise en page

---

## Card

Conteneur principal de contenu. Les sous-composants `CardHeader`, `CardBody` et `CardFooter` permettent une structure sémantique cohérente.

### Utilisation

```blade
{{-- Simple --}}
<x-ws::card>
    Contenu libre
</x-ws::card>

{{-- Variantes --}}
<x-ws::card variant="elevated">...</x-ws::card>
<x-ws::card variant="flat">...</x-ws::card>
<x-ws::card variant="ghost">...</x-ws::card>

{{-- Avec sous-composants --}}
<x-ws::card variant="bordered" rounded="2xl">
    <x-ws::card-header title="Titre de la carte" description="Sous-titre optionnel">
        <x-slot:actions>
            <x-ws::button size="sm" variant="ghost" icon="ellipsis-horizontal" square />
        </x-slot:actions>
    </x-ws::card-header>

    <x-ws::card-body>
        <p>Contenu principal de la carte.</p>
    </x-ws::card-body>

    <x-ws::card-footer align="right">
        <x-ws::button variant="outline">Annuler</x-ws::button>
        <x-ws::button>Confirmer</x-ws::button>
    </x-ws::card-footer>
</x-ws::card>

{{-- Carte cliquable --}}
<x-ws::card hover shadow href="/profile">
    Profil utilisateur
</x-ws::card>
```

### Card — Props

| Prop      | Type   | Défaut     | Valeurs                              |
| --------- | ------ | ---------- | ------------------------------------ |
| `variant` | string | `bordered` | `bordered` `elevated` `flat` `ghost` |
| `padding` | string | `md`       | `none` `sm` `md` `lg` `xl`           |
| `rounded` | string | `xl`       | `none` `md` `lg` `xl` `2xl`          |
| `hover`   | bool   | `false`    | Effet de levée au survol             |
| `shadow`  | bool   | `false`    | Ombre portée                         |
| `color`   | string | `white`    | `white` `neutral` `primary`          |
| `href`    | string | —          | Rend la carte cliquable              |

### CardHeader — Props

| Prop          | Type   | Description                          |
| ------------- | ------ | ------------------------------------ |
| `title`       | string | Titre de la carte                    |
| `description` | string | Sous-titre                           |
| `padding`     | string | Espacement interne (`md` par défaut) |
| `separator`   | bool   | Bordure inférieure                   |
| `$actions`    | slot   | Boutons ou éléments alignés à droite |

### CardBody — Props

| Prop      | Type   | Description                          |
| --------- | ------ | ------------------------------------ |
| `padding` | string | Espacement interne (`md` par défaut) |

### CardFooter — Props

| Prop        | Type   | Description             |
| ----------- | ------ | ----------------------- |
| `align`     | string | `left` `center` `right` |
| `separator` | bool   | Bordure supérieure      |
| `padding`   | string | Espacement interne      |

---

## Container

Conteneur centré avec largeur maximale configurable.

### Utilisation

```blade
<x-ws::container>
    <p>Contenu centré avec largeur par défaut (xl)</p>
</x-ws::container>

<x-ws::container size="sm">
    <p>Contenu étroit (formulaires, auth)</p>
</x-ws::container>

<x-ws::container size="2xl">
    <p>Contenu large (dashboards, tableaux)</p>
</x-ws::container>

<x-ws::container size="full" :padding="false">
    <p>Pleine largeur sans padding</p>
</x-ws::container>
```

### Props

| Prop      | Type   | Défaut | Valeurs                                     |
| --------- | ------ | ------ | ------------------------------------------- |
| `size`    | string | `xl`   | `sm` `md` `lg` `xl` `2xl` `full`            |
| `center`  | bool   | `true` | Centrage horizontal (`mx-auto`)             |
| `padding` | bool   | `true` | Padding horizontal (`px-4 sm:px-6 lg:px-8`) |

---

## Section

Section de page avec titre, description et alignement configurable.

### Utilisation

```blade
<x-ws::section
    title="Nos fonctionnalités"
    description="Tout ce dont vous avez besoin pour construire votre application."
    align="center"
>
    <div class="grid grid-cols-3 gap-6">
        <!-- composants -->
    </div>
</x-ws::section>

<x-ws::section title="À propos" padding="xl">
    <p>Contenu aligné à gauche par défaut.</p>
</x-ws::section>
```

### Props

| Prop          | Type   | Défaut | Description                               |
| ------------- | ------ | ------ | ----------------------------------------- |
| `title`       | string | —      | Titre affiché au-dessus du slot           |
| `description` | string | —      | Sous-titre                                |
| `padding`     | string | `lg`   | Espacement vertical (`sm` `md` `lg` `xl`) |
| `align`       | string | `left` | `left` `center` `right`                   |

---

## Stack

Mise en page flexbox verticale (colonne). Idéal pour empiler des éléments avec un espacement uniforme.

### Utilisation

```blade
<x-ws::stack gap="4">
    <x-ws::input name="name" label="Nom" />
    <x-ws::input name="email" label="Email" />
    <x-ws::button button-type="submit">Enregistrer</x-ws::button>
</x-ws::stack>

<x-ws::stack gap="6" align="center">
    <x-ws::avatar initials="AB" size="xl" />
    <h2 class="text-xl font-bold">Alice Dupont</h2>
</x-ws::stack>
```

### Props

| Prop    | Type   | Défaut    | Description                                    |
| ------- | ------ | --------- | ---------------------------------------------- |
| `gap`   | string | `4`       | Espacement entre les enfants (unités Tailwind) |
| `align` | string | `stretch` | `start` `center` `end` `stretch`               |

---

## Inline

Mise en page flexbox horizontale (ligne). Aligne des éléments côte à côte.

### Utilisation

```blade
<x-ws::inline gap="2" align="center" justify="between">
    <span class="font-medium">Total</span>
    <span class="font-bold">42,00 €</span>
</x-ws::inline>

<x-ws::inline gap="3" align="center" justify="end">
    <x-ws::button variant="outline">Annuler</x-ws::button>
    <x-ws::button>Confirmer</x-ws::button>
</x-ws::inline>

<x-ws::inline gap="2" wrap>
    @foreach ($tags as $tag)
        <x-ws::badge>{{ $tag }}</x-ws::badge>
    @endforeach
</x-ws::inline>
```

### Props

| Prop      | Type   | Défaut   | Description                                                      |
| --------- | ------ | -------- | ---------------------------------------------------------------- |
| `gap`     | string | `2`      | Espacement entre les enfants                                     |
| `align`   | string | `center` | Alignement vertical : `start` `center` `end` `baseline`          |
| `justify` | string | `start`  | Répartition : `start` `center` `end` `between` `around` `evenly` |
| `wrap`    | bool   | `false`  | Retour à la ligne automatique                                    |

---

## Panel

Conteneur léger avec titre optionnel, moins structuré qu'une Card.

### Utilisation

```blade
<x-ws::panel title="Résumé de la commande" color="neutral">
    <p>Sous-total : 38,00 €</p>
    <p>TVA : 4,00 €</p>
    <p class="font-bold">Total : 42,00 €</p>
</x-ws::panel>

<x-ws::panel color="info" variant="bordered">
    <p>Cette action peut prendre quelques minutes.</p>
</x-ws::panel>
```

### Props

| Prop      | Type   | Défaut    | Description                                   |
| --------- | ------ | --------- | --------------------------------------------- |
| `title`   | string | —         | Titre du panneau                              |
| `variant` | string | `default` | `default` `bordered` `flat`                   |
| `color`   | string | `neutral` | `neutral` `info` `success` `warning` `danger` |
| `padding` | string | `md`      | Espacement interne                            |
