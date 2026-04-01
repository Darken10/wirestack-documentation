# Configuration

Après publication (`php artisan vendor:publish --tag=ws-config`), le fichier `config/ws.php` est disponible dans votre application.

---

## Référence complète

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Préfixe des composants
    |--------------------------------------------------------------------------
    | Préfixe utilisé dans les templates Blade.
    | Défaut : <x-ws::button> / <livewire:ws::data-table>
    |
    | Vous pouvez le changer en 'ui', 'ds', ou tout autre alias court.
    */

    'prefix' => 'ws',

    /*
    |--------------------------------------------------------------------------
    | Thème par défaut
    |--------------------------------------------------------------------------
    | 'light'  — Force le mode clair
    | 'dark'   — Force le mode sombre
    | 'system' — Suit la préférence système (prefers-color-scheme)
    */

    'theme' => 'system',

    /*
    |--------------------------------------------------------------------------
    | Design Tokens
    |--------------------------------------------------------------------------
    | Ces valeurs sont converties en variables CSS et injectées dans <head>
    | via la directive @wsStyles. Ils constituent le système de design global.
    */

    'tokens' => [

        // Couleur primaire (valeurs HSL séparées)
        'primary-h'   => '221',     // Teinte (Hue)   : 0–360
        'primary-s'   => '83%',     // Saturation     : 0%–100%
        'primary-l'   => '53%',     // Luminosité     : 0%–100%

        // Échelle de rayons (border-radius)
        'radius-sm'   => '0.25rem',
        'radius-md'   => '0.375rem',
        'radius-lg'   => '0.5rem',
        'radius-xl'   => '0.75rem',
        'radius-2xl'  => '1rem',
        'radius-full' => '9999px',

        // Typographie
        'font-sans'   => "'Instrument Sans', ui-sans-serif, system-ui, sans-serif",

        // Vitesses de transition
        'transition-fast'   => '100ms ease',
        'transition-normal' => '180ms ease',
        'transition-slow'   => '300ms ease',

        // Ombres
        'shadow-sm' => '0 1px 2px 0 rgb(0 0 0 / .05)',
        'shadow-md' => '0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1)',
        'shadow-lg' => '0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1)',
        'shadow-xl' => '0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Valeurs par défaut des composants
    |--------------------------------------------------------------------------
    | Définissez les props par défaut pour chaque composant.
    | Celles-ci sont fusionnées avec les props passées en template.
    | Une prop explicite dans le template prend toujours la priorité.
    */

    'defaults' => [
        'button'   => ['variant' => 'solid',    'color' => 'primary', 'size' => 'md'],
        'badge'    => ['variant' => 'soft',     'color' => 'primary', 'size' => 'sm'],
        'avatar'   => ['size'    => 'md',       'shape' => 'circle'],
        'input'    => ['variant' => 'bordered', 'size'  => 'md'],
        'card'     => ['variant' => 'bordered', 'padding' => 'md'],
        'alert'    => ['variant' => 'soft',     'color' => 'info'],
        'modal'    => ['size'    => 'md'],
        'drawer'   => ['position' => 'right',   'size' => 'md'],
        'table'    => ['striped' => false,      'hoverable' => true],
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuration des Toasts
    |--------------------------------------------------------------------------
    */

    'toast' => [
        // Position sur l'écran
        // Valeurs : top-right | top-left | top-center
        //           bottom-right | bottom-left | bottom-center
        'position' => 'bottom-right',

        // Durée d'affichage en millisecondes (0 = pas d'auto-dismiss)
        'duration'  => 4000,

        // Nombre maximum de toasts visibles simultanément
        'max'       => 5,
    ],

];
```

---

## Exemples de personnalisation

### Changer le préfixe

```php
'prefix' => 'ui',
// Résultat : <x-ui::button>, <livewire:ui::modal>
```

### Thème sombre forcé

```php
'theme' => 'dark',
```

### Couleur primaire violette

```php
'tokens' => [
    'primary-h' => '263',
    'primary-s' => '70%',
    'primary-l' => '50%',
],
```

### Arrrondis agressifs (design "pill")

```php
'tokens' => [
    'radius-sm'  => '9999px',
    'radius-md'  => '9999px',
    'radius-lg'  => '9999px',
    'radius-xl'  => '9999px',
],
```

### Arrrondis plats (design "sharp")

```php
'tokens' => [
    'radius-sm'  => '0',
    'radius-md'  => '0',
    'radius-lg'  => '0',
    'radius-xl'  => '0',
    'radius-2xl' => '0',
],
```

### Boutons outline par défaut

```php
'defaults' => [
    'button' => ['variant' => 'outline', 'color' => 'neutral', 'size' => 'sm'],
],
```

### Toasts en haut à droite, persistants

```php
'toast' => [
    'position' => 'top-right',
    'duration'  => 0,    // 0 = l'utilisateur doit fermer manuellement
    'max'       => 3,
],
```
