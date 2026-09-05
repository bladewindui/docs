---
title: Keyboard Key Component
component: x-bladewind::kbd
url: /component/kbd
---

# Keyboard Key

`x-bladewind::kbd` renders a semantic `<kbd>` element styled as a physical key — for documenting a shortcut in help
text, a menu item, or command documentation.

## Basic Usage

```blade
<p>Press <x-bladewind::kbd>Esc</x-bladewind::kbd> to close.</p>
```

## Key combinations

Pass `keys` as an array (or JSON string) to render a combo — each key in its own pill, joined by "+". When `keys` is
given, it takes priority over the default slot.

```blade
<x-bladewind::kbd :keys="['Ctrl', 'K']" />
```

## Sizes

Set `size` to `tiny`, `small` (default), or `regular`.

```blade
<x-bladewind::kbd size="tiny">Tab</x-bladewind::kbd>
<x-bladewind::kbd size="small">Tab</x-bladewind::kbd>
<x-bladewind::kbd size="regular">Tab</x-bladewind::kbd>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| keys | _(none)_ | Array or JSON string of key labels for a combo. Takes priority over the default slot. |
| size | small | `tiny` \| `small` \| `regular` |
| class | _(blank)_ | Additional CSS classes for the key (or the combo's wrapper, when using `keys`). |
