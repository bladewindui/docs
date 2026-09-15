---
title: Sidebar Navigation Component
component: x-bladewind::sidebar
url: /component/sidebar
---

# Sidebar

Sidebar provides structured application navigation with named sections, nested groups, explicit active state, desktop collapse, and a Bladewind Drawer on mobile. It uses one navigation tree for both presentations, so item state, group state, IDs, and the accessible navigation landmark stay synchronized.

## Basic Usage

```blade
<x-bladewind::sidebar name="workspace-navigation" label="Workspace navigation" active="orders" collapsible="true" mobile="drawer">
    <x-slot:header>Acme Workspace</x-slot:header>
    <x-bladewind::sidebar.group name="workspace" label="Workspace" icon="squares-2x2" expanded="true">
        <x-bladewind::sidebar.item name="overview" label="Overview" href="/dashboard" icon="home" />
        <x-bladewind::sidebar.item name="orders" label="Orders" href="/orders" icon="shopping-bag" description="Review fulfilment" badge="12" />
        <x-bladewind::sidebar.item name="customers" label="Customers" href="/customers" icon="users" />
    </x-bladewind::sidebar.group>
    <x-slot:footer><x-bladewind::avatar image="/images/avatar.png" name="Ama Mensah" /></x-slot:footer>
</x-bladewind::sidebar>
```

## Desktop Expanded and Collapsed States

Set `collapsible="true"` to allow compact icon-only presentation. The optional collapse control is shown by default for a collapsible Sidebar. Labels remain available through accessible names and native tooltips. Nested destinations stay in the navigation tree and group state is preserved.

```js
collapseSidebar('workspace-navigation');
expandSidebar('workspace-navigation');
toggleSidebar('workspace-navigation');
```

## Navigation Sections and Active State

Groups create named navigation sections. Set `active` on the Sidebar to one item name; this value is the canonical active state and takes precedence over item-level `active` values. If the Sidebar has no active value, the first enabled item marked active wins. Sidebar does not inspect the current request URL.

Only the selected destination receives `aria-current="page"`. Set `multiple-active="true"` only when the application intentionally has several current destinations.

## Nested and Collapsible Navigation

Groups can contain items and other groups. An active descendant opens every ancestor. A collapsed group hides its descendants from visual and keyboard navigation without deleting their state.

```blade
<x-bladewind::sidebar name="nested-navigation" label="Administration navigation" active="roles" mobile="none">
    <x-slot:header><strong>Administration</strong></x-slot:header>
    <x-bladewind::sidebar.group name="organization" label="Organization" icon="building-office-2" expanded="true">
        <x-bladewind::sidebar.item name="teams" label="Teams" href="#teams" icon="user-group" />
        <x-bladewind::sidebar.group name="access" label="Access control" icon="key">
            <x-bladewind::sidebar.group name="permissions" label="Permissions">
                <x-bladewind::sidebar.item name="roles" label="Roles and permissions" href="#roles" description="Manage policy assignments" badge="4" />
                <x-bladewind::sidebar.item name="audit" label="Access audit" href="#audit" />
            </x-bladewind::sidebar.group>
        </x-bladewind::sidebar.group>
    </x-bladewind::sidebar.group>
</x-bladewind::sidebar>
```

## Mobile Drawer Presentation

`mobile="drawer"` is the default. Below 1024 pixels, `openSidebar()` moves the same Sidebar into the existing Bladewind Drawer, which supplies Escape dismissal, backdrop dismissal, focus trapping, focus restoration, and body scroll locking. The Sidebar returns to its desktop host after close.

`close-on-navigate` defaults to `true`; it closes the mobile Drawer after an enabled item is activated. Persistence and route matching are not enabled automatically. Set `mobile="none"` when no mobile presentation is needed.

## Left and Right Placement

`left` and `right` are physical edges in desktop and mobile layouts. `start` and `end` follow the computed text direction, which makes logical placement suitable when one layout serves both left-to-right and right-to-left languages.

```blade
<x-bladewind::sidebar name="left-example" label="Left navigation" placement="left" mobile="none">
    <x-bladewind::sidebar.item name="home" label="Home" href="#home" icon="home" active="true" />
</x-bladewind::sidebar>

<x-bladewind::sidebar name="right-example" label="Right navigation" placement="right" mobile="none">
    <x-bladewind::sidebar.item name="inbox" label="Inbox" href="#inbox" icon="inbox" badge="8" active="true" />
</x-bladewind::sidebar>
```

## Multiple Independent Sidebars

Every helper resolves one named instance. Groups with the same name can safely exist in separate Sidebars because state and persistence are scoped to the Sidebar root.

```js
collapseSidebar('project-navigation');
expandSidebarGroup('account-navigation', 'settings');
```

## Persistent State

Persistence is opt-in. Set `persist="true"` for desktop collapse state and `persist-groups="true"` for expanded groups. The default key is `bladewind:sidebar:{name}`. Supply `storage-key` when an application needs a different namespace. Invalid or unavailable browser storage is ignored safely.

```blade
<x-bladewind::sidebar name="admin-navigation" persist="true" persist-groups="true" storage-key="acme:admin-sidebar">
    ...
</x-bladewind::sidebar>
```

## Long Labels and Large Navigation Sets

Long labels wrap inside the available width. Full-height and content-height Sidebars cap themselves at the viewport and keep scrolling inside the navigation region. The header and footer remain sticky while a large tree scrolls.

## Dark Mode

Sidebar follows the page dark class and keeps active, hover, focus, border, description, and badge contrast readable. Drawer uses the same dark theme because it receives the original Sidebar DOM.

## RTL Behavior

Set `dir="rtl"` on the Sidebar or an ancestor. Logical start and end placement reverse automatically. Indentation, alignment, and horizontal keyboard behavior follow the computed direction. In RTL, Left Arrow opens or enters a group and Right Arrow closes or returns to its parent.

## Accessibility and Keyboard Guidance

Sidebar renders one labelled navigation landmark with semantic lists. Active links use `aria-current="page"`. Group buttons use `aria-expanded` and `aria-controls`. Disabled items cannot receive focus or activate.

| Key | Behavior |
|---|---|
| Enter or Space | Activate a group button or button-like item. |
| Up Arrow or Down Arrow | Move through visible enabled controls. |
| Home or End | Move to the first or last visible control. |
| Right Arrow | Open or enter a group in LTR. Close or return in RTL. |
| Left Arrow | Close or return in LTR. Open or enter in RTL. |
| Escape | Close the mobile Drawer and restore focus to its trigger. |

## Events

Before events are cancelable. Call `preventDefault()` to stop the related state change or navigation action. Details include `sidebarName`, `presentation`, `placement`, `source`, and `triggeringElement`. State events add previous and next state. Group and item events add their names.

| Event suffix | When it runs |
|---|---|
| `before-open`, `before-close` | Before mobile Drawer presentation changes. |
| `opened`, `closed` | After Drawer finishes the change. |
| `before-collapse`, `before-expand` | Before desktop compact state changes. |
| `collapsed`, `expanded` | After desktop compact state changes. |
| `group:before-change`, `group:changed` | Before and after a named group changes. |
| `item-activate` | When a button-like item is activated. |
| `before-navigate` | Before a link continues and configured mobile auto-close runs. |

## JavaScript API

Helpers return `true` on success or when the requested state already applies. They return `false` for missing, disabled, unsupported, or canceled targets.

```js
openSidebar('workspace-navigation');
closeSidebar('workspace-navigation');
toggleSidebar('workspace-navigation');
collapseSidebar('workspace-navigation');
expandSidebar('workspace-navigation');
toggleSidebarGroup('workspace-navigation', 'settings');
expandSidebarGroup('workspace-navigation', 'settings');
collapseSidebarGroup('workspace-navigation', 'settings');
resetSidebar('workspace-navigation');
```

## Using Sidebar Inside Livewire

Which groups are expanded or collapsed, and on mobile whether the sidebar itself is open, live in the sidebar's own DOM rather than in Livewire's component state. The persistence options described above re-read that state from storage when the sidebar first initialises, but a Livewire re-render that touches this markup mid-interaction, for a reason that has nothing to do with the sidebar, can still reset it. If the sidebar lives inside a component that can re-render for other reasons, wrap it in `wire:ignore`. The bindings that drive the sidebar are delegated and safe to re-run, so a re-render will not leave behind duplicate listeners.

## Attributes

### Sidebar Attributes

| Attribute | Default | Description |
|---|---|---|
| name | Generated | Unique public helper and state scope. |
| label | Sidebar navigation | Accessible navigation name. |
| active | null | Canonical active item name. |
| placement | left | `left`, `right`, `start`, or `end`. |
| mobile | drawer | `drawer` or `none`. |
| mobile-size | small | Existing Drawer size. |
| collapsible | false | Enables desktop compact mode. |
| collapsed | false | Initial desktop state. |
| show-collapse-control | true | Shows the control when collapsible. |
| close-on-navigate | true | Closes mobile Drawer after activation. |
| persist | false | Persists desktop collapsed state. |
| persist-groups | false | Persists group state. |
| storage-key | Derived from name | Sidebar-specific localStorage key. |
| height | full | `full` or `content`. |
| multiple-active | false | Allows several explicit active items only when root active is omitted. |
| collapse-label | Collapse navigation | Accessible collapse control label. |
| expand-label | Expand navigation | Accessible expand control label. |
| close-label | Close navigation | Accessible mobile close label. |

### Sidebar Group Attributes

| Attribute | Default | Description |
|---|---|---|
| name | Required | Name scoped to its Sidebar. |
| label | Required | Visible and accessible section label. |
| icon | null | Heroicon name. |
| icon-type | outline | Icon type. |
| icon-dir | empty | Custom icon directory. |
| expanded | false | Initial expanded state. |
| disabled | false | Prevents group activation. |

### Sidebar Item Attributes

| Attribute | Default | Description |
|---|---|---|
| name | Required | Active state and event identifier. |
| label | empty | Visible and accessible label. |
| href | null | Link destination. Omit for a button action. |
| icon | null | Heroicon name. |
| icon-type | outline | Icon type. |
| icon-dir | empty | Custom icon directory. |
| description | null | Secondary item text. |
| badge | null | Counter or status value. |
| badge-label | Derived | Screen reader meaning for the badge. |
| active | false | Explicit active state when root active is omitted. |
| disabled | false | Removes activation and focus. |
| external | false | Adds external link semantics and indicator. |
| target | null | Link target. |

## Slots

| Slot | Description |
|---|---|
| sidebar header | Brand, workspace switcher, or composed header content. |
| sidebar default | Sidebar groups and items. |
| sidebar footer | Account, status, or footer actions. |
| group default | Nested groups and items. |
| item default | Custom item copy while Sidebar keeps icon, badge, and action semantics. |

## Full Example

```blade
<x-bladewind::sidebar
    name="account-navigation"
    label="Account navigation"
    active="billing"
    placement="start"
    mobile="drawer"
    mobile-size="small"
    collapsible="true"
    collapsed="false"
    show-collapse-control="true"
    close-on-navigate="true"
    persist="true"
    persist-groups="true"
    storage-key="acme:account-navigation"
    height="full"
    multiple-active="false"
    collapse-label="Collapse account navigation"
    expand-label="Expand account navigation"
    close-label="Close account navigation"
    class="account-sidebar"
    data-region="account">
    <x-slot:header>Acme Account</x-slot:header>
    <x-bladewind::sidebar.group name="settings" label="Settings" icon="cog-6-tooth" icon-type="outline" icon-dir="" expanded="true" disabled="false">
        <x-bladewind::sidebar.item name="billing" label="Billing" href="/billing" icon="credit-card" icon-type="outline" icon-dir="" description="Plans and invoices" badge="2" badge-label="2 unpaid invoices" active="false" disabled="false" external="false" target="_self" class="billing-link" data-area="finance" />
    </x-bladewind::sidebar.group>
    <x-slot:footer>Account footer</x-slot:footer>
</x-bladewind::sidebar>
```
