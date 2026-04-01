# DS UI — Design System pour Laravel & Livewire 4

Un système de design complet, modulaire et entièrement paramétrable livré sous forme de package Laravel. Plus de 70 composants Blade + 5 composants Livewire, propulsés par Tailwind CSS v4 et Alpine.js.

---

## Table des matières

1. [Installation](#installation)
2. [Configuration](#configuration)
3. [Design Tokens](#design-tokens)
4. [Directives Blade](#directives-blade)
5. [API JavaScript](#api-javascript)
6. [Composants — Atomes](#composants--atomes)
   - [Button](#button)
   - [Badge](#badge)
   - [Avatar & AvatarGroup](#avatar--avatargroup)
   - [Spinner](#spinner)
   - [Divider](#divider)
   - [Kbd](#kbd)
   - [Chip](#chip)
7. [Composants — Formulaires](#composants--formulaires)
   - [Input](#input)
   - [Textarea](#textarea)
   - [Select](#select)
   - [Checkbox](#checkbox)
   - [Radio & RadioGroup](#radio--radiogroup)
   - [Toggle](#toggle)
   - [Range](#range)
   - [FormGroup](#formgroup)
   - [FormSection](#formsection)
   - [InputGroup](#inputgroup)
8. [Composants — Mise en page](#composants--mise-en-page)
   - [Card](#card)
   - [Container](#container)
   - [Section](#section)
   - [Stack & Inline](#stack--inline)
   - [Panel](#panel)
9. [Composants — Navigation](#composants--navigation)
   - [Breadcrumb](#breadcrumb)
   - [Pagination](#pagination)
   - [Steps & Step](#steps--step)
   - [Nav & NavItem](#nav--navitem)
10. [Composants — Feedback](#composants--feedback)
    - [Alert](#alert)
    - [Progress & ProgressBar](#progress--progressbar)
    - [Skeleton](#skeleton)
    - [EmptyState](#emptystate)
11. [Composants — Données](#composants--données)
    - [Stat & StatGroup](#stat--statgroup)
    - [Table](#table)
    - [Timeline & TimelineItem](#timeline--timelineitem)
    - [Code & CopyButton](#code--copybutton)
12. [Composants — Interactifs (Alpine.js)](#composants--interactifs-alpinejs)
    - [Dropdown & DropdownItem](#dropdown--dropdownitem)
    - [Tooltip](#tooltip)
    - [Popover](#popover)
    - [Tabs & Tab](#tabs--tab)
    - [Accordion & AccordionItem](#accordion--accordionitem)
    - [Collapsible](#collapsible)
13. [Composants Livewire](#composants-livewire)
    - [Modal](#modal)
    - [Drawer](#drawer)
    - [Toast](#toast)
    - [DataTable](#datatable)
    - [CommandPalette](#commandpalette)
14. [Personnalisation & Thèmes](#personnalisation--thèmes)
15. [Mode sombre](#mode-sombre)

---

## Installation

### 1. Ajouter le dépôt local dans `composer.json`

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "./packages/ds-ui",
            "options": { "symlink": true }
        }
    ],
    "require": {
        "ds/ui": "@dev"
    }
}
```

Puis exécuter :

```bash
composer install
```

### 2. Intégrer les assets dans `resources/css/app.css`

```css
@import '../../packages/ds-ui/resources/css/ds.css';
@source '../../packages/ds-ui/resources/views/**/*.blade.php';
```

### 3. Ajouter les directives dans le layout principal

```blade
<!DOCTYPE html>
<html>
<head>
    @dsStyles        {{-- Injecte les variables CSS (design tokens) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{ $slot }}

    @dsScripts       {{-- Injecte les helpers JS (DsToast, DsModal, etc.) --}}
</body>
</html>
```

### 4. Ajouter les composants Livewire globaux

Pour que les toasts et la palette de commandes fonctionnent sur toutes les pages :

```blade
<body>
    {{ $slot }}

    <livewire:ds::toast />
    <livewire:ds::command-palette :commands="[]" />

    @dsScripts
</body>
```

### 5. Publier les assets (optionnel)

```bash
# Config
php artisan vendor:publish --tag=ds-config

# Vues (pour personnalisation)
php artisan vendor:publish --tag=ds-views

# Assets CSS/JS
php artisan vendor:publish --tag=ds-assets
```

---

## Configuration

Après publication, éditer `config/ds.php` :

```php
return [
    // Préfixe des composants (<x-ds::button>, <livewire:ds::modal>)
    'prefix' => 'ds',

    // Thème par défaut : 'light' | 'dark' | 'system'
    'theme' => 'system',

    // Design tokens CSS
    'tokens' => [
        'primary-h'   => '221',
        'primary-s'   => '83%',
        'primary-l'   => '53%',
        // ...
    ],

    // Valeurs par défaut des composants
    'defaults' => [
        'button' => ['variant' => 'solid', 'color' => 'primary', 'size' => 'md'],
        'badge'  => ['variant' => 'soft',  'color' => 'primary', 'size' => 'sm'],
        // ...
    ],

    // Configuration des toasts
    'toast' => [
        'position' => 'bottom-right',
        'duration'  => 4000,
        'max'       => 5,
    ],
];
```

---

## Design Tokens

Les tokens sont des variables CSS injectées dans `<head>` via `@dsStyles`. Ils permettent de changer l'apparence globale du système sans modifier les composants.

| Token | Défaut | Description |
|---|---|---|
| `--ds-primary-h` | `221` | Teinte H de la couleur primaire (HSL) |
| `--ds-primary-s` | `83%` | Saturation S de la couleur primaire |
| `--ds-primary-l` | `53%` | Luminosité L de la couleur primaire |
| `--ds-radius-sm` | `0.25rem` | Arrondi petit |
| `--ds-radius-md` | `0.375rem` | Arrondi moyen |
| `--ds-radius-lg` | `0.5rem` | Arrondi grand |
| `--ds-radius-xl` | `0.75rem` | Arrondi très grand |
| `--ds-radius-2xl` | `1rem` | Arrondi extra |
| `--ds-radius-full` | `9999px` | Arrondi complet (pilule) |
| `--ds-font-sans` | `'Instrument Sans', ...` | Police principale |
| `--ds-transition-fast` | `100ms ease` | Transition rapide |
| `--ds-transition-normal` | `180ms ease` | Transition normale |
| `--ds-transition-slow` | `300ms ease` | Transition lente |
| `--ds-shadow-sm` | `0 1px 2px ...` | Ombre légère |
| `--ds-shadow-md` | `0 4px 6px ...` | Ombre moyenne |
| `--ds-shadow-lg` | `0 10px 15px ...` | Ombre forte |
| `--ds-shadow-xl` | `0 20px 25px ...` | Ombre très forte |

**Changer la couleur primaire** (ex. vert émeraude) :

```php
// config/ds.php
'tokens' => [
    'primary-h' => '160',
    'primary-s' => '84%',
    'primary-l' => '39%',
],
```

---

## Directives Blade

| Directive | Description |
|---|---|
| `@dsStyles` | Injecte `<style>:root { --ds-* ... }</style>` dans le `<head>` |
| `@dsScripts` | Injecte les helpers JS (`DsToast`, `DsModal`, `DsDrawer`, `DsCommandPalette`, `DsCopy`) |

---

## API JavaScript

Les helpers sont disponibles globalement après `@dsScripts`.

### DsToast — Notifications

```js
// Afficher une notification
DsToast.success('Enregistré avec succès')
DsToast.error('Une erreur est survenue')
DsToast.warning('Attention, vérifiez les données')
DsToast.info('Mise à jour disponible')

// Avec options
DsToast.success('Profil mis à jour', {
    title: 'Succès',       // Titre optionnel
    duration: 6000,        // Durée en ms (0 = pas d'auto-dismiss)
})
```

### DsModal — Modales

```js
DsModal.open('my-modal')    // Ouvrir la modale avec modalId="my-modal"
DsModal.close('my-modal')   // Fermer
```

### DsDrawer — Tiroirs

```js
DsDrawer.open('my-drawer')  // Ouvrir le tiroir avec drawerId="my-drawer"
DsDrawer.close('my-drawer') // Fermer
```

### DsCommandPalette — Palette de commandes

```js
DsCommandPalette.open()    // Ouvrir (aussi déclenché par Cmd/Ctrl+K)
DsCommandPalette.close()   // Fermer
```

### DsCopy — Presse-papiers

```js
await DsCopy.copy('Texte à copier', buttonElement)
// Retourne true si succès, false si échec
```

---

## Composants — Atomes

### Button

Bouton polyvalent. Peut être rendu comme `<button>` ou `<a>` selon la présence du prop `href`.

```blade
<x-ds::button>Enregistrer</x-ds::button>

<x-ds::button variant="outline" color="danger" size="lg">
    Supprimer
</x-ds::button>

<x-ds::button href="/dashboard" icon="home">
    Tableau de bord
</x-ds::button>

<x-ds::button loading>Chargement...</x-ds::button>

<x-ds::button confirm="Êtes-vous sûr ?" wire:click="delete">
    Supprimer définitivement
</x-ds::button>
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `variant` | string | `solid` | `solid` `outline` `ghost` `soft` `link` |
| `color` | string | `primary` | `primary` `secondary` `neutral` `success` `warning` `danger` `info` |
| `size` | string | `md` | `xs` `sm` `md` `lg` `xl` |
| `rounded` | string | `md` | `none` `sm` `md` `lg` `full` |
| `icon` | string | — | Nom d'icône Heroicons (ex. `plus`, `trash`) |
| `icon-trailing` | string | — | Icône positionnée après le texte |
| `href` | string | — | Rend le bouton comme `<a href="...">` |
| `button-type` | string | `button` | `button` `submit` `reset` |
| `loading` | bool | `false` | Affiche un spinner et désactive |
| `disabled` | bool | `false` | |
| `full` | bool | `false` | Largeur 100% |
| `square` | bool | `false` | Ratio 1:1 (bouton icône) |
| `confirm` | string | — | Message de confirmation `window.confirm()` |

---

### Badge

Étiquette compacte pour statuts, catégories ou compteurs.

```blade
<x-ds::badge>Nouveau</x-ds::badge>
<x-ds::badge color="success" variant="solid">Actif</x-ds::badge>
<x-ds::badge color="warning" dot>En attente</x-ds::badge>
<x-ds::badge color="danger" dismiss>Erreur</x-ds::badge>
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `variant` | string | `soft` | `soft` `solid` `outline` |
| `color` | string | `primary` | `primary` `secondary` `neutral` `success` `warning` `danger` `info` |
| `size` | string | `sm` | `xs` `sm` `md` |
| `rounded` | string | `full` | `sm` `md` `full` |
| `icon` | string | — | Icône Heroicons |
| `dot` | bool | `false` | Affiche un point coloré |
| `dismiss` | bool | `false` | Bouton de fermeture (Alpine) |

---

### Avatar & AvatarGroup

Représentation visuelle d'un utilisateur. Utilise une image ou des initiales en fallback.

```blade
{{-- Avec image --}}
<x-ds::avatar src="/storage/avatars/user.jpg" alt="Alice" />

{{-- Avec initiales (fallback automatique si src absent) --}}
<x-ds::avatar initials="AB" color="primary" />

{{-- Avec indicateur de statut --}}
<x-ds::avatar src="/photo.jpg" status="online" size="lg" />

{{-- Groupe avec chevauchement --}}
<x-ds::avatar-group :max="4">
    <x-ds::avatar src="/u1.jpg" />
    <x-ds::avatar src="/u2.jpg" />
    <x-ds::avatar src="/u3.jpg" />
    <x-ds::avatar initials="JD" />
    <x-ds::avatar initials="MK" />
</x-ds::avatar-group>
```

**Avatar — props :**

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `src` | string | — | URL de l'image |
| `alt` | string | — | Texte alternatif |
| `initials` | string | — | 1 ou 2 lettres affichées si pas d'image |
| `size` | string | `md` | `xs` `sm` `md` `lg` `xl` `2xl` |
| `shape` | string | `circle` | `circle` `square` `rounded` |
| `status` | string | — | `online` `offline` `busy` `away` |
| `color` | string | `primary` | Couleur du fond des initiales |

**AvatarGroup — props :**

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `max` | int | `5` | Nombre maximum d'avatars affichés |
| `size` | string | `md` | Taille appliquée à tous les avatars |
| `overlap` | string | `-ml-3` | Classe de chevauchement |

---

### Spinner

Indicateur de chargement circulaire.

```blade
<x-ds::spinner />
<x-ds::spinner size="lg" color="success" />
<x-ds::spinner label="Chargement des données..." />
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `size` | string | `md` | `xs` `sm` `md` `lg` `xl` |
| `color` | string | `primary` | `primary` `neutral` `success` `warning` `danger` `info` `white` |
| `label` | string | — | Texte visible à côté du spinner |

---

### Divider

Séparateur horizontal ou vertical.

```blade
<x-ds::divider />
<x-ds::divider align="center">ou</x-ds::divider>
<x-ds::divider orientation="vertical" />
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `orientation` | string | `horizontal` | `horizontal` `vertical` |
| `variant` | string | `solid` | `solid` `dashed` `dotted` |
| `color` | string | `default` | `default` `muted` `primary` |
| `align` | string | `center` | `left` `center` `right` (pour le texte du slot) |

---

### Kbd

Affichage d'une touche clavier pour les raccourcis.

```blade
<x-ds::kbd>⌘</x-ds::kbd>
<x-ds::kbd>Ctrl</x-ds::kbd>
<x-ds::kbd size="sm">K</x-ds::kbd>

{{-- Combinaison --}}
<span class="flex items-center gap-1">
    <x-ds::kbd>⌘</x-ds::kbd>
    <x-ds::kbd>K</x-ds::kbd>
</span>
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `size` | string | `md` | `sm` `md` `lg` |

---

### Chip

Étiquette sélectionnable ou filtrable, avec support de fermeture.

```blade
<x-ds::chip>PHP</x-ds::chip>
<x-ds::chip color="success" active>Actif</x-ds::chip>
<x-ds::chip dismissible x-on:dismiss="removeTag('php')">PHP</x-ds::chip>
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `color` | string | `neutral` | `primary` `neutral` `success` `warning` `danger` `info` |
| `size` | string | `md` | `sm` `md` `lg` |
| `active` | bool | `false` | Style actif/sélectionné |
| `dismissible` | bool | `false` | Bouton de fermeture |
| `icon` | string | — | Icône Heroicons |

---

## Composants — Formulaires

### Input

Champ de saisie texte complet avec prise en charge des états de validation.

```blade
{{-- Basique --}}
<x-ds::input name="email" label="Email" type="email" />

{{-- Avec icône et indication --}}
<x-ds::input
    name="search"
    placeholder="Rechercher..."
    icon="magnifying-glass"
    hint="Tapez au moins 3 caractères"
/>

{{-- État d'erreur --}}
<x-ds::input
    name="username"
    label="Nom d'utilisateur"
    :error="$errors->first('username')"
/>

{{-- Avec préfixe et suffixe --}}
<x-ds::input name="price" prefix="€" suffix="HT" />

{{-- Variantes --}}
<x-ds::input variant="filled" name="q" />
<x-ds::input variant="underline" name="q" />
<x-ds::input variant="ghost" name="q" />
```

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `name` | string | — | Attribut `name` du champ |
| `id` | string | valeur de `name` | Attribut `id` |
| `type` | string | `text` | `text` `email` `password` `number` `tel` `url` `search` |
| `variant` | string | `bordered` | `bordered` `filled` `ghost` `underline` |
| `size` | string | `md` | `sm` `md` `lg` |
| `label` | string | — | Label affiché au-dessus |
| `hint` | string | — | Texte d'aide affiché en dessous |
| `error` | string | — | Message d'erreur (remplace `hint`, style rouge) |
| `icon` | string | — | Icône Heroicons à gauche |
| `icon-trailing` | string | — | Icône à droite |
| `prefix` | string | — | Texte collé à gauche (ex. `€`, `https://`) |
| `suffix` | string | — | Texte collé à droite (ex. `.com`) |
| `placeholder` | string | — | |
| `required` | bool | `false` | |
| `disabled` | bool | `false` | |
| `readonly` | bool | `false` | |
| `loading` | bool | `false` | Spinner à droite |
| `clearable` | bool | `false` | Bouton effacer (Alpine) |
| `autocomplete` | string | `off` | |

---

### Textarea

Zone de saisie multi-lignes.

```blade
<x-ds::textarea name="message" label="Message" rows="5" />

<x-ds::textarea
    name="bio"
    label="Bio"
    autoresize
    hint="Max 500 caractères"
/>
```

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `name` | string | — | |
| `label` | string | — | |
| `hint` | string | — | |
| `error` | string | — | |
| `variant` | string | `bordered` | `bordered` `filled` `ghost` `underline` |
| `size` | string | `md` | `sm` `md` `lg` |
| `rows` | int | `4` | Nombre de lignes |
| `autoresize` | bool | `false` | Hauteur automatique (Alpine) |
| `disabled` | bool | `false` | |
| `readonly` | bool | `false` | |
| `required` | bool | `false` | |

---

### Select

Liste déroulante avec options.

```blade
<x-ds::select
    name="country"
    label="Pays"
    placeholder="Choisir un pays..."
    :options="[
        'fr' => 'France',
        'be' => 'Belgique',
        'ch' => 'Suisse',
    ]"
/>
```

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `name` | string | — | |
| `options` | array | `[]` | Tableau associatif `['valeur' => 'Label']` |
| `placeholder` | string | — | Option vide initiale |
| `label` | string | — | |
| `hint` | string | — | |
| `error` | string | — | |
| `variant` | string | `bordered` | `bordered` `filled` `ghost` |
| `size` | string | `md` | `sm` `md` `lg` |
| `disabled` | bool | `false` | |
| `required` | bool | `false` | |

---

### Checkbox

Case à cocher avec label.

```blade
<x-ds::checkbox name="terms" label="J'accepte les CGU" required />
<x-ds::checkbox name="newsletter" label="Recevoir les newsletters" color="success" />
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `name` | string | — | |
| `value` | string | `1` | Valeur soumise |
| `label` | string | — | |
| `hint` | string | — | |
| `error` | string | — | |
| `color` | string | `primary` | `primary` `success` `danger` |
| `size` | string | `md` | `sm` `md` `lg` |
| `disabled` | bool | `false` | |
| `required` | bool | `false` | |

---

### Radio & RadioGroup

Boutons radio individuels ou groupés.

```blade
<x-ds::radio-group label="Abonnement" hint="Choisissez votre formule">
    <x-ds::radio name="plan" value="free"       label="Gratuit" />
    <x-ds::radio name="plan" value="pro"        label="Pro — 9€/mois" />
    <x-ds::radio name="plan" value="enterprise" label="Entreprise" />
</x-ds::radio-group>
```

**RadioGroup — props :**

| Prop | Type | Description |
|---|---|---|
| `label` | string | Label du groupe |
| `hint` | string | Texte d'aide |
| `error` | string | Message d'erreur |
| `orientation` | string | `vertical` (défaut) ou `horizontal` |

**Radio — props :**

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `name` | string | — | Doit être identique dans le groupe |
| `value` | string | — | Valeur soumise |
| `label` | string | — | |
| `color` | string | `primary` | `primary` `success` |
| `size` | string | `md` | `sm` `md` `lg` |
| `disabled` | bool | `false` | |

---

### Toggle

Interrupteur on/off (switch).

```blade
<x-ds::toggle name="notifications" label="Activer les notifications" />
<x-ds::toggle name="dark_mode" color="success" size="lg" :checked="true" />
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `name` | string | — | |
| `label` | string | — | |
| `hint` | string | — | |
| `color` | string | `primary` | `primary` `success` `danger` `warning` |
| `size` | string | `md` | `sm` `md` `lg` |
| `checked` | bool | `false` | État initial |
| `disabled` | bool | `false` | |

---

### Range

Curseur pour sélectionner une valeur dans un intervalle.

```blade
<x-ds::range name="volume" label="Volume" min="0" max="100" step="5" />
<x-ds::range name="opacity" label="Opacité" show-value />
```

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `name` | string | — | |
| `label` | string | — | |
| `hint` | string | — | |
| `min` | int | `0` | |
| `max` | int | `100` | |
| `step` | int | `1` | |
| `show-value` | bool | `false` | Affiche la valeur courante (Alpine) |
| `color` | string | `primary` | |
| `disabled` | bool | `false` | |

---

### FormGroup

Conteneur pour un champ de formulaire avec label, hint et gestion des erreurs.

```blade
<x-ds::form-group label="Mot de passe" for="password" required>
    <x-ds::input name="password" type="password" id="password" />
</x-ds::form-group>

{{-- Inline (label à gauche) --}}
<x-ds::form-group label="Actif" for="active" inline>
    <x-ds::toggle name="active" />
</x-ds::form-group>
```

| Prop | Type | Description |
|---|---|---|
| `label` | string | Label du champ |
| `for` | string | Correspond à l'`id` du champ |
| `hint` | string | Texte d'aide |
| `error` | string | Message d'erreur |
| `required` | bool | Affiche un `*` rouge |
| `inline` | bool | Label et champ côte à côte |

---

### FormSection

Section de formulaire avec titre et description.

```blade
<x-ds::form-section title="Informations personnelles" description="Ces informations seront visibles publiquement.">
    <x-ds::input name="name" label="Nom complet" />
    <x-ds::input name="email" label="Email" type="email" />
</x-ds::form-section>
```

| Prop | Type | Description |
|---|---|---|
| `title` | string | Titre de la section |
| `description` | string | Description optionnelle |

---

### InputGroup

Groupe input avec addons collés (préfixe/suffixe).

```blade
<x-ds::input-group>
    <x-slot:prefix>https://</x-slot:prefix>
    <x-ds::input name="domain" placeholder="monsite.com" />
    <x-slot:suffix>.fr</x-slot:suffix>
</x-ds::input-group>
```

---

## Composants — Mise en page

### Card

Conteneur de contenu avec variantes visuelles. Les sous-composants `CardHeader`, `CardBody` et `CardFooter` facilitent une structure cohérente.

```blade
{{-- Simple --}}
<x-ds::card>
    Contenu libre
</x-ds::card>

{{-- Avec sous-composants --}}
<x-ds::card variant="elevated">
    <x-ds::card-header title="Titre" description="Description courte">
        <x-slot:actions>
            <x-ds::button size="sm">Action</x-ds::button>
        </x-slot:actions>
    </x-ds::card-header>
    <x-ds::card-body>
        Contenu principal
    </x-ds::card-body>
    <x-ds::card-footer align="right">
        <x-ds::button variant="outline">Annuler</x-ds::button>
        <x-ds::button>Confirmer</x-ds::button>
    </x-ds::card-footer>
</x-ds::card>
```

**Card — props :**

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `variant` | string | `bordered` | `bordered` `elevated` `flat` `ghost` |
| `padding` | string | `md` | `none` `sm` `md` `lg` |
| `rounded` | string | `xl` | `none` `md` `lg` `xl` `2xl` |
| `hover` | bool | `false` | Effet de levée au survol |
| `shadow` | string | `none` | `none` `sm` `md` `lg` |
| `color` | string | — | Teinte de fond colorée |

**CardHeader — props :**

| Prop | Type | Description |
|---|---|---|
| `title` | string | Titre de la carte |
| `description` | string | Sous-titre |
| `padding` | string | `md` par défaut |
| `separator` | bool | Bordure inférieure |
| `$actions` | slot | Actions (boutons) alignées à droite |

**CardFooter — props :**

| Prop | Type | Description |
|---|---|---|
| `align` | string | `left` `center` `right` |
| `separator` | bool | Bordure supérieure |

---

### Container

Conteneur centré avec largeur maximale.

```blade
<x-ds::container size="lg">
    <p>Contenu centré</p>
</x-ds::container>
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `size` | string | `xl` | `sm` `md` `lg` `xl` `2xl` `full` |
| `center` | bool | `true` | Centrage horizontal |
| `padding` | bool | `true` | Padding horizontal |

---

### Section

Section de page avec titre et description.

```blade
<x-ds::section title="Nos fonctionnalités" description="Tout ce dont vous avez besoin.">
    <!-- contenu -->
</x-ds::section>
```

| Prop | Type | Description |
|---|---|---|
| `title` | string | Titre affiché au-dessus du slot |
| `description` | string | Sous-titre |
| `padding` | string | Espacement vertical |
| `align` | string | `left` `center` `right` |

---

### Stack & Inline

Composants de mise en page flexbox.

```blade
{{-- Vertical (column) --}}
<x-ds::stack gap="4">
    <p>Ligne 1</p>
    <p>Ligne 2</p>
</x-ds::stack>

{{-- Horizontal (row) --}}
<x-ds::inline gap="2" align="center" justify="between">
    <span>Gauche</span>
    <span>Droite</span>
</x-ds::inline>
```

**Stack — props :** `gap`, `align`

**Inline — props :** `gap`, `align`, `justify`, `wrap`

---

### Panel

Conteneur léger avec titre optionnel.

```blade
<x-ds::panel title="Résumé" color="info">
    Contenu du panneau
</x-ds::panel>
```

| Prop | Type | Description |
|---|---|---|
| `title` | string | Titre du panneau |
| `variant` | string | `default` `bordered` |
| `color` | string | Teinte de fond |
| `padding` | string | Espacement interne |

---

## Composants — Navigation

### Breadcrumb

Fil d'Ariane pour indiquer la position dans l'arborescence.

```blade
<x-ds::breadcrumb :items="[
    ['label' => 'Accueil',    'href' => '/'],
    ['label' => 'Utilisateurs','href' => '/users'],
    ['label' => 'Alice Dupont'],
]" />
```

| Prop | Type | Description |
|---|---|---|
| `items` | array | Tableau de `['label' => '...', 'href' => '...']` |
| `separator` | string | Séparateur (`/` par défaut) |
| `size` | string | `sm` `md` `lg` |

---

### Pagination

Pagination avancée avec calcul automatique des plages et ellipsis.

```blade
<x-ds::pagination
    :current-page="$currentPage"
    :total-pages="$totalPages"
    :per-page="$perPage"
    :total="$totalItems"
/>
```

> **Avec Livewire DataTable :** La pagination est gérée automatiquement par le composant `<livewire:ds::data-table>`.

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `current-page` | int | `1` | Page actuelle |
| `total-pages` | int | `1` | Nombre total de pages |
| `per-page` | int | `15` | Items par page (pour l'info) |
| `total` | int | `0` | Total d'items |
| `show-info` | bool | `true` | Affiche "X à Y de Z résultats" |
| `size` | string | `md` | `sm` `md` `lg` |

---

### Steps & Step

Indicateur d'étapes pour les formulaires multi-étapes ou onboarding.

```blade
<x-ds::steps>
    <x-ds::step number="1" title="Compte"    status="completed" />
    <x-ds::step number="2" title="Profil"    status="current" />
    <x-ds::step number="3" title="Paiement"  status="pending" />
    <x-ds::step number="4" title="Confirmation" status="pending" :last="true" />
</x-ds::steps>
```

> **Important :** Ajouter `:last="true"` au dernier `<x-ds::step>` pour ne pas afficher le connecteur.

**Steps — props :** `current`, `orientation` (`horizontal`/`vertical`), `color`, `size`

**Step — props :**

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `number` | int | `1` | Numéro affiché |
| `title` | string | — | Titre de l'étape |
| `description` | string | — | Sous-titre |
| `status` | string | `pending` | `pending` `current` `completed` |
| `icon` | string | — | Icône Heroicons (remplace le numéro) |
| `last` | bool | `false` | Supprime le connecteur après |

---

### Nav & NavItem

Composant de navigation (sidebar, onglets, menus).

```blade
<x-ds::nav orientation="vertical" variant="pills">
    <x-ds::nav-item href="/dashboard" icon="home" :active="request()->is('dashboard')">
        Tableau de bord
    </x-ds::nav-item>
    <x-ds::nav-item href="/users" icon="users" badge="12">
        Utilisateurs
    </x-ds::nav-item>
    <x-ds::nav-item href="/settings" icon="cog-6-tooth">
        Paramètres
    </x-ds::nav-item>
</x-ds::nav>
```

**Nav — props :** `orientation` (`horizontal`/`vertical`), `variant` (`default`/`pills`/`bordered`), `size`

**NavItem — props :**

| Prop | Type | Description |
|---|---|---|
| `href` | string | Lien de navigation |
| `active` | bool | État actif (style mis en évidence) |
| `icon` | string | Icône Heroicons |
| `badge` | string | Compteur affiché à droite |
| `disabled` | bool | Désactive le lien |

---

## Composants — Feedback

### Alert

Message d'alerte contextuel.

```blade
<x-ds::alert color="success" title="Enregistré !" dismissible>
    Vos modifications ont été sauvegardées.
</x-ds::alert>

<x-ds::alert color="danger" icon="exclamation-circle">
    Une erreur critique est survenue.
</x-ds::alert>

<x-ds::alert color="info" variant="solid">
    Nouvelle version disponible.
</x-ds::alert>
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `color` | string | `info` | `info` `success` `warning` `danger` `neutral` |
| `variant` | string | `soft` | `soft` `solid` `outline` `left-accent` |
| `title` | string | — | Titre en gras |
| `icon` | string | auto | Icône Heroicons (auto-sélectionnée par couleur) |
| `dismissible` | bool | `false` | Bouton de fermeture (Alpine) |

---

### Progress & ProgressBar

Barre de progression simple ou multi-segments.

```blade
{{-- Simple --}}
<x-ds::progress :value="65" color="success" show-value label="Upload" />

{{-- Animée --}}
<x-ds::progress :value="40" striped animated />

{{-- Multi-segments --}}
<x-ds::progress-bar :segments="[
    ['value' => 40, 'color' => 'success', 'label' => 'Complété'],
    ['value' => 20, 'color' => 'warning', 'label' => 'En cours'],
    ['value' => 10, 'color' => 'danger',  'label' => 'Erreur'],
]" />
```

**Progress — props :**

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `value` | int | `0` | Valeur actuelle |
| `max` | int | `100` | Valeur maximale |
| `color` | string | `primary` | |
| `size` | string | `md` | `xs` `sm` `md` `lg` |
| `label` | string | — | Label au-dessus |
| `show-value` | bool | `false` | Affiche le pourcentage |
| `striped` | bool | `false` | Motif rayé |
| `animated` | bool | `false` | Animation des rayures |

---

### Skeleton

Placeholder de chargement (shimmer effect).

```blade
{{-- Texte --}}
<x-ds::skeleton lines="3" />

{{-- Cercle (avatar) --}}
<x-ds::skeleton circle width="12" height="12" />

{{-- Bloc --}}
<x-ds::skeleton width="full" height="48" />

{{-- Carte complète --}}
<x-ds::card>
    <x-ds::skeleton circle width="10" height="10" />
    <x-ds::skeleton lines="2" />
</x-ds::card>
```

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `variant` | string | `default` | `default` `text` `circle` `rect` |
| `width` | string | — | Largeur (Tailwind : `32`, `full`, etc.) |
| `height` | string | — | Hauteur |
| `lines` | int | `1` | Nombre de lignes de texte |
| `circle` | bool | `false` | Forme circulaire |

---

### EmptyState

Message affiché quand une liste ou section est vide.

```blade
<x-ds::empty-state
    icon="inbox"
    title="Aucun résultat"
    description="Il n'y a rien ici pour le moment."
>
    <x-ds::button icon="plus">Créer le premier</x-ds::button>
</x-ds::empty-state>
```

| Prop | Type | Description |
|---|---|---|
| `title` | string | Titre principal |
| `description` | string | Message explicatif |
| `icon` | string | Icône Heroicons |
| `size` | string | `sm` `md` `lg` |

---

## Composants — Données

### Stat & StatGroup

Affichage de métriques clés avec tendance.

```blade
<x-ds::stat-group cols="4">
    <x-ds::stat
        label="Chiffre d'affaires"
        value="€ 42 850"
        trend="up"
        trend-value="+12.5%"
        icon="currency-euro"
        icon-color="success"
        description="vs. mois dernier"
    />
    <x-ds::stat
        label="Clients actifs"
        value="1 284"
        trend="down"
        trend-value="-3.2%"
        icon="users"
    />
</x-ds::stat-group>
```

**Stat — props :**

| Prop | Type | Description |
|---|---|---|
| `label` | string | Libellé de la métrique |
| `value` | string | Valeur principale |
| `trend` | string | `up` `down` `neutral` |
| `trend-value` | string | Variation affichée (ex. `+12%`) |
| `trend-color` | string | Couleur forcée de la tendance |
| `icon` | string | Icône Heroicons |
| `icon-color` | string | Couleur de fond de l'icône |
| `description` | string | Texte secondaire |

**StatGroup — props :** `cols` (1–4), `variant`

---

### Table

Tableau statique (données côté serveur sans interactivité Livewire).

```blade
<x-ds::table
    :columns="[
        ['key' => 'name',   'label' => 'Nom'],
        ['key' => 'email',  'label' => 'Email'],
        ['key' => 'status', 'label' => 'Statut', 'align' => 'center'],
    ]"
    :rows="$users"
    striped
    hoverable
    :caption="'Liste des ' . count($users) . ' utilisateurs'"
/>
```

| Prop | Type | Description |
|---|---|---|
| `columns` | array | `[['key', 'label', 'align']]` |
| `rows` | array | Tableau de données |
| `striped` | bool | Lignes alternées |
| `hoverable` | bool | Mise en évidence au survol |
| `bordered` | bool | Bordures de cellules |
| `compact` | bool | Espacement réduit |
| `responsive` | bool | Défilement horizontal sur mobile |
| `caption` | string | Légende du tableau |

> Pour un tableau **interactif** (tri, recherche, pagination), utiliser `<livewire:ds::data-table>`.

---

### Timeline & TimelineItem

Historique chronologique d'événements.

```blade
<x-ds::timeline>
    <x-ds::timeline-item
        date="21 mars 2026"
        title="Compte créé"
        description="Bienvenue sur la plateforme !"
        icon="user-plus"
        color="success"
    />
    <x-ds::timeline-item
        date="15 avril 2026"
        title="Premier achat"
        icon="shopping-cart"
        color="primary"
    />
    <x-ds::timeline-item
        date="Aujourd'hui"
        title="Abonnement Pro"
        icon="star"
        color="warning"
        :last="true"
    />
</x-ds::timeline>
```

**TimelineItem — props :**

| Prop | Type | Description |
|---|---|---|
| `date` | string | Date ou heure de l'événement |
| `title` | string | Titre |
| `description` | string | Détail |
| `icon` | string | Icône Heroicons |
| `color` | string | Couleur du point/icône |
| `last` | bool | `false` — supprime le connecteur |

---

### Code & CopyButton

Affichage de blocs de code avec coloration syntaxique et copie.

```blade
{{-- Bloc --}}
<x-ds::code language="php" copy>
composer require ds/ui
</x-ds::code>

{{-- Inline --}}
<p>Utilisez <x-ds::code inline>php artisan serve</x-ds::code> pour lancer le serveur.</p>

{{-- Bouton copier indépendant --}}
<x-ds::copy-button text="npm install ds/ui" />
```

**Code — props :**

| Prop | Type | Description |
|---|---|---|
| `language` | string | `bash` `php` `js` `html` `css` etc. |
| `inline` | bool | Affichage inline |
| `copy` | bool | Ajoute le bouton copier |

---

## Composants — Interactifs (Alpine.js)

### Dropdown & DropdownItem

Menu déroulant au clic ou au survol.

```blade
<x-ds::dropdown align="right">
    <x-slot:trigger>
        <x-ds::button icon-trailing="chevron-down">Options</x-ds::button>
    </x-slot:trigger>

    <x-ds::dropdown-item icon="pencil" href="/edit">Modifier</x-ds::dropdown-item>
    <x-ds::dropdown-item icon="arrow-path">Synchroniser</x-ds::dropdown-item>
    <x-ds::dropdown-item separator />
    <x-ds::dropdown-item icon="trash" danger>Supprimer</x-ds::dropdown-item>
</x-ds::dropdown>
```

**Dropdown — props :**

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `align` | string | `left` | `left` `right` `center` |
| `width` | string | `48` | Largeur en unités Tailwind |
| `arrow` | bool | `false` | Flèche décorative |
| `trigger` | slot | — | Élément déclencheur |

**DropdownItem — props :**

| Prop | Type | Description |
|---|---|---|
| `href` | string | Rend l'item comme `<a>` |
| `icon` | string | Icône Heroicons |
| `danger` | bool | Style rouge |
| `disabled` | bool | Désactivé |
| `separator` | bool | Affiche une ligne de séparation |

---

### Tooltip

Info-bulle affichée au survol.

```blade
<x-ds::tooltip text="Supprimer cet élément" position="top">
    <x-ds::button variant="ghost" color="danger" square icon="trash" />
</x-ds::tooltip>

<x-ds::tooltip text="Copier le lien" color="dark" arrow>
    <x-ds::copy-button text="https://example.com" />
</x-ds::tooltip>
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `text` | string | — | Contenu de l'info-bulle |
| `position` | string | `top` | `top` `bottom` `left` `right` |
| `color` | string | `dark` | `dark` `light` `primary` |
| `arrow` | bool | `false` | Flèche indicatrice |
| `delay` | int | `0` | Délai d'apparition en ms |

---

### Popover

Panneau contextuel plus riche qu'un tooltip.

```blade
<x-ds::popover title="Aide" position="bottom">
    <x-slot:trigger>
        <x-ds::button variant="ghost" square icon="question-mark-circle" />
    </x-slot:trigger>

    <p class="text-sm">Cliquez ici pour obtenir de l'aide.</p>
    <a href="/docs" class="text-blue-600 text-sm">Voir la documentation →</a>
</x-ds::popover>
```

| Prop | Type | Description |
|---|---|---|
| `position` | string | `top` `bottom` `left` `right` |
| `align` | string | `start` `center` `end` |
| `width` | string | Largeur en unités Tailwind |
| `title` | string | Titre du popover |

---

### Tabs & Tab

Système d'onglets avec trois variantes visuelles.

```blade
<x-ds::tabs
    :tabs="['Aperçu', 'Code', 'Tests']"
    variant="underline"
    default-tab="Aperçu"
>
    <x-ds::tab id="Aperçu">
        Contenu de l'aperçu
    </x-ds::tab>

    <x-ds::tab id="Code">
        <x-ds::code language="php" copy>echo "Hello";</x-ds::code>
    </x-ds::tab>

    <x-ds::tab id="Tests">
        Résultats des tests
    </x-ds::tab>
</x-ds::tabs>
```

**Tabs — props :**

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `tabs` | array | — | Liste des IDs/libellés d'onglets |
| `variant` | string | `underline` | `underline` `pills` `boxed` |
| `size` | string | `md` | `sm` `md` `lg` |
| `color` | string | `primary` | |
| `align` | string | `left` | `left` `center` `right` |
| `full` | bool | `false` | Onglets en pleine largeur |

**Tab — props :**

| Prop | Type | Description |
|---|---|---|
| `id` | string | Doit correspondre à une entrée de `tabs` |
| `label` | string | Libellé (si différent de l'id) |
| `icon` | string | Icône Heroicons |
| `badge` | string | Compteur |

---

### Accordion & AccordionItem

Contenu expandable/rétractable.

```blade
<x-ds::accordion>
    <x-ds::accordion-item title="Qu'est-ce que DS UI ?">
        DS UI est un système de design pour Laravel & Livewire.
    </x-ds::accordion-item>

    <x-ds::accordion-item title="Compatibilité" :open="true">
        Compatible avec Laravel 12, Livewire 4 et Tailwind CSS v4.
    </x-ds::accordion-item>

    <x-ds::accordion-item title="Licence" icon="shield-check">
        Licence MIT, utilisation libre.
    </x-ds::accordion-item>
</x-ds::accordion>
```

**Accordion — props :**

| Prop | Type | Description |
|---|---|---|
| `multiple` | bool | `false` — un seul item ouvert à la fois |
| `variant` | string | `default` `bordered` `flush` |

**AccordionItem — props :**

| Prop | Type | Description |
|---|---|---|
| `title` | string | En-tête de l'item |
| `open` | bool | Ouvert par défaut |
| `icon` | string | Icône Heroicons |
| `disabled` | bool | |

---

### Collapsible

Section repliable simple avec toggle.

```blade
<x-ds::collapsible label="Filtres avancés" icon="funnel">
    <div class="space-y-3 pt-3">
        <x-ds::input name="from" type="date" label="De" />
        <x-ds::input name="to"   type="date" label="À" />
    </div>
</x-ds::collapsible>
```

| Prop | Type | Description |
|---|---|---|
| `label` | string | Texte du bouton toggle |
| `open` | bool | Ouvert par défaut |
| `icon` | string | Icône Heroicons |

---

## Composants Livewire

Les composants Livewire sont interactifs et gèrent leur propre état serveur. Ils communiquent avec JavaScript via des événements du navigateur.

### Modal

Fenêtre modale contrôlée depuis PHP ou JavaScript.

```blade
{{-- Déclaration (dans le layout ou la page) --}}
<livewire:ds::modal modal-id="confirm-delete" title="Confirmer la suppression" size="sm">
    <p>Cette action est irréversible. Êtes-vous sûr ?</p>

    <x-slot:footer>
        <x-ds::button variant="outline" onclick="DsModal.close('confirm-delete')">
            Annuler
        </x-ds::button>
        <x-ds::button color="danger" wire:click="delete">
            Supprimer
        </x-ds::button>
    </x-slot:footer>
</livewire:ds::modal>

{{-- Déclencheur JS --}}
<x-ds::button onclick="DsModal.open('confirm-delete')">Supprimer</x-ds::button>

{{-- Déclencheur Livewire (depuis un autre composant) --}}
{{-- $this->dispatch('ds-modal-open:confirm-delete') --}}
```

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `modal-id` | string | `modal` | Identifiant unique de la modale |
| `size` | string | `md` | `sm` `md` `lg` `xl` `2xl` `full` |
| `title` | string | — | Titre dans l'en-tête |
| `description` | string | — | Sous-titre dans l'en-tête |
| `closeable` | bool | `true` | Fermeture via ×, Échap, ou clic extérieur |
| `backdrop` | bool | `true` | Fond obscurcissant |

**Slots :** `$header`, `$slot` (corps), `$footer`

**Événements écoutés :**
- `ds-modal-open:{modal-id}` — ouvre
- `ds-modal-close:{modal-id}` — ferme

---

### Drawer

Panneau coulissant depuis un bord de l'écran.

```blade
<livewire:ds::drawer drawer-id="user-drawer" title="Modifier l'utilisateur" position="right" size="lg">
    <x-ds::input name="name" label="Nom" />
    <x-ds::input name="email" label="Email" type="email" />

    <x-slot:footer>
        <x-ds::button variant="outline" onclick="DsDrawer.close('user-drawer')">
            Annuler
        </x-ds::button>
        <x-ds::button wire:click="save">Enregistrer</x-ds::button>
    </x-slot:footer>
</livewire:ds::drawer>

<x-ds::button onclick="DsDrawer.open('user-drawer')">Modifier</x-ds::button>
```

| Prop | Type | Défaut | Valeurs |
|---|---|---|---|
| `drawer-id` | string | `drawer` | Identifiant unique |
| `position` | string | `right` | `left` `right` `top` `bottom` |
| `size` | string | `md` | `sm` `md` `lg` `xl` `full` |
| `title` | string | — | Titre dans l'en-tête |
| `closeable` | bool | `true` | |
| `backdrop` | bool | `true` | |

**Slots :** `$header`, `$slot` (corps), `$footer`

**Événements écoutés :**
- `ds-drawer-open:{drawer-id}` — ouvre
- `ds-drawer-close:{drawer-id}` — ferme

---

### Toast

Gestionnaire de notifications flottantes. **Un seul** dans le layout suffit pour toute l'application.

```blade
{{-- Dans le layout --}}
<livewire:ds::toast />
```

**Déclencher depuis JavaScript :**
```js
DsToast.success('Enregistré !')
DsToast.error('Erreur de connexion', { title: 'Erreur réseau' })
DsToast.warning('Session expirée dans 5 minutes')
DsToast.info('Nouvelle version disponible', { duration: 0 }) // persistant
```

**Déclencher depuis Livewire PHP :**
```php
// Dans un composant Livewire
$this->dispatch('ds-toast', type: 'success', message: 'Enregistré !');
$this->dispatch('ds-toast', type: 'error', message: 'Erreur', title: 'Oops');
```

**Configuration dans `config/ds.php` :**
```php
'toast' => [
    'position' => 'bottom-right', // top-right|top-left|top-center|bottom-right|bottom-left|bottom-center
    'duration'  => 4000,           // ms (0 = pas d'auto-dismiss)
    'max'       => 5,              // nombre max simultané
],
```

**Types disponibles :** `success` `error` `warning` `info`

---

### DataTable

Tableau de données interactif avec recherche, tri, pagination et sélection multi-lignes.

```blade
<livewire:ds::data-table
    :columns="[
        ['key' => 'id',     'label' => '#',      'sortable' => true],
        ['key' => 'name',   'label' => 'Nom',    'sortable' => true],
        ['key' => 'email',  'label' => 'Email',  'sortable' => true],
        ['key' => 'status', 'label' => 'Statut', 'align' => 'center'],
    ]"
    :rows="$users->toArray()"
    :searchable="true"
    :selectable="true"
    empty-message="Aucun utilisateur trouvé."
    :per-page-options="[10, 25, 50, 100]"
    :per-page="25"
/>
```

**Définition des colonnes :**

```php
$columns = [
    [
        'key'      => 'name',   // Clé dans le tableau de données
        'label'    => 'Nom',    // En-tête
        'sortable' => true,     // Tri activé (défaut: false)
        'align'    => 'left',   // left|center|right (défaut: left)
    ],
];
```

**Définition des lignes :**

```php
$rows = [
    ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com', 'status' => 'Actif'],
    ['id' => 2, 'name' => 'Bob',   'email' => 'bob@example.com',   'status' => 'Inactif'],
];
```

**Props du composant :**

| Prop | Type | Défaut | Description |
|---|---|---|---|
| `columns` | array | `[]` | Définition des colonnes |
| `rows` | array | `[]` | Données à afficher |
| `searchable` | bool | `true` | Barre de recherche |
| `selectable` | bool | `false` | Checkboxes de sélection |
| `empty-message` | string | `No results found.` | Message quand vide |
| `per-page` | int | `15` | Items par page |
| `per-page-options` | array | `[10, 15, 25, 50, 100]` | Options du sélecteur |

**Propriétés Livewire accessibles :**
- `$search` — Terme de recherche actuel
- `$sortBy` / `$sortDir` — Tri actuel
- `$selected` — IDs des lignes sélectionnées
- `$perPage` — Items par page

---

### CommandPalette

Palette de commandes style Spotlight/Linear accessible via `Cmd+K`.

```blade
{{-- Dans le layout --}}
<livewire:ds::command-palette :commands="[
    [
        'id'          => 'new-post',
        'label'       => 'Créer un article',
        'description' => 'Rédiger un nouvel article de blog',
        'icon'        => 'document-plus',
        'action'      => 'navigate-to-new-post',
        'shortcut'    => '⌘N',
    ],
    [
        'id'     => 'dashboard',
        'label'  => 'Tableau de bord',
        'icon'   => 'home',
        'action' => 'navigate-to-dashboard',
        'badge'  => 'Nav',
    ],
]" />
```

**Structure d'une commande :**

| Clé | Type | Description |
|---|---|---|
| `id` | string | Identifiant unique |
| `label` | string | Libellé principal affiché |
| `description` | string | Description secondaire |
| `icon` | string | Icône Heroicons |
| `action` | string | Nom de l'événement Livewire dispatché à l'exécution |
| `shortcut` | string | Raccourci affiché (ex. `⌘K`) |
| `badge` | string | Badge de catégorie |

**Déclencher depuis JS :**
```js
DsCommandPalette.open()   // Cmd/Ctrl+K le fait automatiquement
DsCommandPalette.close()
```

**Écouter les actions dans un composant Livewire :**
```php
protected function getListeners(): array
{
    return [
        'navigate-to-new-post' => 'redirectToNewPost',
    ];
}

public function redirectToNewPost(): void
{
    $this->redirect('/posts/new');
}
```

---

## Personnalisation & Thèmes

### Changer la couleur primaire

```php
// config/ds.php
'tokens' => [
    // Violet
    'primary-h' => '263',
    'primary-s' => '70%',
    'primary-l' => '50%',
],
```

### Modifier les arrrondis globaux

```php
'tokens' => [
    'radius-sm'  => '0',      // Aucun arrondi
    'radius-md'  => '0.125rem',
    'radius-lg'  => '0.25rem',
    'radius-xl'  => '0.375rem',
    'radius-2xl' => '0.5rem',
],
```

### Changer la police

```php
'tokens' => [
    'font-sans' => "'Inter', ui-sans-serif, system-ui, sans-serif",
],
```

### Surcharger les valeurs par défaut des composants

```php
// config/ds.php
'defaults' => [
    'button' => ['variant' => 'outline', 'color' => 'neutral', 'size' => 'sm'],
    'badge'  => ['variant' => 'solid',   'color' => 'neutral', 'size' => 'xs'],
    'input'  => ['variant' => 'filled',  'size' => 'lg'],
    'card'   => ['variant' => 'elevated','padding' => 'lg'],
    'modal'  => ['size' => 'lg', 'closeable' => true],
    'drawer' => ['position' => 'left', 'size' => 'sm'],
],
```

### Publier et personnaliser les vues

```bash
php artisan vendor:publish --tag=ds-views
```

Les vues sont copiées dans `resources/views/vendor/ds/`. Laravel les charge en priorité sur les vues du package.

---

## Mode sombre

Le mode sombre est géré nativement par Tailwind CSS via les classes `dark:*`. La configuration dans `config/ds.php` permet de définir le comportement :

```php
'theme' => 'system', // 'light' | 'dark' | 'system'
```

- `system` — suit la préférence système de l'utilisateur (`prefers-color-scheme`)
- `light` — force le mode clair
- `dark` — force le mode sombre

**Activer le toggle manuellement :**

```blade
<button
    x-data
    x-on:click="
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light')
    ">
    <flux:icon.moon class="h-5 w-5" />
</button>
```

**Restaurer la préférence au chargement** (dans le `<head>`) :

```html
<script>
    if (localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    }
</script>
```

---

## Classes d'animation CSS

Le design system expose des classes d'animation prêtes à l'emploi :

| Classe | Effet |
|---|---|
| `ds-animate-fade-in` | Fondu entrant |
| `ds-animate-scale-in` | Zoom entrant (modales) |
| `ds-animate-slide-up` | Glissement depuis le bas (toasts) |
| `ds-animate-slide-right` | Glissement depuis la droite (drawers) |
| `ds-animate-slide-left` | Glissement depuis la gauche |

---

## Palettes de couleurs

| Couleur | Alias Tailwind | Usage recommandé |
|---|---|---|
| `primary` | `blue-*` | Actions principales, CTA |
| `secondary` | `violet-*` | Actions secondaires |
| `success` | `emerald-*` | Confirmations, états valides |
| `warning` | `amber-*` | Avertissements |
| `danger` | `red-*` | Erreurs, destructions |
| `info` | `sky-*` | Informations neutres |
| `neutral` | `zinc-*` | Éléments de structure |

---

## Page de démonstration

Toutes les variantes de composants sont visibles sur la page de démonstration :

```
/design-system
```

La route est définie dans `routes/web.php` :

```php
Route::get('/design-system', fn () => view('pages.design-system'))->name('design-system');
```
