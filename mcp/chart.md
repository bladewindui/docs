---
title: Chart Component
component: x-bladewind::chart
url: /component/chart
---

# Chart

The chart component relies on the [Chart.js](https://www.chartjs.org) library to display various aesthetically pleasing types of charts. The bar chart is the default but changing the type of chart is as simple as setting the `type` attribute to any of the acceptable chart types provided by [Chart.js](https://www.chartjs.org).

## Basic Usage

```blade
<?php
    $labels = ['Red', 'Blue', 'Yellow', 'Green', 'Purple'];
    $data = [12, 19, 13, 15, 9, 10];
```

```blade
<x-bladewind::chart :labels="$labels" :data="$data" title="Colour ranks" />
```

## Common Chart Options

There are four top level options in the [Chart.js configuration](https://www.chartjs.org/docs/latest/configuration/). These are `type`, `data`, `options` and `plugins`. BladewindUI offers attributes that correspond to each of the above mentioned options in the Chart.js top level. Passing each attribute expects you to have defined the data in a format Chart.js expects. For example, whatever array you pass into the `data` attribute will simply be formatted into JSON and passed to Chart.js as shown below.

```js
// chart.js configuration
const config = {
    type: '{{$type}}',
    // $data was passed as an attribute to the chart component
    data: @json($data),
    options: @json($options),
    plugins: @json($plugins)
}
```

BladewindUI however, exposes a few common chart options that can be passed as attributes for convenience.

| Attribute | Description |
|---|---|
| show_axis_lines | show the lines on both the x and y axes |
| show_x_axis_lines | show the lines on the x axis |
| show_y_axis_lines | show the lines on the y axis |
| show_axis_labels | show the labels on both the x and y axes |
| show_x_axis_labels | show the labels on the x axis |
| show_y_axis_labels | show the labels on the y axis |
| show_borders | show the borders around the chart. These are the main x and y axes lines. |
| show_x_border | show the border on the x axis |
| show_y_border | show the border on the y axis |
| title | title of the chart |
| show_legend | display the chart legend |
| legend_position | where should the legend be placed |
| legend_alignment | how should the legend text be aligned |
| bg_color | where applicable, this defines the background colour of the charts not the canvas |
| border_color | where applicable, this defines the border colour of the charts |
| border_width | where applicable, this defines how thick the border of each chart item should be |

> When you define both the `labels` and `data` attributes, `data` is treated as the chart data you want to display NOT the entire top level `data` object where you can define datasets, labels, border colours and many more options.

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

### Area Chart

Set `type="area"` to display an area chart.

```blade
<x-bladewind::chart
    type="area"
    :labels="$labels" :data="$data" show_legend="false" />
```

### Bar Chart

Set `type="bar"` to display a bar chart. This is the default.

```blade
<x-bladewind::chart
    type="bar"
    :labels="$labels" :data="$data" show_legend="false" />
```

### Bubble Chart

Set `type="bubble"` to display a bubble chart.

```blade
<?php
$bubble_labels = [];
$bubble_data = [
    ['x' => 5, 'y' => 10, 'r' => 8],
    ['x' => 10, 'y' => 15, 'r' => 6],
    ...
    ['x' => 85, 'y' => 26, 'r' => 7],
    ['x' => 100, 'y' => 30, 'r' => 10],
];
```

```blade
<x-bladewind::chart
    type="bubble"
    bg_color="rgba(153, 102, 255, 0.5)"
    border_color="rgb(153, 102, 255)"
    :labels="$bubble_labels" :data="$bubble_data" show_legend="false" />
```

### Doughnut Chart

Set `type="doughnut"` to display a doughnut chart.

```blade
<x-bladewind::chart
    type="doughnut"
    :labels="$labels" :data="$data" show_legend="false" />
```

### Line Chart

Set `type="line"` to display a line chart.

```blade
<x-bladewind::chart
    type="line" border_width="5"
    :labels="$labels" :data="$data" show_legend="false" />
```

### Pie Chart

Set `type="pie"` to display a pie chart.

```blade
<x-bladewind::chart
    type="pie"
    :labels="$labels" :data="$data" show_legend="false" />
```

### Polar Chart

Set `type="polar"` to display a polar chart.

```blade
<x-bladewind::chart
    type="polar"
    :labels="$labels" :data="$data" show_legend="false" />
```

### Radar Chart

Set `type="radar"` to display a radar chart.

```blade
<?php
$radar_labels = ['Speed', 'Strength', 'Agility', 'Endurance', 'Skill'];
$radar_data = [65, 59, 90, 81, 56]
```

```blade
<x-bladewind::chart
    type="radar"
    bg_color="rgba(54, 162, 235, 0.3)"
    border_color="#36A2EB" border_width="2"
    :labels="$radar_labels" :data="$radar_data" show_legend="false" />
```

### Scatter Chart

Set `type="scatter"` to display a scatter chart.

```blade
<?php
$scatter_labels = [];
$scatter_data = [
    ['x' => -15, 'y' => 10],
    ['x' => -5, 'y' => 5],
    ...
    ['x' => 30, 'y' => 13],
    ['x' => 32, 'y' => 10],
]
```

```blade
<x-bladewind::chart
    type="scatter"
    :labels="$scatter_labels" :data="$scatter_data" show_legend="false" />
```

Scatter charts can have lines connecting the dots. This is turned off by default and can be displayed by setting `show_line="true"`. This attribute only applies to scatter charts.

```blade
<x-bladewind::chart
    type="scatter" show_line="true"
    :labels="$scatter_labels" :data="$scatter_data" show_legend="false" />
```

### Mixed Charts

To define a mixture of chart types, you need to create your own chart data array that includes data for all the chart types you want to display. You then pass this array to the `data` attribute. [See this page for more details.](https://www.chartjs.org/docs/latest/charts/mixed.html)

```blade
<?php
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
        ]
    ]
];
```

```blade
<x-bladewind::chart :data="$data"  />
```

## Chart Data

All data is passed to the chart via the `data` attribute, but there are two ways to define this data.

### Option 1

This requires you to set values for both the `labels` and `data` attributes. The data in this case should only be the data points to be displayed in the chart. Each data point is matched against a corresponding label depending on the type of chart being displayed.

```blade
<?php
    $labels = ['Red', 'Blue', 'Yellow', 'Green', 'Purple'];
    $data = [12, 19, 13, 15, 9, 10];
```

```blade
<x-bladewind::chart :labels="$labels" :data="$data" />
```

### Option 2

This requires you to define the entire chart datasets in an array and pass that to the `data` attribute. This option is recommended if you require more flexibility with the properties you want to define in the [Chart.js configurations](https://www.chartjs.org/docs/latest/configuration/). When using this option, the only attributes available to the chart component are `data`, `options` and `plugins`. All other attributes are ignored since they will need to be defined in your data array.

```blade
<?php
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
        ]
    ]
];
```

```blade
<x-bladewind::chart :data="$data"  />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | random | The name of the chart for DOM accessibility |
| labels | `[]` | An array of labels to display in the chart |
| data | `[]` | An array of data points to display in the chart. Alternatively, this can be a comprehensive array of chart data and other properties |
| options | `[]` | An array of chart options as provided in the [Chart.js documentation](https://www.chartjs.org/docs/latest/general/options.html) |
| plugins | `[]` | An array of plugin options as provided in the [Chart.js documentation](https://www.chartjs.org/docs/latest/general/options.html) |
| type | `bar` | Type of chart to display: `area` `bar` `bubble` `doughnut` `line` `pie` `polar` `radar` `scatter` |
| show_axis_lines | `true` | Show the lines on both the x and y axes. `true` `false` |
| show_x_axis_lines | `true` | Show the lines on the x axis. `true` `false` |
| show_y_axis_lines | `true` | Show the lines on the y axis. `true` `false` |
| show_axis_labels | `true` | Show the labels on both the x and y axes. `true` `false` |
| show_x_axis_labels | `true` | Show the labels on the x axis. `true` `false` |
| show_y_axis_labels | `true` | Show the labels on the y axis. `true` `false` |
| show_borders | `true` | Show the borders around the chart. These are the main x and y axes lines. `true` `false` |
| show_x_border | `true` | Show the border on the x axis. `true` `false` |
| show_y_border | `true` | Show the border on the y axis. `true` `false` |
| show_line | `false` | Only applicable to scatter charts. Show the line that connects the dots. `true` `false` |
| title | blank | Title of the chart |
| show_legend | `true` | Display the chart legend. `true` `false` |
| legend_position | `top` | Where should the legend be placed. `top` `right` `bottom` `left` `chartArea` |
| legend_alignment | `center` | How should the legend text be aligned. `start` `center` `end` |
| bg_color | blank | Defines the background colour of the charts not the canvas. Accepts rgb, hex and normal colour names. e.g. `green` `#fff333` `rgba(0, 0, 0, 0.1)` |
| border_color | blank | Defines the border colour of the charts. Accepts rgb, hex and normal colour names. e.g. `green` `#fff333` `rgba(0, 0, 0, 0.1)` |
| border_width | `1` | Defines how thick the border of each chart item should be. Must be numeric value above 0 |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts |

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
