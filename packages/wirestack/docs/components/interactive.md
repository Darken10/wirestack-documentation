# Composants Interactifs

---

## Dropdown & DropdownItem

Menu déroulant contextuel basé sur Alpine.js.

### Utilisation

```blade
{{-- Simple --}}
<x-ws::dropdown label="Options">
    <x-ws::dropdown-item label="Éditer" icon="pencil" href="/edit" />
    <x-ws::dropdown-item label="Dupliquer" icon="document-duplicate" />
    <x-ws::dropdown-item separator />
    <x-ws::dropdown-item label="Supprimer" icon="trash" danger />
</x-ws::dropdown>

{{-- Trigger personnalisé (slot) --}}
<x-ws::dropdown>
    <x-slot:trigger>
        <x-ws::avatar name="Alice" size="sm" class="cursor-pointer" />
    </x-slot:trigger>

    <x-ws::dropdown-item label="Mon profil" icon="user" href="/profile" />
    <x-ws::dropdown-item label="Paramètres" icon="cog-6-tooth" href="/settings" />
    <x-ws::dropdown-item separator />
    <x-ws::dropdown-item label="Se déconnecter" icon="arrow-right-on-rectangle" />
</x-ws::dropdown>

{{-- Alignement à droite --}}
<x-ws::dropdown label="Exporter" align="right" width="56">
    <x-ws::dropdown-item label="Export CSV"   icon="table-cells" />
    <x-ws::dropdown-item label="Export Excel" icon="document-chart-bar" />
    <x-ws::dropdown-item label="Export PDF"   icon="document-text" />
</x-ws::dropdown>
```

### Dropdown — Props

| Prop    | Type   | Défaut  | Description                            |
| ------- | ------ | ------- | -------------------------------------- |
| `label` | string | —       | Libellé du bouton déclencheur          |
| `align` | string | `left`  | `left` `right` — alignement du menu    |
| `width` | string | `48`    | Largeur du menu (`w-{width}` Tailwind) |
| `arrow` | bool   | `false` | Flèche pointant vers le trigger        |

### DropdownItem — Props

| Prop        | Type   | Défaut  | Description                                     |
| ----------- | ------ | ------- | ----------------------------------------------- |
| `label`     | string | —       | Libellé de l'entrée                             |
| `href`      | string | —       | Lien de navigation                              |
| `icon`      | string | —       | Icône Heroicons                                 |
| `danger`    | bool   | `false` | Surlignage rouge                                |
| `disabled`  | bool   | `false` | Désactivé                                       |
| `separator` | bool   | `false` | Séparateur horizontal (ignore les autres props) |

---

## Tooltip

Info-bulle au survol ou au focus.

### Utilisation

```blade
{{-- Basique --}}
<x-ws::tooltip text="Copier dans le presse-papiers">
    <x-ws::button icon="clipboard" variant="ghost" />
</x-ws::tooltip>

{{-- Positions --}}
<x-ws::tooltip text="En haut"    position="top">    <span>Haut</span>   </x-ws::tooltip>
<x-ws::tooltip text="En bas"    position="bottom">  <span>Bas</span>    </x-ws::tooltip>
<x-ws::tooltip text="À gauche"  position="left">    <span>Gauche</span> </x-ws::tooltip>
<x-ws::tooltip text="À droite"  position="right">   <span>Droite</span> </x-ws::tooltip>

{{-- Thème clair --}}
<x-ws::tooltip text="Info" color="light" position="bottom">
    <x-ws::icon name="information-circle" />
</x-ws::tooltip>

{{-- Délai --}}
<x-ws::tooltip text="Apparaît après 500ms" delay="500">
    <x-ws::button label="Survolez-moi" />
</x-ws::tooltip>
```

### Props

| Prop       | Type   | Défaut | Valeurs                             |
| ---------- | ------ | ------ | ----------------------------------- |
| `text`     | string | —      | Contenu de l'info-bulle             |
| `position` | string | `top`  | `top` `bottom` `left` `right`       |
| `color`    | string | `dark` | `dark` `light`                      |
| `arrow`    | bool   | `true` | Flèche indicatrice                  |
| `delay`    | int    | `0`    | Délai d'apparition en millisecondes |

---

## Popover

Panneau contextuel riche au clic, avec titre et contenu libre.

### Utilisation

```blade
<x-ws::popover title="Détails du compte" position="bottom" align="left">
    <x-slot:trigger>
        <x-ws::button label="Informations" icon="information-circle" variant="outline" />
    </x-slot:trigger>

    <p class="text-sm text-neutral-600 dark:text-neutral-300">
        Compte créé le <strong>1 janvier 2026</strong>.
    </p>
    <div class="mt-3 flex gap-2">
        <x-ws::button label="Éditer" size="sm" variant="outline" />
        <x-ws::button label="Supprimer" size="sm" color="danger" />
    </div>
</x-ws::popover>

{{-- Largeur personnalisée --}}
<x-ws::popover title="Filtrer" width="80" position="bottom" align="right">
    <x-slot:trigger>
        <x-ws::button label="Filtres" icon="funnel" />
    </x-slot:trigger>

    {{-- Formulaire de filtrage ... --}}
</x-ws::popover>
```

### Props

| Prop       | Type   | Défaut   | Description                   |
| ---------- | ------ | -------- | ----------------------------- |
| `title`    | string | —        | Titre du popover              |
| `position` | string | `bottom` | `top` `bottom` `left` `right` |
| `align`    | string | `left`   | `left` `right` `center`       |
| `width`    | string | `72`     | Largeur (`w-{width}`)         |

---

## Tabs & Tab

Navigation par onglets.

### Utilisation

```blade
{{-- Props statiques --}}
<x-ws::tabs
    :tabs="[
        ['id' => 'overview',  'label' => 'Vue d\'ensemble', 'icon' => 'home'],
        ['id' => 'activity',  'label' => 'Activité',        'icon' => 'chart-bar', 'badge' => '5'],
        ['id' => 'settings',  'label' => 'Paramètres',      'icon' => 'cog-6-tooth'],
        ['id' => 'disabled',  'label' => 'Désactivé',       'disabled' => true],
    ]"
    variant="underline"
    active="overview"
>
    <div x-show="$ws.activeTab === 'overview'">
        <p>Contenu Vue d'ensemble</p>
    </div>
    <div x-show="$ws.activeTab === 'activity'">
        <p>Contenu Activité</p>
    </div>
    <div x-show="$ws.activeTab === 'settings'">
        <p>Contenu Paramètres</p>
    </div>
</x-ws::tabs>

{{-- Composition avec slots --}}
<x-ws::tabs variant="pills" size="sm" align="center">
    <x-ws::tab id="day"   label="Jour"   icon="sun">
        <p>Données du jour</p>
    </x-ws::tab>
    <x-ws::tab id="week"  label="Semaine" icon="calendar">
        <p>Données de la semaine</p>
    </x-ws::tab>
    <x-ws::tab id="month" label="Mois"   icon="calendar-days">
        <p>Données du mois</p>
    </x-ws::tab>
</x-ws::tabs>
```

### Tabs — Props

| Prop      | Type   | Défaut         | Valeurs                                        |
| --------- | ------ | -------------- | ---------------------------------------------- |
| `tabs`    | array  | —              | Uniquement si on n'utilise pas les slots `Tab` |
| `variant` | string | `underline`    | `underline` `pills` `boxed`                    |
| `size`    | string | `md`           | `sm` `md` `lg`                                 |
| `color`   | string | `primary`      | Couleur de l'onglet actif                      |
| `align`   | string | `left`         | `left` `center` `right`                        |
| `full`    | bool   | `false`        | Onglets qui occupent toute la largeur          |
| `active`  | string | premier onglet | ID de l'onglet actif par défaut                |

### Tab — Props (slot)

| Prop       | Type   | Description                |
| ---------- | ------ | -------------------------- |
| `id`       | string | Identifiant unique         |
| `label`    | string | Libellé de l'onglet        |
| `icon`     | string | Icône Heroicons            |
| `badge`    | string | Badge (ex. `5`, `Nouveau`) |
| `disabled` | bool   | Onglet désactivé           |

---

## Accordion & AccordionItem

Panneau accordéon avec animation.

### Utilisation

```blade
{{-- Un seul ouvert à la fois (défaut) --}}
<x-ws::accordion>
    <x-ws::accordion-item title="Livraison standard" icon="truck">
        <p>La livraison standard prend 3 à 5 jours ouvrés.</p>
    </x-ws::accordion-item>

    <x-ws::accordion-item title="Livraison express" icon="bolt">
        <p>Livraison le lendemain avant 13h00.</p>
    </x-ws::accordion-item>

    <x-ws::accordion-item title="Point relais" :open="true">
        <p>Retrait dans l'un de nos 8 000 points relais partenaires.</p>
    </x-ws::accordion-item>

    <x-ws::accordion-item title="Option désactivée" disabled>
        <p>Non disponible pour votre adresse.</p>
    </x-ws::accordion-item>
</x-ws::accordion>

{{-- Plusieurs panneaux peuvent rester ouverts simultanément --}}
<x-ws::accordion multiple variant="flush">
    <x-ws::accordion-item title="Section 1">...</x-ws::accordion-item>
    <x-ws::accordion-item title="Section 2">...</x-ws::accordion-item>
</x-ws::accordion>
```

### Accordion — Props

| Prop       | Type   | Défaut    | Description                          |
| ---------- | ------ | --------- | ------------------------------------ |
| `multiple` | bool   | `false`   | Autoriser plusieurs panneaux ouverts |
| `variant`  | string | `default` | `default` `flush` `bordered`         |

### AccordionItem — Props

| Prop       | Type   | Défaut  | Description            |
| ---------- | ------ | ------- | ---------------------- |
| `title`    | string | —       | En-tête du panneau     |
| `open`     | bool   | `false` | Ouvert par défaut      |
| `icon`     | string | —       | Icône dans le titre    |
| `disabled` | bool   | `false` | Panneau non interactif |

---

## Collapsible

Panneau rétractable simple, sans groupe parent.

### Utilisation

```blade
{{-- Fermé par défaut --}}
<x-ws::collapsible label="Voir les options avancées" icon="chevron-down">
    <div class="flex flex-col gap-3">
        <x-ws::toggle label="Activer le mode débogage" />
        <x-ws::toggle label="Indexation désactivée" />
    </div>
</x-ws::collapsible>

{{-- Ouvert par défaut --}}
<x-ws::collapsible label="Informations complémentaires" :open="true">
    <p>Contenu toujours visible au chargement.</p>
</x-ws::collapsible>
```

### Props

| Prop    | Type   | Défaut         | Description                     |
| ------- | ------ | -------------- | ------------------------------- |
| `label` | string | —              | Texte du déclencheur            |
| `open`  | bool   | `false`        | Ouvert au chargement            |
| `icon`  | string | `chevron-down` | Icône de rotation dans le titre |
