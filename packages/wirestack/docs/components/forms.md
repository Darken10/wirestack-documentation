# Composants Formulaires

Tous les composants de formulaire supportent la validation Laravel, les messages d'erreur `$errors`, et l'intégration Livewire via `wire:model`.

---

## Input

Champ de saisie texte complet avec icônes, préfixe/suffixe, et états de validation.

### Utilisation

```blade
{{-- Basique --}}
<x-ws::input name="email" type="email" label="Adresse email" required />

{{-- Avec icône et aide --}}
<x-ws::input
    name="search"
    placeholder="Rechercher..."
    icon="magnifying-glass"
    hint="Tapez au moins 3 caractères"
/>

{{-- Erreur de validation --}}
<x-ws::input
    name="username"
    label="Nom d'utilisateur"
    :error="$errors->first('username')"
/>

{{-- Affos du préfixe/suffixe --}}
<x-ws::input name="price"  prefix="€"        suffix="HT" />
<x-ws::input name="domain" prefix="https://"  suffix=".com" />

{{-- Variantes --}}
<x-ws::input variant="filled"    name="q" />
<x-ws::input variant="underline" name="q" />
<x-ws::input variant="ghost"     name="q" />

{{-- États --}}
<x-ws::input name="code"     icon-trailing="lock-closed" loading />
<x-ws::input name="q"        clearable />
<x-ws::input name="readonly" value="lecture seule" readonly />

{{-- Intégration Livewire --}}
<x-ws::input name="email" wire:model="email" label="Email" />
```

### Props

| Prop            | Type   | Défaut           | Description                                             |
| --------------- | ------ | ---------------- | ------------------------------------------------------- |
| `name`          | string | —                | Attribut `name`                                         |
| `id`            | string | valeur de `name` | Attribut `id`                                           |
| `type`          | string | `text`           | `text` `email` `password` `number` `tel` `url` `search` |
| `variant`       | string | `bordered`       | `bordered` `filled` `ghost` `underline`                 |
| `size`          | string | `md`             | `sm` `md` `lg`                                          |
| `label`         | string | —                | Label affiché au-dessus                                 |
| `hint`          | string | —                | Texte d'aide                                            |
| `error`         | string | —                | Message d'erreur (style rouge, remplace `hint`)         |
| `icon`          | string | —                | Icône Heroicons à gauche                                |
| `icon-trailing` | string | —                | Icône à droite                                          |
| `prefix`        | string | —                | Texte collé à gauche (ex. `€`)                          |
| `suffix`        | string | —                | Texte collé à droite (ex. `.com`)                       |
| `placeholder`   | string | —                |                                                         |
| `required`      | bool   | `false`          |                                                         |
| `disabled`      | bool   | `false`          |                                                         |
| `readonly`      | bool   | `false`          |                                                         |
| `loading`       | bool   | `false`          | Spinner à droite                                        |
| `clearable`     | bool   | `false`          | Bouton effacer (Alpine.js)                              |
| `autocomplete`  | string | `off`            |                                                         |

---

## Textarea

Zone de saisie multi-lignes.

### Utilisation

```blade
<x-ws::textarea name="message" label="Message" rows="5" />

<x-ws::textarea
    name="bio"
    label="Bio"
    autoresize
    hint="Max 500 caractères"
    :error="$errors->first('bio')"
/>

{{-- Livewire --}}
<x-ws::textarea name="content" wire:model="content" label="Contenu" rows="10" />
```

### Props

| Prop         | Type   | Défaut     | Description                             |
| ------------ | ------ | ---------- | --------------------------------------- |
| `name`       | string | —          |                                         |
| `label`      | string | —          |                                         |
| `hint`       | string | —          |                                         |
| `error`      | string | —          |                                         |
| `variant`    | string | `bordered` | `bordered` `filled` `ghost` `underline` |
| `size`       | string | `md`       | `sm` `md` `lg`                          |
| `rows`       | int    | `4`        | Nombre de lignes initiales              |
| `autoresize` | bool   | `false`    | Hauteur automatique (Alpine.js)         |
| `disabled`   | bool   | `false`    |                                         |
| `readonly`   | bool   | `false`    |                                         |
| `required`   | bool   | `false`    |                                         |

---

## Select

Liste déroulante avec options configurables.

### Utilisation

```blade
<x-ws::select
    name="country"
    label="Pays"
    placeholder="Choisir un pays..."
    :options="[
        'fr' => 'France',
        'be' => 'Belgique',
        'ch' => 'Suisse',
        'lu' => 'Luxembourg',
    ]"
/>

{{-- Avec erreur --}}
<x-ws::select
    name="role"
    label="Rôle"
    :options="['admin' => 'Administrateur', 'user' => 'Utilisateur']"
    :error="$errors->first('role')"
    required
/>

{{-- Livewire --}}
<x-ws::select name="status" wire:model="status" :options="$statuses" />
```

### Props

| Prop          | Type   | Défaut     | Description                 |
| ------------- | ------ | ---------- | --------------------------- |
| `name`        | string | —          |                             |
| `options`     | array  | `[]`       | `['valeur' => 'Label']`     |
| `placeholder` | string | —          | Option vide initiale        |
| `label`       | string | —          |                             |
| `hint`        | string | —          |                             |
| `error`       | string | —          |                             |
| `variant`     | string | `bordered` | `bordered` `filled` `ghost` |
| `size`        | string | `md`       | `sm` `md` `lg`              |
| `disabled`    | bool   | `false`    |                             |
| `required`    | bool   | `false`    |                             |

---

## Checkbox

Case à cocher avec label et support d'erreur.

### Utilisation

```blade
<x-ws::checkbox name="terms"        label="J'accepte les CGU"           required />
<x-ws::checkbox name="newsletter"   label="Recevoir les newsletters"     color="success" />
<x-ws::checkbox name="remember"     label="Se souvenir de moi"          :checked="true" />

{{-- Livewire --}}
<x-ws::checkbox name="active" wire:model="active" label="Compte actif" />
```

### Props

| Prop       | Type   | Défaut    | Valeurs                      |
| ---------- | ------ | --------- | ---------------------------- |
| `name`     | string | —         |                              |
| `value`    | string | `1`       | Valeur soumise               |
| `label`    | string | —         |                              |
| `hint`     | string | —         |                              |
| `error`    | string | —         |                              |
| `color`    | string | `primary` | `primary` `success` `danger` |
| `size`     | string | `md`      | `sm` `md` `lg`               |
| `checked`  | bool   | `false`   | État initial                 |
| `disabled` | bool   | `false`   |                              |
| `required` | bool   | `false`   |                              |

---

## Radio & RadioGroup

Boutons radio individuels ou groupés.

### Utilisation

```blade
<x-ws::radio-group label="Abonnement" hint="Choisissez votre formule">
    <x-ws::radio name="plan" value="free"       label="Gratuit"       />
    <x-ws::radio name="plan" value="pro"        label="Pro — 9€/mois" />
    <x-ws::radio name="plan" value="enterprise" label="Entreprise"    />
</x-ws::radio-group>

{{-- Orientation horizontale --}}
<x-ws::radio-group label="Couleur" orientation="horizontal">
    <x-ws::radio name="color" value="blue"  label="Bleu" />
    <x-ws::radio name="color" value="red"   label="Rouge" />
    <x-ws::radio name="color" value="green" label="Vert" />
</x-ws::radio-group>
```

### RadioGroup — Props

| Prop          | Type   | Description                         |
| ------------- | ------ | ----------------------------------- |
| `label`       | string | Label du groupe                     |
| `hint`        | string | Texte d'aide                        |
| `error`       | string | Message d'erreur                    |
| `orientation` | string | `vertical` (défaut) ou `horizontal` |

### Radio — Props

| Prop       | Type   | Défaut    | Description                        |
| ---------- | ------ | --------- | ---------------------------------- |
| `name`     | string | —         | Doit être identique dans le groupe |
| `value`    | string | —         | Valeur soumise                     |
| `label`    | string | —         |                                    |
| `color`    | string | `primary` | `primary` `success`                |
| `size`     | string | `md`      | `sm` `md` `lg`                     |
| `disabled` | bool   | `false`   |                                    |

---

## Toggle

Interrupteur on/off (switch).

### Utilisation

```blade
<x-ws::toggle name="notifications" label="Activer les notifications" />
<x-ws::toggle name="dark_mode"     label="Mode sombre" color="success" :checked="true" />
<x-ws::toggle name="maintenance"   label="Mode maintenance" color="danger" size="lg" />

{{-- Livewire --}}
<x-ws::toggle name="active" wire:model.live="active" label="Compte actif" />
```

### Props

| Prop       | Type   | Défaut    | Valeurs                                |
| ---------- | ------ | --------- | -------------------------------------- |
| `name`     | string | —         |                                        |
| `label`    | string | —         |                                        |
| `hint`     | string | —         |                                        |
| `color`    | string | `primary` | `primary` `success` `danger` `warning` |
| `size`     | string | `md`      | `sm` `md` `lg`                         |
| `checked`  | bool   | `false`   | État initial                           |
| `disabled` | bool   | `false`   |                                        |

---

## Range

Curseur pour sélectionner une valeur dans un intervalle.

### Utilisation

```blade
<x-ws::range name="volume"  label="Volume"   min="0" max="100" step="5" />
<x-ws::range name="opacity" label="Opacité"  show-value />
<x-ws::range name="price"   label="Prix max" min="0" max="1000" step="10" color="success" />
```

### Props

| Prop         | Type   | Défaut    | Description                            |
| ------------ | ------ | --------- | -------------------------------------- |
| `name`       | string | —         |                                        |
| `label`      | string | —         |                                        |
| `hint`       | string | —         |                                        |
| `min`        | int    | `0`       | Valeur minimale                        |
| `max`        | int    | `100`     | Valeur maximale                        |
| `step`       | int    | `1`       | Pas d'incrémentation                   |
| `show-value` | bool   | `false`   | Affiche la valeur courante (Alpine.js) |
| `color`      | string | `primary` | Couleur du curseur                     |
| `disabled`   | bool   | `false`   |                                        |

---

## FormGroup

Conteneur pour un champ avec label, hint et erreur — pratique pour des champs custom.

### Utilisation

```blade
{{-- Wrappeur simple --}}
<x-ws::form-group label="Mot de passe" for="password" required>
    <x-ws::input name="password" type="password" id="password" />
</x-ws::form-group>

{{-- Inline (label à gauche) --}}
<x-ws::form-group label="Notifications" for="notifs" inline>
    <x-ws::toggle name="notifs" id="notifs" />
</x-ws::form-group>

{{-- Avec erreur --}}
<x-ws::form-group label="Photo" error="Le fichier est trop lourd.">
    <input type="file" name="photo" />
</x-ws::form-group>
```

### Props

| Prop       | Type   | Description                                     |
| ---------- | ------ | ----------------------------------------------- |
| `label`    | string | Label du champ                                  |
| `for`      | string | Correspond à l'`id` du champ (lie le `<label>`) |
| `hint`     | string | Texte d'aide                                    |
| `error`    | string | Message d'erreur                                |
| `required` | bool   | Affiche un `*` rouge                            |
| `inline`   | bool   | Label et champ côte à côte                      |

---

## FormSection

Section de formulaire avec titre et description pour structurer de longs formulaires.

### Utilisation

```blade
<x-ws::form-section
    title="Informations personnelles"
    description="Ces informations seront visibles sur votre profil public."
>
    <x-ws::input name="name"  label="Nom complet" />
    <x-ws::input name="email" label="Email"       type="email" />
</x-ws::form-section>

<x-ws::form-section
    title="Sécurité"
    description="Gérez votre mot de passe et la double authentification."
>
    <x-ws::input name="current_password" label="Mot de passe actuel"  type="password" />
    <x-ws::input name="password"         label="Nouveau mot de passe" type="password" />
</x-ws::form-section>
```

### Props

| Prop          | Type   | Description               |
| ------------- | ------ | ------------------------- |
| `title`       | string | Titre de la section       |
| `description` | string | Description sous le titre |

---

## InputGroup

Groupement d'un input avec des addons texte ou des boutons collés aux bords.

### Utilisation

```blade
{{-- Préfixe et suffixe texte --}}
<x-ws::input-group>
    <x-slot:prefix>https://</x-slot:prefix>
    <x-ws::input name="domain" placeholder="monsite" />
    <x-slot:suffix>.com</x-slot:suffix>
</x-ws::input-group>

{{-- Avec bouton --}}
<x-ws::input-group>
    <x-ws::input name="email" placeholder="Email" />
    <x-slot:suffix>
        <x-ws::button button-type="submit">S'abonner</x-ws::button>
    </x-slot:suffix>
</x-ws::input-group>

{{-- Avec icône en préfixe --}}
<x-ws::input-group>
    <x-slot:prefix>
        <x-ws::icon name="at-symbol" size="sm" class="text-zinc-400" />
    </x-slot:prefix>
    <x-ws::input name="twitter" placeholder="handle" />
</x-ws::input-group>
```

### Slots

| Slot             | Description                       |
| ---------------- | --------------------------------- |
| `prefix`         | Contenu collé à gauche de l'input |
| `suffix`         | Contenu collé à droite de l'input |
| `$slot` (défaut) | L'input lui-même                  |
