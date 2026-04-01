# Installation

## Prérequis

| Dépendance   | Version minimum        |
| ------------ | ---------------------- |
| PHP          | 8.2                    |
| Laravel      | 11.0 ou 12.0           |
| Livewire     | 4.0                    |
| Tailwind CSS | v4 (recommandé)        |
| Alpine.js    | inclus avec Livewire 4 |

---

## 1. Installer via Composer

```bash
composer require darken10/wirestack
```

Le service provider est auto-découvert par Laravel. Aucune déclaration manuelle n'est nécessaire.

---

## 2. Intégrer les assets CSS

Dans `resources/css/app.css`, importez la feuille de styles du package pour que Tailwind CSS scanne les vues du package :

```css
/* resources/css/app.css */
@import "tailwindcss";

/* Scanner les vues et classes PHP du package pour Tailwind */
@source "../../vendor/darken10/wirestack/resources/views/**/*.blade.php";
@source "../../vendor/darken10/wirestack/src/**/*.php";
```

> Si vous utilisez Wirestack en **développement local** (chemin `packages/`), remplacez les source paths par :
>
> ```css
> @source "../../packages/wirestack/resources/views/**/*.blade.php";
> @source "../../packages/wirestack/src/**/*.php";
> ```

---

## 3. Ajouter les directives dans le layout

Ajoutez `@wsStyles` dans le `<head>` et `@wsScripts` juste avant `</body>` :

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    @wsStyles {{-- Injecte les variables CSS (design tokens) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100">

    {{ $slot }}

    <livewire:ws::toast />  {{-- Gestionnaire de notifications (une seule fois) --}}

    @wsScripts {{-- Injecte les helpers JS --}}
</body>
</html>
```

---

## 4. Installer les composants Livewire globaux (optionnel)

Pour utiliser la CommandPalette globalement sur toutes les pages :

```blade
<body>
    {{ $slot }}

    <livewire:ws::toast />
    <livewire:ws::command-palette :commands="[]" />

    @wsScripts
</body>
```

---

## 5. Publier les assets (optionnel)

### Fichier de configuration

```bash
php artisan vendor:publish --tag=ws-config
```

Crée `config/ws.php`. Voir [Configuration](configuration.md) pour le détail.

### Vues (pour personnalisation)

```bash
php artisan vendor:publish --tag=ws-views
```

Copie toutes les vues Blade dans `resources/views/vendor/ws/`. Laravel les charge en priorité sur celles du package.

### Assets compilés CSS / JS

```bash
php artisan vendor:publish --tag=ws-assets
```

Copie les assets dans `public/vendor/ws/`. Utile si vous ne souhaitez pas utiliser Vite.

---

## Installation en développement local (monorepo)

Si vous développez le package dans le même dépôt que votre application :

**`composer.json` de l'application :**

```json
{
  "repositories": [
    {
      "type": "path",
      "url": "./packages/wirestack",
      "options": { "symlink": true }
    }
  ],
  "require": {
    "darken10/wirestack": "0.0.1-dev"
  }
}
```

```bash
composer install
```

**`resources/css/app.css` :**

```css
@source "../../packages/wirestack/resources/views/**/*.blade.php";
@source "../../packages/wirestack/src/**/*.php";
```

---

## Vérification

Après installation, testez avec ce snippet minimal dans une vue :

```blade
<x-ws::button color="primary">
    Wirestack UI fonctionne !
</x-ws::button>

<x-ws::alert color="success">
    Installation réussie.
</x-ws::alert>
```

Si les styles ne s'affichent pas, relancez Vite :

```bash
npm run dev
# ou pour la production
npm run build
```
