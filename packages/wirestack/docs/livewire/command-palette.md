# Command Palette (Livewire)

`<livewire:ws::command-palette>` — Palette de commandes de type Spotlight/⌘K, avec recherche instantanée et navigation clavier.

---

## Installation dans le layout

```blade
{{-- resources/views/layouts/app.blade.php --}}
<body>
    {{ $slot }}

    <livewire:ws::command-palette :commands="$commands" />

    @wsScripts
</body>
```

Le raccourci **⌘K** (macOS) / **Ctrl+K** (Windows/Linux) est enregistré automatiquement à l'inclusion du composant.

---

## Utilisation

### Définir les commandes (depuis un layout ou un composant)

```blade
@php
$commands = [
    [
        'id'          => 'dashboard',
        'label'       => 'Tableau de bord',
        'description' => 'Vue d\'ensemble de l\'application',
        'icon'         => 'home',
        'action'      => 'navigate',
        'url'         => route('dashboard'),
    ],
    [
        'id'      => 'new-post',
        'label'   => 'Nouvel article',
        'icon'    => 'document-plus',
        'action'  => 'navigate',
        'url'     => route('posts.create'),
        'shortcut'=> '⌘N',
        'badge'   => 'Nouveau',
    ],
    [
        'id'      => 'settings',
        'label'   => 'Paramètres',
        'icon'    => 'cog-6-tooth',
        'action'  => 'navigate',
        'url'     => route('settings'),
        'shortcut'=> '⌘,',
    ],
    [
        'id'          => 'toggle-theme',
        'label'       => 'Changer le thème',
        'description' => 'Basculer entre clair/sombre',
        'icon'         => 'moon',
        'action'      => 'dispatch',      // Déclenche un événement Livewire
        'event'       => 'toggle-theme',
    ],
    [
        'id'      => 'logout',
        'label'   => 'Se déconnecter',
        'icon'    => 'arrow-right-on-rectangle',
        'action'  => 'navigate',
        'url'     => route('logout'),
    ],
];
@endphp
```

### Ouvrir/fermer via JavaScript

```js
DsCommandPalette.open();
DsCommandPalette.close();

// Exécuter une commande par son ID
DsCommandPalette.run("new-post");
```

### Ouvrir depuis un bouton

```blade
<x-ws::button
    label="Rechercher"
    icon="magnifying-glass"
    variant="outline"
    keyboard-shortcut="⌘K"
    onclick="DsCommandPalette.open()"
/>
```

---

## Structure d'une commande

| Clé           | Type   | Requis        | Description                            |
| ------------- | ------ | ------------- | -------------------------------------- |
| `id`          | string | ✅            | Identifiant unique                     |
| `label`       | string | ✅            | Libellé principal affiché              |
| `description` | string | —             | Description secondaire                 |
| `icon`        | string | —             | Icône Heroicons                        |
| `action`      | string | ✅            | `navigate` `dispatch` `callback`       |
| `url`         | string | Si `navigate` | URL de redirection                     |
| `event`       | string | Si `dispatch` | Nom de l'événement Livewire dispatché  |
| `shortcut`    | string | —             | Raccourci affiché (ex. `⌘N`, `Ctrl+S`) |
| `badge`       | string | —             | Badge coloré (ex. `Nouveau`, `Beta`)   |

---

## Actions disponibles

### `navigate` — Redirection

```php
[
    'id'     => 'create-user',
    'label'  => 'Créer un utilisateur',
    'action' => 'navigate',
    'url'    => route('users.create'),
]
```

### `dispatch` — Émettre un événement Livewire

```php
[
    'id'     => 'clear-cache',
    'label'  => 'Vider le cache',
    'action' => 'dispatch',
    'event'  => 'clear-cache',
]
```

Écouter l'événement dans votre composant Livewire :

```php
#[On('clear-cache')]
public function clearCache(): void
{
    Cache::flush();
    $this->dispatch('ds-toast', ['type' => 'success', 'message' => 'Cache vidé.']);
}
```

---

## Écouter les commandes dans un composant Livewire

```php
use Livewire\Attributes\On;

#[On('command-palette:run')]
public function onCommandRun(string $commandId): void
{
    match ($commandId) {
        'toggle-theme' => $this->dispatch('toggle-theme'),
        'clear-cache'  => Cache::flush(),
        default        => null,
    };
}
```

---

## Navigation clavier

| Touche          | Action                            |
| --------------- | --------------------------------- |
| `⌘K` / `Ctrl+K` | Ouvrir / fermer                   |
| `↑` / `↓`       | Naviguer dans les résultats       |
| `Entrée`        | Exécuter la commande sélectionnée |
| `Échap`         | Fermer                            |

---

## Exemple — palette dynamique depuis Livewire

```php
// app/Livewire/Layout/AppLayout.php
class AppLayout extends Component
{
    public function getCommandsProperty(): array
    {
        $commands = [
            ['id' => 'dashboard', 'label' => 'Tableau de bord', 'icon' => 'home',    'action' => 'navigate', 'url' => route('dashboard')],
            ['id' => 'posts',     'label' => 'Articles',         'icon' => 'document', 'action' => 'navigate', 'url' => route('posts.index')],
        ];

        if (auth()->user()->isAdmin()) {
            $commands[] = ['id' => 'admin', 'label' => 'Administration', 'icon' => 'shield-check', 'action' => 'navigate', 'url' => route('admin.index')];
        }

        return $commands;
    }

    public function render(): View
    {
        return view('livewire.layout.app-layout', [
            'commands' => $this->commands,
        ]);
    }
}
```

```blade
{{-- resources/views/livewire/layout/app-layout.blade.php --}}
<div>
    {{ $slot }}
    <livewire:ws::command-palette :commands="$commands" />
</div>
```
