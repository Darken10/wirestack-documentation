# API JavaScript

Après avoir ajouté `@wsScripts` dans votre layout, les helpers suivants sont disponibles globalement dans le navigateur.

---

## DsToast — Notifications

Déclenche des notifications flottantes gérées par le composant `<livewire:ws::toast />`.

> **Prérequis :** `<livewire:ws::toast />` doit être présent dans le layout.

### Méthodes

```js
DsToast.success(message, (options = {}));
DsToast.error(message, (options = {}));
DsToast.warning(message, (options = {}));
DsToast.info(message, (options = {}));
```

### Options

| Option     | Type   | Défaut | Description                                     |
| ---------- | ------ | ------ | ----------------------------------------------- |
| `title`    | string | —      | Titre affiché en gras au-dessus du message      |
| `duration` | number | `4000` | Durée en ms avant auto-dismiss (0 = persistant) |

### Exemples

```js
// Simple
DsToast.success("Enregistré avec succès");
DsToast.error("Une erreur est survenue");
DsToast.warning("Votre session expire dans 5 minutes");
DsToast.info("Nouvelle version disponible");

// Avec titre
DsToast.success("Le fichier a été importé.", { title: "Import réussi" });

// Persistant (l'utilisateur ferme manuellement)
DsToast.error("Connexion refusée", { title: "Erreur réseau", duration: 0 });

// Durée personnalisée
DsToast.info("Redirection dans 3 secondes...", { duration: 3000 });
```

---

## DsModal — Modales

Contrôle des composants `<livewire:ws::modal>` par leur `modal-id`.

```js
DsModal.open("identifiant-de-la-modale");
DsModal.close("identifiant-de-la-modale");
```

### Exemple

```blade
{{-- Déclaration --}}
<livewire:ws::modal modal-id="confirm-delete" title="Confirmer">
    Êtes-vous sûr de vouloir supprimer cet élément ?
</livewire:ws::modal>

{{-- Déclencheurs --}}
<button onclick="DsModal.open('confirm-delete')">Ouvrir</button>
<button onclick="DsModal.close('confirm-delete')">Fermer</button>
```

En interne, `DsModal.open('id')` dispatche un événement `ds-modal-open:id` sur `window`, écouté par le composant Livewire.

---

## DsDrawer — Panneaux coulissants

Contrôle des composants `<livewire:ws::drawer>` par leur `drawer-id`.

```js
DsDrawer.open("identifiant-du-drawer");
DsDrawer.close("identifiant-du-drawer");
```

### Exemple

```blade
<livewire:ws::drawer drawer-id="user-settings" title="Paramètres">
    <!-- contenu -->
</livewire:ws::drawer>

<button onclick="DsDrawer.open('user-settings')">Ouvrir</button>
```

---

## DsCommandPalette — Palette de commandes

Contrôle du composant `<livewire:ws::command-palette>`.

```js
DsCommandPalette.open();
DsCommandPalette.close();
```

> **Raccourci clavier intégré :** `Cmd+K` (macOS) ou `Ctrl+K` (Windows/Linux) ouvre automatiquement la palette. Ce comportement est géré par `@wsScripts` sans configuration supplémentaire.

### Exemple

```blade
<button onclick="DsCommandPalette.open()">
    Rechercher...
    <span class="text-xs opacity-60">⌘K</span>
</button>
```

---

## DsCopy — Presse-papiers

Copie du texte dans le presse-papiers avec feedback visuel optionnel.

```js
const success = await DsCopy.copy(text, buttonElement);
// Retourne true si la copie a réussi, false sinon
```

### Paramètres

| Paramètre       | Type        | Description                                        |
| --------------- | ----------- | -------------------------------------------------- |
| `text`          | string      | Texte à copier                                     |
| `buttonElement` | HTMLElement | (optionnel) Élément bouton pour le feedback visuel |

### Exemple

```js
const btn = document.getElementById("copy-btn");
const ok = await DsCopy.copy("npm install wirestack-ui", btn);

if (ok) {
    console.log("Copié !");
}
```

> Le composant `<x-ws::copy-button>` utilise `DsCopy` en interne. Vous n'avez généralement pas besoin de l'appeler directement.

---

## Utilisation depuis Livewire (PHP)

Vous pouvez déclencher les helpers JS depuis un composant Livewire via `$dispatch` :

```php
// Dans un composant Livewire

// Toast
$this->dispatch('ds-toast', type: 'success', message: 'Enregistré !');
$this->dispatch('ds-toast', type: 'error',   message: 'Erreur', title: 'Oops');

// Modal
$this->dispatch('ds-modal-open:confirm-delete');
$this->dispatch('ds-modal-close:confirm-delete');

// Drawer
$this->dispatch('ds-drawer-open:user-settings');
$this->dispatch('ds-drawer-close:user-settings');
```
