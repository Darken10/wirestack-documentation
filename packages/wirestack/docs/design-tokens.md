# Design Tokens

Les design tokens sont des **variables CSS globales** injectées dans `<head>` via la directive `@wsStyles`. Ils permettent de modifier l'apparence de l'ensemble du système de design sans toucher aux composants.

---

## Comment ça fonctionne

`@wsStyles` génère un bloc `<style>` contenant les variables CSS définies dans `config/ws.php` :

```html
<style>
    :root {
        --ws-primary-h: 221;
        --ws-primary-s: 83%;
        --ws-primary-l: 53%;
        --ws-radius-sm: 0.25rem;
        --ws-radius-md: 0.375rem;
        /* ... */
    }
</style>
```

Les composants du package utilisent ces variables en interne. Modifier une valeur dans `config/ws.php` suffit à répercuter le changement partout.

---

## Tableau de référence

### Couleur primaire

| Token            | Défaut | Description                                   |
| ---------------- | ------ | --------------------------------------------- |
| `--ws-primary-h` | `221`  | Teinte (Hue) de la couleur primaire — 0 à 360 |
| `--ws-primary-s` | `83%`  | Saturation — 0% à 100%                        |
| `--ws-primary-l` | `53%`  | Luminosité — 0% à 100%                        |

> La couleur primaire est exprimée en **HSL** (Hue, Saturation, Lightness) pour permettre la génération automatique des nuances claires et sombres.

### Rayons (border-radius)

| Token              | Défaut     | Utilisation                     |
| ------------------ | ---------- | ------------------------------- |
| `--ws-radius-sm`   | `0.25rem`  | Petits éléments (badges, chips) |
| `--ws-radius-md`   | `0.375rem` | Inputs, boutons                 |
| `--ws-radius-lg`   | `0.5rem`   | Panels, dropdowns               |
| `--ws-radius-xl`   | `0.75rem`  | Cards, modales                  |
| `--ws-radius-2xl`  | `1rem`     | Grandes surfaces                |
| `--ws-radius-full` | `9999px`   | Pilules, avatars ronds          |

### Typographie

| Token            | Défaut                                                    | Description       |
| ---------------- | --------------------------------------------------------- | ----------------- |
| `--ws-font-sans` | `'Instrument Sans', ui-sans-serif, system-ui, sans-serif` | Police principale |

### Transitions

| Token                    | Défaut       | Utilisation                         |
| ------------------------ | ------------ | ----------------------------------- |
| `--ws-transition-fast`   | `100ms ease` | Survols, changements d'état rapides |
| `--ws-transition-normal` | `180ms ease` | Animations standard                 |
| `--ws-transition-slow`   | `300ms ease` | Modales, drawers                    |

### Ombres

| Token            | Défaut                                  | Utilisation        |
| ---------------- | --------------------------------------- | ------------------ |
| `--ws-shadow-sm` | `0 1px 2px 0 rgb(0 0 0 / .05)`          | Léger relief       |
| `--ws-shadow-md` | `0 4px 6px -1px rgb(0 0 0 / .1), ...`   | Cards, dropdowns   |
| `--ws-shadow-lg` | `0 10px 15px -3px rgb(0 0 0 / .1), ...` | Modales, drawers   |
| `--ws-shadow-xl` | `0 20px 25px -5px rgb(0 0 0 / .1), ...` | Éléments flottants |

---

## Palettes de couleurs

Le système utilise les couleurs sémantiques suivantes, mappées sur les palettes Tailwind :

| Alias sémantique | Palette Tailwind | Usage recommandé                        |
| ---------------- | ---------------- | --------------------------------------- |
| `primary`        | `blue-*`         | Actions principales, CTA                |
| `secondary`      | `violet-*`       | Actions secondaires                     |
| `success`        | `emerald-*`      | Confirmations, états valides            |
| `warning`        | `amber-*`        | Avertissements, attention               |
| `danger`         | `red-*`          | Erreurs, actions destructives           |
| `info`           | `sky-*`          | Informations neutres                    |
| `neutral`        | `zinc-*`         | Éléments de structure, états par défaut |

---

## Exemples de thèmes

### Vert émeraude (nature)

```php
'tokens' => [
    'primary-h' => '160',
    'primary-s' => '84%',
    'primary-l' => '39%',
],
```

### Orange (énergie)

```php
'tokens' => [
    'primary-h' => '25',
    'primary-s' => '95%',
    'primary-l' => '53%',
],
```

### Rouge rubis

```php
'tokens' => [
    'primary-h' => '0',
    'primary-s' => '84%',
    'primary-l' => '60%',
],
```

### Violette (tech/SaaS)

```php
'tokens' => [
    'primary-h' => '263',
    'primary-s' => '70%',
    'primary-l' => '50%',
],
```

### Rose (lifestyle)

```php
'tokens' => [
    'primary-h' => '330',
    'primary-s' => '81%',
    'primary-l' => '60%',
],
```

---

## Surcharger les tokens en CSS

Vous pouvez également surcharger les tokens directement dans votre CSS, après l'import :

```css
/* resources/css/app.css */
@import "tailwindcss";
@source "../../vendor/wirestack/ui/resources/views/**/*.blade.php";

:root {
    --ws-primary-h: 263;
    --ws-primary-s: 70%;
    --ws-primary-l: 50%;
    --ws-font-sans: "Inter", ui-sans-serif, system-ui, sans-serif;
}
```

> **Attention :** Les tokens définis via `config/ws.php` et `@wsStyles` seront injectés dans `<head>` et **prendront la priorité** sur ceux définis dans un fichier CSS chargé via `<link>`. Si vous préférez surcharger en CSS, désactivez `@wsStyles` et gérez les tokens manuellement.
