<x-app>
    <x-slot:title>Releasing BladewindUI</x-slot:title>
    <x-slot:page_title>Releasing BladewindUI</x-slot:page_title>

    <p>
        All work happens in <strong>this monorepo</strong>, hosted at <code class="inline">bladewindui/ui</code>.
        The individual package repos (<code class="inline">bladewindui/table</code> etc.) are
        <strong>read-only mirrors</strong>. Never push to them directly.
    </p>
    <p>
        The package has carried three names over its life. It started as <code class="inline">mkocansey/bladewind</code>,
        moved to <code class="inline">bladewindui/bladewindui</code>, and now lives at <code class="inline">bladewindui/ui</code>.
        Each old name still works: Packagist keeps a metapackage shim at both <code class="inline">mkocansey/bladewind</code>
        and <code class="inline">bladewindui/bladewindui</code> that simply requires <code class="inline">bladewindui/ui</code>,
        so a project still pinned to an old name picks up the real package on its next <code class="inline">composer update</code>
        with no code changes.
    </p>

    <x-bladewind::alert type="warning" show_close_icon="false">
        <strong>Never target a split repo named <code class="inline">bladewindui</code> or <code class="inline">ui</code>.</strong>
        Either name resolves to <em>this</em> monorepo's own remote. A matrix entry that splits
        <code class="inline">packages/meta</code> into a repo with either name makes the split action force-push filtered
        subtree history into its own parent, overwriting <code class="inline">main</code>. This happened on 2026-06-08, back
        when the monorepo lived at <code class="inline">mkocansey/bladewind</code> and an entry targeted the name
        <code class="inline">bladewind</code>. <code class="inline">main</code> was wiped down to 3 files and had to be
        restored from a contributor's local clone. See the note above the (deliberately absent)
        <code class="inline">packages/meta</code> entry in <code class="inline">split-packages.yml</code>.
    </x-bladewind::alert>

    <x-bladewind::alert show_close_icon="false">
        If your project's Tailwind config has a hardcoded <code class="inline">vendor/bladewindui/bladewindui</code> path
        left over from before the last rename, update it to <code class="inline">vendor/bladewindui/ui</code>. Composer
        will not warn you: the build just quietly stops generating utilities scanned from BladeWind templates, and styles
        go missing.
    </x-bladewind::alert>

    <h2 id="root-composer">Root <code class="inline">composer.json</code>, why it is a <code class="inline">library</code> with <code class="inline">replace</code></h2>
    <p>
        The monorepo root is named <code class="inline">bladewindui/ui</code> and declares <code class="inline">type: library</code>
        so that downstream projects can depend on it directly via a Composer <strong>path repository</strong> during local development:
    </p>
    <pre class="language-js line-numbers">
<code>
"repositories": {
    "bladewindui/ui": {
        "type": "path",
        "url": "/path/to/bladewindui"
    }
}
</code>
    </pre>
    <p>
        The <code class="inline">replace</code> block tells Composer that installing the root package also satisfies every
        sub-package requirement (e.g. <code class="inline">bladewindui/button ^5.0</code>), so no network calls are made
        for the individual split repos during local dev.
    </p>
    <p>
        The <code class="inline">extra.laravel.providers</code> list registers all component service providers so Laravel
        auto-discovers them from a single path-repo install.
    </p>
    <p>
        <strong>On Packagist</strong>, <code class="inline">bladewindui/ui</code> is sourced <strong>directly from this monorepo</strong>
        (<code class="inline">github.com/bladewindui/ui</code>). The root <code class="inline">composer.json</code>
        <em>is</em> the published full-install package: its <code class="inline">replace</code> block declares every
        granular sub-package at <code class="inline">self.version</code>, so installing <code class="inline">bladewindui/ui</code>
        transparently satisfies <code class="inline">bladewindui/button</code>, <code class="inline">bladewindui/table</code>,
        etc. without Composer ever touching the split repos.
    </p>
    <p>
        <code class="inline">packages/meta</code> is <strong>intentionally not split</strong> into its own repo. Doing so would
        require a split target named <code class="inline">bladewindui</code> or <code class="inline">ui</code>, which collides
        with this monorepo's own remote (see the warning above, and the explanatory note in <code class="inline">split-packages.yml</code>
        where that matrix entry would otherwise go).
    </p>

    <h2 id="first-time">First-time Setup</h2>

    <h3 id="create-repos">1. Create the split repos on GitHub</h3>
    <p>
        Create one empty public repo per package (no README, no licence, keep them completely empty).
        There are <strong>55 split repos</strong> in total, one per <code class="inline">packages/*</code> directory, plus the
        full-install meta package which is <strong>not</strong> split (see above):
    </p>
    <pre class="language-bash line-numbers">
<code>
# Foundation
bladewindui/core
bladewindui/icon
bladewindui/script
bladewindui/spinner
bladewindui/button
bladewindui/alert
bladewindui/bell
bladewindui/notification
bladewindui/modal
bladewindui/drawer
bladewindui/table
bladewindui/data-grid

# Forms leaf packages
bladewindui/input
bladewindui/textarea
bladewindui/select
bladewindui/checkbox
bladewindui/radio
bladewindui/toggle
bladewindui/datepicker
bladewindui/timepicker
bladewindui/colorpicker
bladewindui/filepicker
bladewindui/slider
bladewindui/checkcards
bladewindui/number
bladewindui/code

# Forms aggregate (metapackage)
bladewindui/forms

# Content leaf packages
bladewindui/card
bladewindui/contact-card
bladewindui/avatar
bladewindui/accordion
bladewindui/tag
bladewindui/timeline
bladewindui/statistic
bladewindui/rating
bladewindui/horizontal-line-graph
bladewindui/empty-state
bladewindui/centered-content
bladewindui/chart
bladewindui/progress
bladewindui/listview
bladewindui/tooltip
bladewindui/popover
bladewindui/sortable
bladewindui/calendar

# Content aggregate (metapackage)
bladewindui/content

# Navigation leaf packages
bladewindui/breadcrumbs
bladewindui/sidebar
bladewindui/command-palette
bladewindui/stepper
bladewindui/tab
bladewindui/dropmenu
bladewindui/pagination
bladewindui/theme-switcher

# Navigation aggregate (metapackage)
bladewindui/navigation

# Full-install meta package, NOT split, sourced directly from this monorepo
bladewindui/ui                ← maps to packages/meta/
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
        split repo URL.
    </p>
    <x-bladewind::alert type="warning" show_close_icon="false">
        Packagist reads the package name from <code class="inline">composer.json</code> in the repo's default branch, and a
        freshly created split repo starts out completely empty. Submitting it before the first release fails with
        &quot;No composer.json was found in the main branch.&quot; Cut the release first (see the flow below), which populates
        every split repo through the GitHub Action, then register each one on Packagist afterwards.
    </x-bladewind::alert>
    <p>
        Once registered, enable the GitHub webhook so Packagist auto-updates on new tags. Add a webhook on the split repo with:
    </p>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Field</th>
            <th>Value</th>
        </x-slot>
        <tr>
            <td nowrap="nowrap">Payload URL</td>
            <td><code class="inline">https://packagist.org/api/github?username=your-packagist-username</code></td>
        </tr>
        <tr>
            <td nowrap="nowrap">Content type</td>
            <td><code class="inline">application/json</code></td>
        </tr>
        <tr>
            <td nowrap="nowrap">Secret</td>
            <td>your Packagist API token (Profile → Your API Tokens)</td>
        </tr>
        <tr>
            <td nowrap="nowrap">Events</td>
            <td>Just the <code class="inline">push</code> event</td>
        </tr>
    </x-bladewind::table>
    <x-bladewind::alert type="warning" show_close_icon="false">
        The <strong>Secret</strong> field is not optional. Packagist signs its expected request and compares it against
        what GitHub sends, so a webhook created without a secret is accepted by GitHub but silently rejected by Packagist
        with a 403 on every delivery, push included. The package still updates eventually through Packagist's weekly crawl,
        so the failure is easy to miss for a long time. Check a repo's webhook deliveries (Settings → Webhooks → the hook →
        Recent Deliveries) if a package's &quot;Not Auto-Updated&quot; badge will not clear.
    </x-bladewind::alert>

    <h2 id="release-flow">Day-to-day Release Flow</h2>
    <pre class="language-bash line-numbers">
<code>
# 1. Make sure you're on main and everything is committed
git checkout main &amp;&amp; git pull

# 2. Install monorepo-builder (first time only)
composer install

# 3. Validate all package composer.json files are consistent
vendor/bin/monorepo-builder validate

# 4. Release. This command does everything:
#    a) bumps all inter-package version constraints to the new version
#    b) commits the change
#    c) tags the monorepo commit as vX.Y.Z
#    d) pushes the tag to GitHub
#    → GitHub Actions split-packages.yml fires automatically
#    → each packages/* directory is pushed to its read-only repo
#    → the same tag is applied to each split repo
#    → Packagist picks up the new release via webhook
vendor/bin/monorepo-builder release v5.0.0

# 5. Done. Monitor the Actions tab to confirm all 55 splits succeeded.
</code>
    </pre>
    <x-bladewind::alert show_close_icon="false">
        If <code class="inline">development</code> has moved ahead of <code class="inline">main</code> since the last
        release, merge <code class="inline">development</code> into <code class="inline">main</code> first. A leaf package
        added on <code class="inline">development</code> after the last release still carries the old version constraint
        (<code class="inline">^4.4</code> instead of the current line), and <code class="inline">monorepo-builder validate</code>
        will refuse to proceed until every package agrees. After releasing, merge <code class="inline">main</code> back into
        <code class="inline">development</code> so the branches do not drift apart again before the next release.
    </x-bladewind::alert>

    <h2 id="semver">Semantic Versioning Rules</h2>
    <ul class="list-disc pl-6 space-y-2 my-4">
        <li><strong>Patch</strong> (<code class="inline">2.0.x</code>). Bug fixes, no API changes.</li>
        <li><strong>Minor</strong> (<code class="inline">2.x.0</code>). New attributes or features, backward compatible.</li>
        <li><strong>Major</strong> (<code class="inline">x.0.0</code>). Breaking changes, such as an attribute renamed or removed, or a service provider class moved.</li>
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
composer require bladewindui/accordion   # just accordion
composer require bladewindui/table       # just table (pulls exact deps)
</code>
    </pre>
    <p>
        Three <strong>aggregate metapackages</strong> bundle related components for convenience:
    </p>
    <pre class="language-bash line-numbers">
<code>
composer require bladewindui/forms       # all form components
composer require bladewindui/content     # all content components
composer require bladewindui/navigation  # all navigation components
</code>
    </pre>
    <p>
        The full install meta-package pulls everything:
    </p>
    <pre class="lang-bash command-line"><code>composer require bladewindui/ui                  # the whole library</code></pre>
    <p>
        Aggregate packages are <code class="inline">type: metapackage</code>. They contain no code, only a <code class="inline">require</code> list.
    </p>

    <h2 id="adding-component">Adding a New Component</h2>
    <ol class="list-decimal pl-6 space-y-3 my-4">
        <li>
            Create <code class="inline">packages/&lt;name&gt;/</code> with:
            <ul class="list-disc pl-6 space-y-1 mt-2">
                <li><code class="inline">composer.json</code> (name: <code class="inline">bladewindui/&lt;name&gt;</code>, type: <code class="inline">library</code>). List only the leaf packages it actually depends on in <code class="inline">require</code> (grep the blade file for <code class="inline">&lt;x-bladewind::*</code> to find them).</li>
                <li><code class="inline">src/Bladewind&lt;Name&gt;ServiceProvider.php</code>. Use the <code class="inline">is_dir()</code> guard pattern for <code class="inline">bladewind-public</code> (see below).</li>
                <li><code class="inline">config/bladewind.php</code> (just this component's config keys).</li>
                <li><code class="inline">resources/views/components/</code> (blade files).</li>
            </ul>
        </li>
        <li>
            Add to root <code class="inline">composer.json</code>, three places:
            <ul class="list-disc pl-6 space-y-1 mt-2">
                <li><code class="inline">autoload.psr-4</code>: <code class="inline">"Mkocansey\\Bladewind\\&lt;Name&gt;\\": "packages/&lt;name&gt;/src/"</code></li>
                <li><code class="inline">replace</code>: <code class="inline">"bladewindui/&lt;name&gt;": "self.version"</code></li>
                <li><code class="inline">extra.laravel.providers</code>: <code class="inline">"Mkocansey\\Bladewind\\&lt;Name&gt;\\Bladewind&lt;Name&gt;ServiceProvider"</code></li>
            </ul>
        </li>
        <li>
            Add a matrix entry to <code class="inline">.github/workflows/split-packages.yml</code>:
            <pre class="language-yaml line-numbers">
<code>
- { local_path: 'packages/&lt;name&gt;', split_repository: '&lt;name&gt;' }
</code>
            </pre>
        </li>
        <li>If the component belongs to a group (forms, content, navigation), add it to the relevant <code class="inline">packages/&lt;group&gt;/composer.json</code> <code class="inline">require</code>.</li>
        <li>Add it to <code class="inline">packages/meta/composer.json</code> <code class="inline">require</code> (or it will be pulled in transitively through the group).</li>
        <li>Add its config keys to <code class="inline">packages/meta/config/bladewind.php</code>.</li>
        <li>Create the empty GitHub repo <code class="inline">bladewindui/&lt;name&gt;</code>.</li>
        <li>Release a new minor version. This populates the new repo through the split action.</li>
        <li>Register the now-populated repo on Packagist with a GitHub webhook (see the notes above on the Secret field and on registering after, not before, the first release).</li>
    </ol>

    <h3 id="sp-template">Service provider template for new components</h3>
    <p>
        Use this exact pattern. The <code class="inline">is_dir()</code> guards prevent errors when a package has no CSS or no
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
