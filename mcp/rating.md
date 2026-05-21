---
title: Rating Component
component: x-bladewind::rating
url: /component/rating
---

# Rating

Displays a five star rating system. The number of stars highlighted match the rating passed. There are nine star colors to choose from but the default is `orange`. Where there are multiple ratings on the same page, it is recommended to name each rating component. You can either display ratings as stars, hearts or thumbsup.

```blade
<x-bladewind::rating name="star-rating" />
```

```blade
<x-bladewind::rating
    type="heart"
    name="heart-rating" />
```

```blade
<x-bladewind::rating
    type="thumbsup"
    name="thumb-rating" />
```

## Different Colors

The BladewindUI rating component allows you to specify different colours. There are twelve colour options to pick from.

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

The BladewindUI rating component comes not just in colors but also sizes. There are three sizes available. The default size is `small`.

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

A hidden input field is created in the background with every rating component that is created. The input field uses the `name` attribute set for the rating component to uniquely identify and update the hidden input. Assuming you named your rating component `small-rating`, the following hidden input will be created. The name is prefixed with `rating-value-` so the resulting name will be `rating-value-small-rating`.

```blade
<input type="hidden" class="rating-value-small-rating" value="2" />
```

You can access this element via Javascript using the custom function you pass to the `onclick` attribute.

```blade
<x-bladewind::rating
    rating="2"
    name="small-rating"
    onclick="saveRating('small-rating')" />
```

```blade
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

In designs we are not always asking users to rate. There are times the user has already rated, and we need to display the ratings as readonly. In such cases the hover and click actions need to be disabled so the user won't modify the value of the rating. This can be achieved by setting `clickable="false"`.

```blade
<x-bladewind::rating rating="4" clickable="false" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | rating | The name to uniquely identify the component by. |
| color | orange | There are twelve colors to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| type | star | Determines the type of icon to display ratings as. `star` \| `heart` \| `thumbsup` |
| size | small | Determines the size of the stars. `small` \| `medium` \| `big` |
| rating | 0 | Determines the default rating for the component. Any number between 0 and 5. The number of stars highlighted will depend on the number passed. |
| onclick | _blank_ | Javascript function to execute when stars are clicked. |
| clickable | true | Enable or disable click actions. `true` \| `false` |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your `nonce` value in the `config/bladewind.php` file under the "script" key. |

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
