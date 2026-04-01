# Toast (Livewire)

`<livewire:ws::toast>` — Système de notifications non bloquantes géré par Livewire + Alpine.js.

---

## Installation dans le layout

Placez ce composant **une seule fois** dans votre layout principal, en dehors du contenu principal.

```blade
{{-- resources/views/layouts/app.blade.php --}}
<body>
    {{ $slot }}

    {{-- Toasts globaux --}}
    <livewire:ws::toast />

    @wsScripts
</body>
```

---

## Déclencher un toast

### Via JavaScript (depuis n'importe où dans le frontend)

```js
// Types disponibles : success, error, warning, info
DsToast.success("Profil mis à jour avec succès !");
DsToast.error("Une erreur est survenue.");
DsToast.warning("Votre session expire dans 5 minutes.");
DsToast.info("Une nouvelle version est disponible.");

// Options personnalisées
DsToast.success("Commande passée !", {
    duration: 6000,
    description: "Vous recevrez un email de confirmation.",
    action: {
        label: "Voir la commande",
        url: "/orders/1042",
    },
});
```

### Via un composant Livewire (PHP)

```php
// Dans n'importe quel composant Livewire
$this->dispatch('ds-toast', [
    'type'        => 'success',
    'message'     => 'Enregistrement réussi !',
    'description' => 'Vos modifications ont bien été sauvegardées.',
    'duration'    => 5000,
]);

// Raccourcis équivalents
$this->dispatch('ds-toast', ['type' => 'error',   'message' => 'Échec de la connexion.']);
$this->dispatch('ds-toast', ['type' => 'warning', 'message' => 'Quota presque atteint.']);
$this->dispatch('ds-toast', ['type' => 'info',    'message' => 'Mise à jour disponible.']);
```

---

## Configuration

Les valeurs par défaut sont modifiables dans `config/ws.php` :

```php
// config/ws.php

'toast' => [
    'position' => 'bottom-right', // 'top-left' | 'top-center' | 'top-right'
                                  // 'bottom-left' | 'bottom-center' | 'bottom-right'
    'duration' => 5000,           // Durée d'affichage en ms (0 = infini)
    'max'      => 5,              // Nombre maximum de toasts simultanés
],
```

---

## Props du payload

| Clé            | Type   | Défaut | Description                                  |
| -------------- | ------ | ------ | -------------------------------------------- |
| `type`         | string | `info` | `success` `error` `warning` `info`           |
| `message`      | string | —      | **Requis** — message principal               |
| `description`  | string | —      | Texte secondaire sous le message             |
| `duration`     | int    | config | Durée en ms (`0` = persistant jusqu'au clic) |
| `action.label` | string | —      | Libellé du bouton d'action optionnel         |
| `action.url`   | string | —      | URL du bouton d'action                       |

---

## Icônes par type

| Type      | Icône                  | Couleur |
| --------- | ---------------------- | ------- |
| `success` | `check-circle`         | Vert    |
| `error`   | `x-circle`             | Rouge   |
| `warning` | `exclamation-triangle` | Jaune   |
| `info`    | `information-circle`   | Bleu    |

---

## Exemples concis

```php
// Après un CRUD
public function store(): void
{
    Post::create($this->form->all());
    $this->dispatch('ds-toast', ['type' => 'success', 'message' => 'Article créé !']);
    $this->redirect(route('posts.index'));
}

// Après une erreur
public function delete(int $id): void
{
    try {
        Post::findOrFail($id)->delete();
        $this->dispatch('ds-toast', ['type' => 'success', 'message' => 'Article supprimé.']);
    } catch (\Throwable $e) {
        $this->dispatch('ds-toast', ['type' => 'error', 'message' => 'Impossible de supprimer cet article.']);
    }
}
```
