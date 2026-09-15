---
title: Rating Component
component: x-bladewind::rating
url: /component/rating
---

# Rating

Displays a five-star rating system where the number of highlighted icons matches the rating passed. Ratings can render as stars, hearts, or thumbs-up icons. When multiple ratings appear on the same page, name each component uniquely.

## Basic Usage

```blade
<x-bladewind::rating name="star-rating" />
```

## Rating Types

Besides the default star type, ratings can display as hearts or thumbs-up icons.

```blade
<x-bladewind::rating
    type="heart"
    name="heart-rating" />

<x-bladewind::rating
    type="thumbsup"
    name="thumb-rating" />
```

## Different Colors

The rating component supports twelve colors. The default is `orange`.

```blade
<x-bladewind::rating rating="1" color="red" name="red-rating" />
<x-bladewind::rating rating="2" color="yellow" name="yellow-rating" />
<x-bladewind::rating rating="3" color="green" name="green-rating" />
<x-bladewind::rating rating="4" color="blue" name="blue-rating" />
<x-bladewind::rating rating="5" color="pink" name="pink-rating" />
<x-bladewind::rating rating="1" color="cyan" name="cyan-rating" />
<x-bladewind::rating name="orange-rating" />
<x-bladewind::rating rating="3" color="gray" name="gray-rating" />
<x-bladewind::rating rating="4" color="purple" name="purple-rating" />
<x-bladewind::rating rating="4" color="violet" name="violet-rating" />
<x-bladewind::rating rating="4" color="indigo" name="indigo-rating" />
<x-bladewind::rating rating="4" color="fuchsia" name="fuchsia-rating" />
```

## Different Sizes

Ratings come in three sizes. The default is `small`.

```blade
<x-bladewind::rating rating="2" name="small-rating" />

<x-bladewind::rating
    size="medium"
    type="thumbsup"
    rating="3"
    name="medium-rating" />

<x-bladewind::rating
    size="big"
    type="heart"
    rating="2"
    name="big-rating" />
```

## Click Actions

Every rating component creates a hidden input field in the background, uniquely identified by the `name` attribute prefixed with `rating-value-`. For a component named `small-rating`, the hidden input is rendered as:

```blade
<input type="hidden" class="rating-value-small-rating" value="2" />
```

Access this value from JavaScript by passing a function name to `onclick`:

```blade
<x-bladewind::rating
    rating="2"
    name="small-rating"
    onclick="saveRating('small-rating')" />
```

```js
<script>
    saveRating = function(element) {

        // element here is the corresponding rating component.
        // dom_el() is a helper function in BladewindUI
        // access the value of the element

        let element_value = dom_el(`::rating-value-${element}`).value;

        // now that you have the rating value you can save it
        // maybe via an ajax call.. completely up to you
        ajaxCall(
            'post',
            '/article/rating/save',
            `rating=${element_value}`
        );
    }
</script>
```

## Disabled Click Actions

When a rating should be read-only (for example, showing a rating the user already submitted), disable hover and click actions by setting `clickable="false"`.

```blade
<x-bladewind::rating rating="4" clickable="false" />
```

## Using Rating Inside Livewire

When a star is picked, the rating's value field dispatches a real, native `change` event, so Livewire's `wire:model` picks it up without extra work. The click and keyboard bindings that drive the stars are safe to re-run, so a Livewire re-render won't leave behind duplicate listeners.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | rating | The name to uniquely identify the component by. |
| color | orange | There are twelve colors to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| type | star | Determines the type of icon to display ratings as. `star` \| `heart` \| `thumbsup` |
| size | small | Determines the size of the icons. `small` \| `medium` \| `big` |
| rating | 0 | Determines the default rating for the component. Any number between 0 and 5. Any number above 0 highlights that many icons. |
| onclick | *blank* | JavaScript function to execute when the rating is clicked. |
| clickable | true | Enable or disable click actions. `true` \| `false` |
| nonce | null | Used when implementing content security policies that require a nonce for inline scripts. For convenience, set your `nonce` value in `config/bladewind.php` under the `script` key; it will be used everywhere a nonce is required. |

## Full Example

```blade
<x-bladewind::rating
    type="heart"
    name="album-rating"
    rating="3"
    color="yellow"
    size="big"
    clickable="true"
    onclick="alert('you clicked on a star')" />
```
