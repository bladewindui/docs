---
title: Toggle Component
component: x-bladewind::toggle
url: /component/toggle
---

# Toggle

Displays a toggle input. Under the hood it's a checkbox spiced up nicely.

## Basic Usage

```blade
<x-bladewind::toggle />
```

## Labels

The toggle can display a label positioned on the left (default) or right, by setting `label_position="right"`. Clicking the label toggles the component.

```blade
<x-bladewind::toggle label="Send me quarterly newsletters" />

<x-bladewind::toggle
    label="Send me quarterly newsletters"
    label_position="right" />
```

By default the toggle is `inline-flex`, so multiple toggles can sit side by side. Set `justified="true"` to fill the parent container and justify with the label.

```blade
<x-bladewind::toggle
    label="Send me quarterly newsletters"
    justified="true" />
```

## Thin and Thicker Bars

The toggle bar can be thinner (like Android) or thicker (like iOS). Set `bar="thin"` or `bar="thicker"`. The default is `bar="thick"`.

```blade
<x-bladewind::toggle
    label="Send me quarterly newsletters"
    bar="thin" />

<x-bladewind::toggle
    label="Send me quarterly newsletters"
    bar="thicker" />
```

## Checked and Disabled

Set `checked="true"` to check the toggle by default, and `disabled="true"` to disable it. Both can be combined.

```blade
<x-bladewind::toggle
    checked="true"
    label="I am checked at birth" />

<x-bladewind::toggle
    disabled="true"
    label="You can't push me around" />

<x-bladewind::toggle
    checked="true" disabled="true"
    label="I am checked but you still can't push me around" />
```

## Different Colours

There are nine colours to choose from for the active/checked state, set via the `color` attribute.

```blade
<x-bladewind::toggle color="red" checked="true" />
<x-bladewind::toggle color="yellow" checked="true" />
<x-bladewind::toggle color="green" checked="true" />
<x-bladewind::toggle color="pink" checked="true" />
<x-bladewind::toggle color="cyan" checked="true" />
<x-bladewind::toggle color="gray" checked="true" />
<x-bladewind::toggle color="purple" checked="true" />
<x-bladewind::toggle color="orange" checked="true" />
<x-bladewind::toggle color="blue" checked="true" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw-toggle | Unique name to identify the component and access its value when submitted. |
| label | *blank* | Clickable label displayed next to the toggle. |
| label_position | left | Where the label is positioned. `left` \| `right` |
| disabled | false | Whether the toggle is disabled. `true` \| `false` |
| checked | false | Whether the toggle is checked. `true` \| `false` |
| color | primary | Nine colours to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` |
| justified | false | Whether the label and toggle are spread out to fill the parent container. `true` \| `false` |
| bar | thick | Size of the slider bar. `thin` \| `thick` \| `thicker` |
| onclick | javascript:void(0) | JavaScript function called when the toggle is clicked, fired whether checked or not. Determine checked state programmatically. |

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
