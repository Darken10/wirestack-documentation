# Composants Feedback

---

## Alert

Message d'alerte contextuel avec icône automatique et support du mode dismissible.

### Utilisation

```blade
{{-- Informationnel --}}
<x-ws::alert color="info">
    Une mise à jour est disponible.
</x-ws::alert>

{{-- Succès avec titre --}}
<x-ws::alert color="success" title="Enregistré !">
    Vos modifications ont été sauvegardées avec succès.
</x-ws::alert>

{{-- Avertissement dismissible --}}
<x-ws::alert color="warning" title="Attention" dismissible>
    Votre abonnement expire dans 3 jours.
</x-ws::alert>

{{-- Erreur avec icône personnalisée --}}
<x-ws::alert color="danger" icon="exclamation-circle">
    Une erreur critique est survenue. Contactez le support.
</x-ws::alert>

{{-- Variantes --}}
<x-ws::alert color="info" variant="solid">Nouvelle version 2.0 disponible !</x-ws::alert>
<x-ws::alert color="success" variant="outline">Compte vérifié.</x-ws::alert>
```

### Props

| Prop          | Type   | Défaut  | Valeurs                                       |
| ------------- | ------ | ------- | --------------------------------------------- |
| `color`       | string | `info`  | `info` `success` `warning` `danger` `neutral` |
| `variant`     | string | `soft`  | `soft` `solid` `outline`                      |
| `title`       | string | —       | Titre en gras au-dessus du message            |
| `icon`        | string | auto    | Icône Heroicons (auto par couleur)            |
| `dismissible` | bool   | `false` | Bouton de fermeture (Alpine.js)               |

**Icônes par défaut selon la couleur :**

| Couleur   | Icône                  |
| --------- | ---------------------- |
| `info`    | `information-circle`   |
| `success` | `check-circle`         |
| `warning` | `exclamation-triangle` |
| `danger`  | `x-circle`             |
| `neutral` | `information-circle`   |

---

## Progress

Barre de progression simple avec support du mode rayé et animé.

### Utilisation

```blade
{{-- Simple --}}
<x-ws::progress :value="65" />

{{-- Avec label et valeur --}}
<x-ws::progress :value="40" label="Téléchargement" show-value color="success" />

{{-- Animée rayée --}}
<x-ws::progress :value="75" striped animated color="primary" />

{{-- Tailles --}}
<x-ws::progress :value="50" size="xs" />
<x-ws::progress :value="50" size="sm" />
<x-ws::progress :value="50" size="lg" />

{{-- Valeur sur 200 (max différent de 100) --}}
<x-ws::progress :value="140" :max="200" label="Score" show-value />
```

### Props

| Prop         | Type   | Défaut    | Description                                             |
| ------------ | ------ | --------- | ------------------------------------------------------- |
| `value`      | int    | `0`       | Valeur actuelle                                         |
| `max`        | int    | `100`     | Valeur maximale                                         |
| `color`      | string | `primary` | `primary` `success` `warning` `danger` `neutral` `info` |
| `size`       | string | `md`      | `xs` `sm` `md` `lg`                                     |
| `label`      | string | —         | Label au-dessus de la barre                             |
| `show-value` | bool   | `false`   | Affiche le pourcentage                                  |
| `striped`    | bool   | `false`   | Motif rayé                                              |
| `animated`   | bool   | `false`   | Animation des rayures (nécessite `striped="true"`)      |

## ProgressBar

Barre de progression multi-segments, chaque segment avec sa propre couleur.

### Utilisation

```blade
<x-ws::progress-bar :segments="[
    ['value' => 45, 'color' => 'success', 'label' => 'Complété'],
    ['value' => 25, 'color' => 'warning', 'label' => 'En cours'],
    ['value' => 10, 'color' => 'danger',  'label' => 'Erreur'],
]" show-legend />
```

### Props

| Prop          | Type   | Description                                                           |
| ------------- | ------ | --------------------------------------------------------------------- |
| `segments`    | array  | `[['value', 'color', 'label']]` — la somme des `value` doit faire 100 |
| `size`        | string | Hauteur de la barre (`xs` `sm` `md` `lg`)                             |
| `show-legend` | bool   | Affiche la légende en dessous                                         |

---

## Skeleton

Placeholder de chargement avec effet shimmer. Utiliser pendant le chargement de données asynchrones.

### Utilisation

```blade
{{-- Lignes de texte --}}
<x-ws::skeleton lines="3" />

{{-- Cercle (avatar placeholder) --}}
<x-ws::skeleton circle width="12" height="12" />

{{-- Bloc rectangulaire --}}
<x-ws::skeleton width="full" height="48" />
<x-ws::skeleton width="64" height="8" />

{{-- Composition — carte de chargement --}}
<x-ws::card>
    <x-ws::card-body>
        <div class="flex items-center gap-4 mb-4">
            <x-ws::skeleton circle width="10" height="10" />
            <div class="flex-1">
                <x-ws::skeleton width="48" height="4" />
                <x-ws::skeleton width="32" height="3" />
            </div>
        </div>
        <x-ws::skeleton lines="4" />
    </x-ws::card-body>
</x-ws::card>
```

### Props

| Prop      | Type   | Défaut    | Description                                          |
| --------- | ------ | --------- | ---------------------------------------------------- |
| `variant` | string | `default` | `default` `text` `circle` `rect`                     |
| `width`   | string | —         | Largeur en unités Tailwind (`32`, `full`, etc.)      |
| `height`  | string | —         | Hauteur en unités Tailwind                           |
| `lines`   | int    | `1`       | Nombre de lignes de texte simulées                   |
| `circle`  | bool   | `false`   | Forme circulaire (shorthand pour `variant="circle"`) |
| `animate` | bool   | `true`    | Active l'animation shimmer                           |

---

## EmptyState

Message affiché quand une liste, une section ou un résultat de recherche est vide.

### Utilisation

```blade
{{-- Basique --}}
<x-ws::empty-state
    icon="inbox"
    title="Aucun message"
    description="Vous n'avez reçu aucun message pour le moment."
/>

{{-- Avec action --}}
<x-ws::empty-state
    icon="document-plus"
    title="Aucun article"
    description="Commencez par créer votre premier article de blog."
>
    <x-ws::button icon="plus" color="primary">Créer un article</x-ws::button>
</x-ws::empty-state>

{{-- Résultat de recherche vide --}}
<x-ws::empty-state
    icon="magnifying-glass"
    title="Aucun résultat"
    :description="'Aucun résultat pour « ' . $search . ' ». Essayez d\'autres termes.'"
    size="sm"
/>
```

### Props

| Prop          | Type   | Défaut | Description                            |
| ------------- | ------ | ------ | -------------------------------------- |
| `title`       | string | —      | Message principal                      |
| `description` | string | —      | Texte d'explication                    |
| `icon`        | string | —      | Icône Heroicons                        |
| `size`        | string | `md`   | `sm` `md` `lg`                         |
| `$slot`       | —      | —      | Actions (boutons) affichées en dessous |
