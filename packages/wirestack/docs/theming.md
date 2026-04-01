# Thèmes & Mode sombre

---

## Mode sombre

Tous les composants Wirestack UI intègrent le mode sombre nativement via les classes `dark:` de Tailwind CSS. Aucune configuration supplémentaire n'est requise pour bénéficier du mode sombre.

### Configuration du thème par défaut

Dans `config/ws.php` :

```php
'theme' => 'system', // 'light' | 'dark' | 'system'
```

| Valeur     | Comportement                              |
| ---------- | ----------------------------------------- |
| `'system'` | Suit `prefers-color-scheme` du navigateur |
| `'light'`  | Force le mode clair                       |
| `'dark'`   | Force le mode sombre                      |

---

## Activer le dark mode dans Tailwind CSS v4

Tailwind CSS v4 utilise la stratégie `class` par défaut. Assurez-vous que la classe `dark` est présente sur `<html>` quand le mode sombre est actif.

### Restauration de la préférence au chargement

Ajoutez ce script **dans le `<head>`**, avant le CSS, pour éviter le flash :

```html
<script>
    (function () {
        const stored = localStorage.getItem("ws-theme");
        const prefersDark = window.matchMedia(
            "(prefers-color-scheme: dark)",
        ).matches;

        if (stored === "dark" || (!stored && prefersDark)) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    })();
</script>
```

### Toggle manuel

```blade
<button
    x-data
    x-on:click="
        const isDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('ws-theme', isDark ? 'dark' : 'light');
    "
    class="p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800"
    title="Changer de thème"
>
    {{-- Icône soleil (visible en mode sombre) --}}
    <svg class="hidden dark:block h-5 w-5 text-zinc-300" ...>...</svg>
    {{-- Icône lune (visible en mode clair) --}}
    <svg class="block dark:hidden h-5 w-5 text-zinc-700" ...>...</svg>
</button>
```

---

## Personnalisation avancée

### Changer la couleur primaire

La couleur primaire est définie en HSL et utilisée automatiquement comme couleur d'accent dans tous les composants :

```php
// config/ws.php
'tokens' => [
    // Violet (SaaS moderne)
    'primary-h' => '263',
    'primary-s' => '70%',
    'primary-l' => '50%',
],
```

| Couleur       | H   | S   | L   |
| ------------- | --- | --- | --- |
| Bleu (défaut) | 221 | 83% | 53% |
| Violet        | 263 | 70% | 50% |
| Vert émeraude | 160 | 84% | 39% |
| Orange        | 25  | 95% | 53% |
| Rouge rubis   | 0   | 84% | 60% |
| Rose          | 330 | 81% | 60% |
| Indigo        | 239 | 84% | 67% |

### Modifier les rayons globaux

```php
// Design "pill" — tout en arrondi
'tokens' => [
    'radius-sm'  => '9999px',
    'radius-md'  => '9999px',
    'radius-lg'  => '9999px',
    'radius-xl'  => '9999px',
    'radius-2xl' => '9999px',
],

// Design "sharp" — aucun arrondi (look enterprise)
'tokens' => [
    'radius-sm'  => '0',
    'radius-md'  => '0',
    'radius-lg'  => '0',
    'radius-xl'  => '0',
    'radius-2xl' => '0',
],
```

### Changer la police

```php
'tokens' => [
    // Inter — très utilisé dans les SaaS
    'font-sans' => "'Inter', ui-sans-serif, system-ui, sans-serif",

    // Geist — style Vercel
    'font-sans' => "'Geist', ui-sans-serif, system-ui, sans-serif",

    // Système natif — zéro chargement
    'font-sans' => "ui-sans-serif, system-ui, -apple-system, sans-serif",
],
```

### Surcharger les défauts de composants

```php
'defaults' => [
    // Boutons doux partout
    'button' => ['variant' => 'soft', 'color' => 'neutral', 'size' => 'md'],

    // Badges solides
    'badge'  => ['variant' => 'solid', 'color' => 'primary'],

    // Inputs avec fond coloré
    'input'  => ['variant' => 'filled', 'size' => 'md'],

    // Cards avec ombre plutôt que bordure
    'card'   => ['variant' => 'elevated', 'padding' => 'lg'],
],
```

---

## Surcharger les vues

Pour personnaliser un composant spécifique sans forker le package :

```bash
php artisan vendor:publish --tag=ws-views
```

Les vues sont copiées dans `resources/views/vendor/ws/`. Modifiez uniquement les fichiers dont vous avez besoin. Laravel les charge en priorité sur les vues originales.

**Exemple — personnaliser le bouton :**

```
resources/views/vendor/ws/components/button.blade.php
```

Remplacer uniquement les classes qui vous intéressent, en conservant les variables PHP (`$variant`, `$color`, etc.) fournies par la classe PHP du composant.

---

## Classes d'animation

Le design system expose des classes d'animation CSS prêtes à l'emploi :

| Classe                   | Effet                                 |
| ------------------------ | ------------------------------------- |
| `ws-animate-fade-in`     | Fondu entrant                         |
| `ws-animate-scale-in`    | Zoom entrant (modales)                |
| `ws-animate-slide-up`    | Glissement depuis le bas (toasts)     |
| `ws-animate-slide-right` | Glissement depuis la droite (drawers) |
| `ws-animate-slide-left`  | Glissement depuis la gauche           |

Ces classes sont définies dans le fichier CSS du package et disponibles sans configuration supplémentaire.
