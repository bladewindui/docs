<x-app>
    <x-slot:title>Releasing BladewindUI</x-slot:title>
    <x-slot:page_title>Releasing BladewindUI</x-slot:page_title>

    <p>
        All work happens in <strong>this monorepo</strong>, hosted at <code class="inline">mkocansey/bladewind</code>
        (your local clone may sit in a directory called <code class="inline">bladewindui</code> — that's just a local folder name;
        the GitHub remote and the Packagist source are both <code class="inline">mkocansey/bladewind</code>).
        The individual package repos (<code class="inline">mkocansey/bladewind-table</code> etc.) are
        <strong>read-only mirrors</strong> — never push to them directly.
    </p>

    <x-bladewind::alert type="warning" show_close_icon="false">
        <strong>Never target a split repo named <code class="inline">bladewind</code>.</strong> That name belongs to <em>this</em>
        monorepo's own remote. A matrix entry that splits <code class="inline">packages/meta</code> into a repo called
        <code class="inline">bladewind</code> makes the split action force-push filtered subtree history into its own parent,
        overwriting <code class="inline">main</code> (this happened on 2026-06-08 — <code class="inline">main</code> was wiped
        down to 3 files and had to be restored from a contributor's local clone). See the note above the (deliberately absent)
        <code class="inline">packages/meta</code> entry in <code class="inline">split-packages.yml</code>.
    </x-bladewind::alert>

    <h2 id="root-composer">Root <code class="inline">composer.json</code> — why it is a <code class="inline">library</code> with <code class="inline">replace</code></h2>
    <p>
        The monorepo root is named <code class="inline">mkocansey/bladewind</code> and declares <code class="inline">type: library</code>
        so that downstream projects can depend on it directly via a Composer <strong>path repository</strong> during local development:
    </p>
    <pre class="language-js line-numbers">
<code>
"repositories": {
    "mkocansey/bladewind": {
        "type": "path",
        "url": "/path/to/bladewindui"
    }
}
</code>
    </pre>
    <p>
        The <code class="inline">replace</code> block tells Composer that installing the root package also satisfies every
        sub-package requirement (e.g. <code class="inline">mkocansey/bladewind-button ^2.0</code>), so no network calls are made
        for the individual split repos during local dev.
    </p>
    <p>
        The <code class="inline">extra.laravel.providers</code> list registers all component service providers so Laravel
        auto-discovers them from a single path-repo install.
    </p>
    <p>
        <strong>On Packagist</strong>, <code class="inline">mkocansey/bladewind</code> is sourced <strong>directly from this monorepo</strong>
        (<code class="inline">github.com/mkocansey/bladewind</code>) — and has been since 2022 (versions v3.0.10 through the current
        release all resolve to this repo's root, per Packagist's own <code class="inline">source.url</code> metadata). The root
        <code class="inline">composer.json</code> <em>is</em> the published full-install package: its <code class="inline">replace</code>
        block declares every granular sub-package at <code class="inline">self.version</code>, so installing
        <code class="inline">mkocansey/bladewind</code> transparently satisfies <code class="inline">mkocansey/bladewind-button</code>,
        <code class="inline">mkocansey/bladewind-table</code>, etc. without Composer ever touching the split repos.
    </p>
    <p>
        <code class="inline">packages/meta</code> is <strong>intentionally not split</strong> into its own repo — doing so would
        require a split target literally named <code class="inline">bladewind</code>, which collides with this monorepo's own
        remote (see the warning above, and the explanatory note in <code class="inline">split-packages.yml</code> where that
        matrix entry would otherwise go).
    </p>

    <h2 id="first-time">First-time Setup</h2>

    <h3 id="create-repos">1. Create the split repos on GitHub</h3>
    <p>
        Create one empty public repo per package (no README, no licence — keep them completely empty).
        There are <strong>48 repos</strong> in total — one per <code class="inline">packages/*</code> directory plus the full-install meta repo:
    </p>
    <pre class="language-bash line-numbers">
<code>
# Foundation
mkocansey/bladewind-core
mkocansey/bladewind-icon
mkocansey/bladewind-script
mkocansey/bladewind-spinner
mkocansey/bladewind-button
mkocansey/bladewind-alert
mkocansey/bladewind-bell
mkocansey/bladewind-notification
mkocansey/bladewind-modal
mkocansey/bladewind-table

# Forms leaf packages
mkocansey/bladewind-input
mkocansey/bladewind-textarea
mkocansey/bladewind-select
mkocansey/bladewind-checkbox
mkocansey/bladewind-radio
mkocansey/bladewind-toggle
mkocansey/bladewind-datepicker
mkocansey/bladewind-timepicker
mkocansey/bladewind-colorpicker
mkocansey/bladewind-filepicker
mkocansey/bladewind-slider
mkocansey/bladewind-checkcards
mkocansey/bladewind-number
mkocansey/bladewind-code

# Forms aggregate (metapackage)
mkocansey/bladewind-forms

# Content leaf packages
mkocansey/bladewind-card
mkocansey/bladewind-contact-card
mkocansey/bladewind-avatar
mkocansey/bladewind-accordion
mkocansey/bladewind-tag
mkocansey/bladewind-timeline
mkocansey/bladewind-statistic
mkocansey/bladewind-rating
mkocansey/bladewind-horizontal-line-graph
mkocansey/bladewind-empty-state
mkocansey/bladewind-centered-content
mkocansey/bladewind-chart
mkocansey/bladewind-progress
mkocansey/bladewind-listview
mkocansey/bladewind-tooltip
mkocansey/bladewind-popover

# Content aggregate (metapackage)
mkocansey/bladewind-content

# Navigation leaf packages
mkocansey/bladewind-tab
mkocansey/bladewind-dropmenu
mkocansey/bladewind-pagination
mkocansey/bladewind-theme-switcher

# Navigation aggregate (metapackage)
mkocansey/bladewind-navigation

# Full-install meta package
mkocansey/bladewind          ← maps to packages/meta/
</code>
    </pre>

    <h3 id="actions-secret">2. Add the GitHub Actions secret</h3>
    <p>
        In <strong>this monorepo's</strong> Settings → Secrets and variables → Actions, add:
    </p>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Secret name</th>
            <th>Value</th>
        </x-slot>
        <tr>
            <td nowrap="nowrap"><code class="inline">MONOREPO_SPLIT_TOKEN</code></td>
            <td>A GitHub personal access token (classic) with <code class="inline">repo</code> scope, or a fine-grained token with <strong>Contents: Read and write</strong> on all split repos</td>
        </tr>
    </x-bladewind::table>

    <h3 id="register-packagist">3. Register each split repo on Packagist</h3>
    <p>
        Go to <a href="https://packagist.org/packages/submit" target="_blank">packagist.org/packages/submit</a> and submit each
        split repo URL. Enable the GitHub webhook so Packagist auto-updates on new tags.
    </p>

    <h2 id="release-flow">Day-to-day Release Flow</h2>
    <pre class="language-bash line-numbers">
<code>
# 1. Make sure you're on main and everything is committed
git checkout main &amp;&amp; git pull

# 2. Install monorepo-builder (first time only)
composer install

# 3. Validate all package composer.json files are consistent
vendor/bin/monorepo-builder validate

# 4. Release — this command does everything:
#    a) bumps all inter-package version constraints to the new version
#    b) commits the change
#    c) tags the monorepo commit as vX.Y.Z
#    d) pushes the tag to GitHub
#    → GitHub Actions split-packages.yml fires automatically
#    → each packages/* directory is pushed to its read-only repo
#    → the same tag is applied to each split repo
#    → Packagist picks up the new release via webhook
vendor/bin/monorepo-builder release 2.1.0

# 5. Done. Monitor the Actions tab to confirm all 44 splits succeeded.
</code>
    </pre>

    <h2 id="semver">Semantic Versioning Rules</h2>
    <ul class="list-disc pl-6 space-y-2 my-4">
        <li><strong>Patch</strong> (<code class="inline">2.0.x</code>) — bug fixes, no API changes</li>
        <li><strong>Minor</strong> (<code class="inline">2.x.0</code>) — new attributes/features, backward compatible</li>
        <li><strong>Major</strong> (<code class="inline">x.0.0</code>) — breaking changes (attribute renamed/removed, SP class moved)</li>
    </ul>
    <p>
        All packages always share the same version number. The monorepo-builder enforces this.
    </p>

    <h2 id="architecture">Package Architecture</h2>
    <p>
        Every component is a <strong>standalone leaf package</strong> that users can install individually:
    </p>
    <pre class="language-bash line-numbers">
<code>
composer require mkocansey/bladewind-accordion   # just accordion
composer require mkocansey/bladewind-table       # just table (pulls exact deps)
</code>
    </pre>
    <p>
        Three <strong>aggregate metapackages</strong> bundle related components for convenience:
    </p>
    <pre class="language-bash line-numbers">
<code>
composer require mkocansey/bladewind-forms       # all form components
composer require mkocansey/bladewind-content     # all content components
composer require mkocansey/bladewind-navigation  # all navigation components
</code>
    </pre>
    <p>
        The full install meta-package pulls everything:
    </p>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind</code></pre>
    <p>
        Aggregate packages are <code class="inline">type: metapackage</code> — they contain no code, only a <code class="inline">require</code> list.
    </p>

    <h2 id="adding-component">Adding a New Component</h2>
    <ol class="list-decimal pl-6 space-y-3 my-4">
        <li>
            Create <code class="inline">packages/&lt;name&gt;/</code> with:
            <ul class="list-disc pl-6 space-y-1 mt-2">
                <li><code class="inline">composer.json</code> (name: <code class="inline">mkocansey/bladewind-&lt;name&gt;</code>, type: <code class="inline">library</code>) — list only the leaf packages it actually depends on in <code class="inline">require</code> (grep the blade file for <code class="inline">&lt;x-bladewind::*</code> to find them)</li>
                <li><code class="inline">src/Bladewind&lt;Name&gt;ServiceProvider.php</code> — use the <code class="inline">is_dir()</code> guard pattern for <code class="inline">bladewind-public</code> (see below)</li>
                <li><code class="inline">config/bladewind.php</code> (just this component's config keys)</li>
                <li><code class="inline">resources/views/components/</code> (blade files)</li>
            </ul>
        </li>
        <li>
            Add to root <code class="inline">composer.json</code> — three places:
            <ul class="list-disc pl-6 space-y-1 mt-2">
                <li><code class="inline">autoload.psr-4</code>: <code class="inline">"Mkocansey\\Bladewind\\&lt;Name&gt;\\": "packages/&lt;name&gt;/src/"</code></li>
                <li><code class="inline">replace</code>: <code class="inline">"mkocansey/bladewind-&lt;name&gt;": "self.version"</code></li>
                <li><code class="inline">extra.laravel.providers</code>: <code class="inline">"Mkocansey\\Bladewind\\&lt;Name&gt;\\Bladewind&lt;Name&gt;ServiceProvider"</code></li>
            </ul>
        </li>
        <li>
            Add a matrix entry to <code class="inline">.github/workflows/split-packages.yml</code>:
            <pre class="language-yaml line-numbers">
<code>
- { local_path: 'packages/&lt;name&gt;', split_repository: 'bladewind-&lt;name&gt;' }
</code>
            </pre>
        </li>
        <li>If the component belongs to a group (forms/content/navigation), add it to the relevant <code class="inline">packages/&lt;group&gt;/composer.json</code> <code class="inline">require</code></li>
        <li>Add it to <code class="inline">packages/meta/composer.json</code> <code class="inline">require</code> (or it'll be pulled transitively via the group)</li>
        <li>Add its config keys to <code class="inline">packages/meta/config/bladewind.php</code></li>
        <li>Create the empty GitHub repo <code class="inline">mkocansey/bladewind-&lt;name&gt;</code></li>
        <li>Register it on Packagist with a GitHub webhook</li>
        <li>Release a new minor version</li>
    </ol>

    <h3 id="sp-template">Service provider template for new components</h3>
    <p>
        Use this exact pattern — the <code class="inline">is_dir()</code> guards prevent errors when a package has no CSS or no
        <code class="inline">public/</code> directory:
    </p>
    <pre class="language-php line-numbers">
<code>
&lt;?php

namespace Mkocansey\Bladewind\&lt;Name&gt;;

use Illuminate\Support\ServiceProvider;

class Bladewind&lt;Name&gt;ServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this-&gt;mergeConfigFrom(__DIR__.'/../config/bladewind.php', 'bladewind');
    }

    public function boot(): void
    {
        $this-&gt;loadViewsFrom(__DIR__.'/../resources/views', 'bladewind');

        $this-&gt;publishes([
            __DIR__.'/../resources/views/components/' =&gt; resource_path('views/components/bladewind'),
        ], 'bladewind-components');

        $bladewindPublicPaths = [];
        if (is_dir(__DIR__.'/../resources/assets/css')) {
            $bladewindPublicPaths[__DIR__.'/../resources/assets/css/'] = public_path('vendor/bladewind/css');
        }
        if (is_dir(__DIR__.'/../public')) {
            $bladewindPublicPaths[__DIR__.'/../public/'] = public_path('vendor/bladewind');
        }
        if (!empty($bladewindPublicPaths)) {
            $this-&gt;publishes($bladewindPublicPaths, 'bladewind-public');
        }
    }
}
</code>
    </pre>

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#root-composer">Root composer.json</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#first-time">First-time setup</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#create-repos">Create split repos</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#actions-secret">Actions secret</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#register-packagist">Register on Packagist</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#release-flow">Day-to-day release flow</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#semver">Semantic versioning</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#architecture">Package architecture</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#adding-component">Adding a new component</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#sp-template">Service provider template</a></div>
    </x-slot:side_nav>
</x-app>
