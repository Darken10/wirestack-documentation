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

### Pourquoi cette étape ?

Wirestack fournit des composants Livewire avec leurs propres styles Tailwind CSS. Pour que Tailwind CSS génère automatiquement tous les styles utilisés dans ces composants, il doit **scanner les fichiers du package**.

Sans cette configuration, les classes Tailwind des composants Wirestack ne seront pas générées, et l'interface ne s'affichera pas correctement.

### Configuration

Ouvrez `resources/css/app.css` et ajoutez les directives `@source` pour que Tailwind scanne les vues et le code PHP du package :

```css
/* resources/css/app.css */
@import "tailwindcss";

/* Scanner les vues Blade et classes PHP du package Wirestack pour Tailwind */
@source "../../vendor/darken10/wirestack/resources/views/**/*.blade.php";
@source "../../vendor/darken10/wirestack/src/**/*.php";
```

### Ce que cela fait

- `@import "tailwindcss"` : Importe le framework Tailwind CSS
- `@source "...views/**/*.blade.php"` : Demande à Tailwind de scanner tous les fichiers Blade du package pour détecter les classes utilisées
- `@source "...src/**/*.php"` : Demande à Tailwind de scanner les fichiers PHP du package (certains attributs HTML de classe peuvent être générés dynamiquement)

Tailwind générera **uniquement** les styles pour les classes qu'il détecte, ce qui assure un CSS optimal et sans perte de style.

### Pour le développement local (monorepo)

Si vous développez Wirestack dans le même dépôt (dossier `packages/wirestack/`), remplacez les chemins ci-dessus. Les chemins relatifs doivent pointer vers votre dossier local :

```css
/* resources/css/app.css */
@import "tailwindcss";

/* Utiliser le chemin local du package en développement */
@source "../../packages/wirestack/resources/views/**/*.blade.php";
@source "../../packages/wirestack/src/**/*.php";
```

> **Important** : Utilisez les chemins avec `vendor/` **après** la publication du package, et les chemins `packages/` **uniquement en développement local**. Assurez-vous que les chemins correspondent à votre structure de répertoires.

---

## Configuration recommandée et dépannage

### Prérequis détaillés

- PHP >= 8.2 et dépendances Composer installées
- Laravel 10/11/12 (Wirestack supporte Laravel 10+)
- Livewire 3+ ou 4+ selon votre projet
- Tailwind CSS v3/v4 recommandé — assurez-vous d'avoir `node` et `npm`/`pnpm` installés

### Commandes utiles

```bash
composer install
npm install
npm run dev
```

### Exemple : `tailwind.config.js`

Ajoutez les chemins du package au champ `content` pour que Tailwind scanne les vues et le code PHP du package :

```js
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
    "../../vendor/darken10/wirestack/resources/views/**/*.blade.php",
    "../../vendor/darken10/wirestack/src/**/*.php",
  ],
  theme: { extend: {} },
  plugins: [],
};
```

Remplacez les chemins par `../../packages/wirestack/...` si vous travaillez en monorepo (développement local).

### Dépannage rapide

- Erreur Vite / manifest : exécutez `npm run build` ou `npm run dev` puis rechargez la page.
- Après modification des chemins Tailwind, videz le cache des vues et relancez le serveur dev :

```bash
php artisan view:clear && npm run dev
```

- Si les styles du package n'apparaissent pas, vérifiez que les chemins relatifs dans `resources/css/app.css` ou `tailwind.config.js` pointent bien vers `vendor/darken10/wirestack` ou `packages/wirestack`.

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
