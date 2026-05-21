---
title: Toggle Component
component: x-bladewind::toggle
url: /component/toggle
---

# Toggle

Display a toggle input. Under the hood, the toggle component is a checkbox spiced up nicely.

```blade
<x-bladewind::toggle />
```

You can display the toggle component with a label that can be positioned either on the left or right of the component. The default position is left but can easily be flipped to the right by setting the attribute `label_position="right"`. Clicking on the label toggles the component.

```blade
<x-bladewind::toggle label="Send me quarterly newsletters" />
```

```blade
<x-bladewind::toggle
    label="Send me quarterly newsletters"
    label_position="right" />
```

The toggle component by default is displayed as an inline-flex element to enable you sit multiple toggles side by side. If you prefer your toggles to fill up their parent containers and be justified with the label, set `justified="true"`.

```blade
<x-bladewind::toggle
    label="Send me quarterly newsletters"
    justified="true" />
```

## Thin and Thicker Bars

The toggle component can have a thinner bar like is seen on most Android devices and thicker bar as seen on iOS. Set `bar="thin"` or `bar="thicker"`. The default bar is set at `bar="thick"`.

```blade
<x-bladewind::toggle
    label="Send me quarterly newsletters"
    bar="thin" />
```

```blade
<x-bladewind::toggle
    label="Send me quarterly newsletters"
    bar="thicker" />
```

## Checked and Disabled

The toggle component can be checked and/or disabled by default. To check the component set `checked="true"`. To mark the toggle as disabled, set `disabled="true"`.

```blade
<x-bladewind::toggle
    checked="true"
    label="I am checked at birth" />
```

```blade
<x-bladewind::toggle
    disabled="true"
    label="I am checked at birth" />
```

```blade
<x-bladewind::toggle
    checked="true" disabled="true"
    label="I am checked at birth" />
```

## Different Colours

There are nine colours to pick from when the toggle component is active or checked. To set your preferred colour set the `color` attribute.

```blade
<x-bladewind::toggle color="red" />
<x-bladewind::toggle color="yellow" />
<x-bladewind::toggle color="green" />
<x-bladewind::toggle color="pink" />
<x-bladewind::toggle color="cyan" />
<x-bladewind::toggle color="gray" />
<x-bladewind::toggle color="purple" />
<x-bladewind::toggle color="orange" />
<x-bladewind::toggle color="blue" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | `bw-toggle` | Unique name to identify the component and access its value when submitted. |
| label | _blank_ | Clickable label to display next to the toggle component. |
| label_position | `left` | Specifies where the label should be positioned. `left` \| `right` |
| disabled | `false` | Specifies if the toggle is disabled or not. `true` \| `false` |
| checked | `false` | Specifies if the toggle is checked or not. `true` \| `false` |
| color | `primary` | There are nine colors to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` |
| justified | `false` | Specifies if the label and toggle are spread out to evenly fill up the parent container. `true` \| `false` |
| bar | `thick` | Specifies the size for the slider bar. `thin` \| `thick` \| `thicker` |
| onclick | `javascript:void(0)` | Javascript function to call when the toggle is clicked. This is fired both when the toggle is checked or not. You will need to programmatically determine if the toggle is checked or not. |

## Full Example

```blade
<x-bladewind::toggle
    color="purple"
    label="Send me quarterly newsletters"
    label_position="right"
    name="subscribe"
    justified="false"
    disabled="false"
    bar="thin"
    checked="false"
    onclick="alert('hey there')" />
```
