# Modal (Livewire)

`<livewire:ws::modal>` — Fenêtre modale gérée par Livewire avec animations d'entrée/sortie.

---

## Installation du composant dans le layout

Placez **une seule fois** le composant dans votre layout principal :

```blade
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    @wsStyles
</head>
<body>
    {{ $slot }}

    {{-- Composants Livewire globaux --}}
    <livewire:ws::modal />

    @wsScripts
</body>
</html>
```

---

## Utilisation

### Ouverture via JavaScript

```js
DsModal.open("confirm-delete");
```

### Ouverture via un bouton Blade

```blade
<x-ws::button label="Ouvrir" onclick="DsModal.open('my-modal')" />
```

### Définition de la modale

```blade
{{-- La modale est définie là où vous en avez besoin --}}
<x-ws::modal modal-id="confirm-delete" title="Confirmer la suppression" size="md">
    <x-slot:header>
        {{-- En-tête personnalisé (remplace `title` si défini) --}}
        <h3 class="font-semibold text-danger-600">Suppression définitive</h3>
    </x-slot:header>

    <p>Cette action est irréversible. Êtes-vous sûr de vouloir continuer ?</p>

    <x-slot:footer>
        <div class="flex justify-end gap-2">
            <x-ws::button label="Annuler"    variant="outline" onclick="DsModal.close('confirm-delete')" />
            <x-ws::button label="Supprimer"  color="danger"    wire:click="delete" />
        </div>
    </x-slot:footer>
</x-ws::modal>
```

### Modale simple (sans slots)

```blade
<x-ws::modal
    modal-id="info"
    title="Informations"
    description="Votre demande a bien été prise en compte."
    size="sm"
    closeable
/>
```

---

## Props

| Prop          | Type   | Défaut | Description                                  |
| ------------- | ------ | ------ | -------------------------------------------- |
| `modal-id`    | string | —      | **Requis** — identifiant unique de la modale |
| `title`       | string | —      | Titre dans l'en-tête                         |
| `description` | string | —      | Sous-titre/description sous le titre         |
| `size`        | string | `md`   | `sm` `md` `lg` `xl` `2xl` `full`             |
| `closeable`   | bool   | `true` | Fermeture par ×, Échap ou clic backdrop      |
| `backdrop`    | bool   | `true` | Affiche le fond assombri                     |

---

## Slots

| Slot        | Description                           |
| ----------- | ------------------------------------- |
| `header`    | Remplace l'en-tête généré par `title` |
| _(default)_ | Contenu principal de la modale        |
| `footer`    | Pied de page (boutons, actions)       |

---

## Événements JavaScript

| Événement             | Description           |
| --------------------- | --------------------- |
| `ds-modal-open:{id}`  | Ouvrir la modale `id` |
| `ds-modal-close:{id}` | Fermer la modale `id` |

```js
// Écouter l'ouverture depuis Alpine.js
window.addEventListener("ds-modal-open:confirm-delete", () => {
    console.log("modale ouverte");
});
```

---

## Déclencher depuis un composant Livewire (PHP)

```php
// Ouvrir
$this->dispatch('ds-modal-open:confirm-delete');

// Fermer
$this->dispatch('ds-modal-close:confirm-delete');
```

---

## Exemple complet — confirmation de suppression

```blade
{{-- Dans un composant Livewire --}}
<div>
    <x-ws::button
        label="Supprimer"
        color="danger"
        variant="outline"
        onclick="DsModal.open('delete-user-{{ $user->id }}')"
    />

    <x-ws::modal modal-id="delete-user-{{ $user->id }}" title="Supprimer l'utilisateur" size="sm">
        <p>Vous êtes sur le point de supprimer <strong>{{ $user->name }}</strong>.</p>

        <x-slot:footer>
            <div class="flex justify-end gap-2">
                <x-ws::button
                    label="Annuler"
                    variant="ghost"
                    onclick="DsModal.close('delete-user-{{ $user->id }}')"
                />
                <x-ws::button
                    label="Confirmer la suppression"
                    color="danger"
                    wire:click="delete({{ $user->id }})"
                />
            </div>
        </x-slot:footer>
    </x-ws::modal>
</div>
```
