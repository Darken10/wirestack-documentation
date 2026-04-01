# Drawer (Livewire)

`<livewire:ws::drawer>` — Panneau latéral animé (side panel / off-canvas) géré par Livewire.

---

## Installation dans le layout

```blade
{{-- resources/views/layouts/app.blade.php --}}
<body>
    {{ $slot }}

    <livewire:ws::drawer />

    @wsScripts
</body>
```

---

## Utilisation

### Ouverture via JavaScript

```js
DsDrawer.open("cart-drawer");
```

### Fermeture via JavaScript

```js
DsDrawer.close("cart-drawer");
```

### Définition du drawer

```blade
<x-ws::drawer
    drawer-id="cart-drawer"
    title="Mon panier"
    position="right"
    size="lg"
>
    {{-- Contenu du drawer --}}
    @foreach ($cartItems as $item)
        <div class="flex items-center gap-3 py-3 border-b border-neutral-200 dark:border-neutral-700">
            <img src="{{ $item->thumbnail }}" class="w-12 h-12 rounded" alt="{{ $item->name }}" />
            <div class="flex-1">
                <p class="font-medium">{{ $item->name }}</p>
                <p class="text-sm text-neutral-500">{{ $item->price }}</p>
            </div>
        </div>
    @endforeach

    <x-slot:footer>
        <x-ws::button label="Finaliser la commande" full-width color="primary" />
    </x-slot:footer>
</x-ws::drawer>

{{-- Bouton déclencheur --}}
<x-ws::button
    label="Panier ({{ $cartCount }})"
    icon="shopping-cart"
    onclick="DsDrawer.open('cart-drawer')"
/>
```

---

## Props

| Prop        | Type   | Défaut  | Description                              |
| ----------- | ------ | ------- | ---------------------------------------- |
| `drawer-id` | string | —       | **Requis** — identifiant unique          |
| `title`     | string | —       | Titre dans l'en-tête                     |
| `position`  | string | `right` | `left` `right` `top` `bottom`            |
| `size`      | string | `md`    | `sm` `md` `lg` `xl` `full`               |
| `closeable` | bool   | `true`  | Fermeture par ×, Échap, ou clic backdrop |
| `backdrop`  | bool   | `true`  | Fond assombri cliquable                  |

### Tailles par position

| Size   | right / left  | top / bottom |
| ------ | ------------- | ------------ |
| `sm`   | 20rem (320px) | 25% hauteur  |
| `md`   | 28rem (448px) | 40% hauteur  |
| `lg`   | 36rem (576px) | 60% hauteur  |
| `xl`   | 48rem (768px) | 75% hauteur  |
| `full` | 100vw         | 100vh        |

---

## Slots

| Slot        | Description                           |
| ----------- | ------------------------------------- |
| `header`    | Remplace l'en-tête généré par `title` |
| _(default)_ | Contenu principal (scrollable)        |
| `footer`    | Pied de page fixe en bas du drawer    |

---

## Événements JavaScript

| Événement              | Description      |
| ---------------------- | ---------------- |
| `ds-drawer-open:{id}`  | Ouvrir le drawer |
| `ds-drawer-close:{id}` | Fermer le drawer |

---

## Déclencher depuis un composant Livewire (PHP)

```php
$this->dispatch('ds-drawer-open:cart-drawer');
$this->dispatch('ds-drawer-close:cart-drawer');
```

---

## Exemple — panneau de filtres

```blade
{{-- Bouton d'ouverture --}}
<x-ws::button
    label="Filtres"
    icon="funnel"
    variant="outline"
    onclick="DsDrawer.open('filters-drawer')"
/>

{{-- Drawer --}}
<x-ws::drawer
    drawer-id="filters-drawer"
    title="Filtrer les résultats"
    position="left"
    size="sm"
>
    <form wire:submit.prevent="applyFilters">
        <x-ws::form-group label="Statut">
            <x-ws::select name="status" :options="$statusOptions" wire:model="filters.status" />
        </x-ws::form-group>

        <x-ws::form-group label="Date">
            <x-ws::input type="date" wire:model="filters.from" />
        </x-ws::form-group>

        <x-slot:footer>
            <div class="flex gap-2">
                <x-ws::button
                    label="Réinitialiser"
                    variant="ghost"
                    wire:click="resetFilters"
                    class="flex-1"
                />
                <x-ws::button
                    label="Appliquer"
                    type="submit"
                    class="flex-1"
                />
            </div>
        </x-slot:footer>
    </form>
</x-ws::drawer>
```
