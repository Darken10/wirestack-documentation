# Directives Blade

Wirestack UI expose deux directives Blade à placer dans votre layout principal.

---

## @wsStyles

**À placer dans le `<head>`.**

Injecte un bloc `<style>` contenant toutes les variables CSS (design tokens) définies dans `config/ws.php` :

```blade
<head>
    @wsStyles
    @vite(['resources/css/app.css'])
</head>
```

**Sortie générée :**

```html
<style>
    :root {
        --ws-primary-h: 221;
        --ws-primary-s: 83%;
        --ws-primary-l: 53%;
        --ws-radius-sm: 0.25rem;
        --ws-radius-md: 0.375rem;
        --ws-radius-lg: 0.5rem;
        --ws-radius-xl: 0.75rem;
        --ws-radius-2xl: 1rem;
        --ws-radius-full: 9999px;
        --ws-font-sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
        --ws-transition-fast: 100ms ease;
        --ws-transition-normal: 180ms ease;
        --ws-transition-slow: 300ms ease;
        --ws-shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --ws-shadow-md:
            0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --ws-shadow-lg:
            0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --ws-shadow-xl:
            0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    }
</style>
```

---

## @wsScripts

**À placer juste avant `</body>`.**

Injecte un bloc `<script>` contenant les helpers JavaScript globaux du package :

```blade
<body>
    {{ $slot }}
    @wsScripts
</body>
```

**Helpers disponibles après injection :**

| Objet global       | Description                             |
| ------------------ | --------------------------------------- |
| `DsToast`          | Déclencher des notifications flottantes |
| `DsModal`          | Ouvrir / fermer une modale par son ID   |
| `DsDrawer`         | Ouvrir / fermer un drawer par son ID    |
| `DsCommandPalette` | Ouvrir / fermer la palette de commandes |
| `DsCopy`           | Copier du texte dans le presse-papiers  |

Voir [API JavaScript](javascript-api.md) pour la documentation complète de chaque helper.

---

## Exemple de layout complet

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    {{-- 1. Design tokens en premier --}}
    @wsStyles

    {{-- 2. Vite compile app.css (qui importe Tailwind) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

    {{ $slot }}

    {{-- Composants Livewire globaux --}}
    <livewire:ws::toast />

    {{-- 3. Helpers JS en dernier --}}
    @wsScripts

</body>
</html>
```
