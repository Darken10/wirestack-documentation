<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Design System Prefix
    |--------------------------------------------------------------------------
    | The component prefix used in Blade templates.
    | Default: <x-ds::button> / <livewire:ds::data-table>
    */

    'prefix' => 'ds',

    /*
    |--------------------------------------------------------------------------
    | Default Theme
    |--------------------------------------------------------------------------
    | 'light' | 'dark' | 'system'
    */

    'theme' => 'system',

    /*
    |--------------------------------------------------------------------------
    | Design Tokens
    |--------------------------------------------------------------------------
    | Override the default CSS custom properties injected into <head>.
    | These map directly to CSS variables in the design system stylesheet.
    */

    'tokens' => [

        // Brand / Primary color (HSL parts)
        'primary-h'   => '221',
        'primary-s'   => '83%',
        'primary-l'   => '53%',

        // Border radius scale
        'radius-sm'   => '0.25rem',
        'radius-md'   => '0.375rem',
        'radius-lg'   => '0.5rem',
        'radius-xl'   => '0.75rem',
        'radius-2xl'  => '1rem',
        'radius-full' => '9999px',

        // Font family
        'font-sans'   => "'Instrument Sans', ui-sans-serif, system-ui, sans-serif",

        // Transition speeds
        'transition-fast'   => '100ms ease',
        'transition-normal' => '180ms ease',
        'transition-slow'   => '300ms ease',

        // Shadow scale
        'shadow-sm' => '0 1px 2px 0 rgb(0 0 0 / .05)',
        'shadow-md' => '0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1)',
        'shadow-lg' => '0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1)',
        'shadow-xl' => '0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Defaults
    |--------------------------------------------------------------------------
    | Set global defaults for every component.
    */

    'defaults' => [
        'button'   => ['variant' => 'solid',    'color' => 'primary', 'size' => 'md'],
        'badge'    => ['variant' => 'soft',     'color' => 'primary', 'size' => 'sm'],
        'avatar'   => ['size' => 'md',          'shape' => 'circle'],
        'input'    => ['variant' => 'bordered',  'size' => 'md'],
        'card'     => ['variant' => 'bordered',  'padding' => 'md'],
        'alert'    => ['variant' => 'soft',     'color' => 'info'],
        'modal'    => ['size' => 'md'],
        'drawer'   => ['position' => 'right',   'size' => 'md'],
        'table'    => ['striped' => false,      'hoverable' => true],
    ],

    /*
    |--------------------------------------------------------------------------
    | Toast Configuration
    |--------------------------------------------------------------------------
    */

    'toast' => [
        'position' => 'bottom-right', // top-right | top-left | top-center | bottom-right | bottom-left | bottom-center
        'duration'  => 4000,           // ms before auto-dismiss (0 = no auto-dismiss)
        'max'       => 5,              // max visible toasts at once
    ],

];
