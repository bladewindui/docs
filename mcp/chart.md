---
title: Chart Component
component: x-bladewind::chart
url: /component/chart
---

# Chart

The chart component uses the Chart.js library to display various aesthetically pleasing chart types. The bar chart is the default; change the chart type by setting the `type` attribute to any type Chart.js supports.

## Basic Usage

```php
$labels = ['Red', 'Blue', 'Yellow', 'Green', 'Purple'];
$data = [12, 19, 13, 15, 9, 10];
```

```blade
<x-bladewind::chart :labels="$labels" :data="$data" title="Colour ranks" />
```

## Common Chart Options

Chart.js configuration has four top-level options: `type`, `data`, `options`, and `plugins`. BladewindUI exposes attributes corresponding to each. Whatever array you pass to `data` is formatted to JSON and passed straight to Chart.js:

```js
const config = {
    type: '{{$type}}',
    data: @json($data),
    options: @json($options),
    plugins: @json($plugins)
}
```

BladewindUI also exposes several common Chart.js options as convenience attributes: `show_axis_lines`, `show_x_axis_lines`, `show_y_axis_lines`, `show_axis_labels`, `show_x_axis_labels`, `show_y_axis_labels`, `show_borders`, `show_x_border`, `show_y_border`, `title`, `show_legend`, `legend_position`, `legend_alignment`, `bg_color`, `border_color`, and `border_width`.

When you define both `labels` and `data`, `data` is treated as just the chart data points to display, not the entire top-level `data` object (where you'd otherwise define datasets, labels, border colours, etc).

```blade
<x-bladewind::chart
    type="bar"
    :labels="$labels"
    :data="$data"
    title=""
    show_legend="false"
    show_borders="false"
    show_axis_lines="false"
    show_axis_labels="false" />
```

## Chart Types

Set `type` to any of the supported chart types. All examples below share the same `$labels`/`$data` unless noted.

```blade
<x-bladewind::chart type="area" :labels="$labels" :data="$data" show_legend="false" />

<x-bladewind::chart type="bar" :labels="$labels" :data="$data" show_legend="false" />

<x-bladewind::chart type="doughnut" :labels="$labels" :data="$data" show_legend="false" />

<x-bladewind::chart type="line" border_width="5" :labels="$labels" :data="$data" show_legend="false" />

<x-bladewind::chart type="pie" :labels="$labels" :data="$data" show_legend="false" />

<x-bladewind::chart type="polar" :labels="$labels" :data="$data" show_legend="false" />
```

Bubble, scatter, and radar charts each need their own data shape:

```php
// bubble
$bubble_labels = [];
$bubble_data = [
    ['x' => 5, 'y' => 10, 'r' => 8],
    ['x' => 10, 'y' => 15, 'r' => 6],
];

// scatter
$scatter_labels = [];
$scatter_data = [
    ['x' => -15, 'y' => 10],
    ['x' => -10, 'y' => 8],
];

// radar
$radar_labels = ['Speed', 'Strength', 'Agility', 'Endurance', 'Skill'];
$radar_data = [65, 59, 90, 81, 56];
```

```blade
<x-bladewind::chart
    type="bubble"
    bg_color="rgba(153, 102, 255, 0.5)"
    border_color="rgb(153, 102, 255)"
    :labels="$bubble_labels" :data="$bubble_data" show_legend="false" />

<x-bladewind::chart
    type="scatter"
    :labels="$scatter_labels" :data="$scatter_data" show_legend="false" />

<x-bladewind::chart
    type="radar"
    bg_color="rgba(54, 162, 235, 0.3)"
    border_color="#36A2EB" border_width="2"
    :labels="$radar_labels" :data="$radar_data" show_legend="false" />
```

Scatter charts can connect their dots with a line, off by default. Set `show_line="true"` (only applies to scatter charts).

```blade
<x-bladewind::chart
    type="scatter" show_line="true"
    :labels="$scatter_labels" :data="$scatter_data" show_legend="false" />
```

### Mixed Charts

To mix chart types, build your own chart data array with datasets for each type, then pass it to `data`. See the Chart.js docs on mixed charts for details.

```php
$data = [
    "labels" => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
    "datasets" => [
        [
            'type' => 'bar',
            'label' => 'Sales',
            'data' => [10, 20, 30, 25, 15],
            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
            'borderColor' => 'rgb(75, 192, 192)',
        ],
        [
            'type' => 'line',
            'label' => 'Trend',
            'data' => [12, 18, 28, 22, 17],
            'borderColor' => '#FF6384',
            'borderWidth' => 2,
            'fill' => false,
        ],
    ],
];
```

```blade
<x-bladewind::chart :data="$data" />
```

## Chart Data

Data is always passed via the `data` attribute, in one of two ways.

**Option 1**: set both `labels` and `data`, where `data` is only the data points, matched against corresponding labels depending on chart type.

```blade
<x-bladewind::chart :labels="$labels" :data="$data" />
```

**Option 2**: define the entire chart dataset structure yourself and pass it to `data`. Recommended for more flexibility with Chart.js configuration properties. When using this option, only `data`, `options`, and `plugins` are honoured — all other attributes are ignored since they need to be defined inside the data array.

```blade
<x-bladewind::chart :data="$data" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | random | Name of the chart for DOM accessibility. |
| labels | [] | Array of labels to display in the chart. |
| data | [] | Array of data points to display, or a comprehensive array of chart data and other properties. |
| options | [] | Array of Chart.js options. |
| plugins | [] | Array of Chart.js plugin options. |
| type | bar | `area` \| `bar` \| `bubble` \| `doughnut` \| `line` \| `pie` \| `polar` \| `radar` \| `scatter` |
| show_axis_lines | true | Show lines on both the x and y axes. `true` \| `false` |
| show_x_axis_lines | true | Show lines on the x axis. `true` \| `false` |
| show_y_axis_lines | true | Show lines on the y axis. `true` \| `false` |
| show_axis_labels | true | Show labels on both the x and y axes. `true` \| `false` |
| show_x_axis_labels | true | Show labels on the x axis. `true` \| `false` |
| show_y_axis_labels | true | Show labels on the y axis. `true` \| `false` |
| show_borders | true | Show the main x and y axes border lines. `true` \| `false` |
| show_x_border | true | Show the border on the x axis. `true` \| `false` |
| show_y_border | true | Show the border on the y axis. `true` \| `false` |
| show_line | false | Only applies to scatter charts. Shows the line connecting the dots. `true` \| `false` |
| title | *blank* | Title of the chart. |
| show_legend | true | Display the chart legend. `true` \| `false` |
| legend_position | top | `top` \| `right` \| `bottom` \| `left` \| `chartArea` |
| legend_alignment | center | `start` \| `center` \| `end` |
| bg_color | *blank* | Background colour of the chart items (e.g. each bar). Accepts colour names, hex, or rgba: `green` \| `#fff333` \| `rgba(0, 0, 0, 0.1)` |
| border_color | *blank* | Border colour of the chart items. Same accepted formats as `bg_color`. |
| border_width | 1 | Thickness of each chart item's border. Numeric value above 0. |
| nonce | null | Nonce value for content security policies applied to inline scripts. Can be set globally via the `script` key in `config/bladewind.php`. |

## Full Example

```blade
<x-bladewind::chart
    :labels="$labels"
    :data="$data"
    :options="$options"
    :plugins="$plugins"
    name="population"
    type="line"
    bg_color="green"
    border_color="yellow"
    border_width="3"
    show_axis_lines="false"
    show_axis_labels="false"
    show_borders="false"
    show_legend="false"
    title="Population Distribution" />
```
