<?php

declare(strict_types=1);

namespace Deployer;

require 'recipe/laravel.php';

/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
*/

set('application', 'bladewindui.com');
set('repository', 'git@github.com:mkocansey/bladewind-docs.git');
set('branch', 'main');

set('keep_releases', 3);
set('node_path', '/home/mkocansey/.nvm/versions/node/v22.23.1/bin');

set('composer_options', implode(' ', [
    '--no-dev',
    '--prefer-dist',
    '--no-interaction',
    '--no-progress',
    '--optimize-autoloader',
]));

add('shared_files', [
    '.env',
    'database/database.sqlite',
]);

add('shared_dirs', [
    'storage',
]);

// php-fpm runs as www-data, which is not a member of the deploy user's
// group. Hand the writable dirs to the www-data group instead of relying
// on chmod alone, or the web server cannot write logs, sessions or views.
set('writable_mode', 'chgrp');
set('http_group', 'www-data');
set('writable_recursive', true);
set('writable_use_sudo', true);

/*
|--------------------------------------------------------------------------
| Host
|--------------------------------------------------------------------------
*/

host('production')
    ->setHostname('bladewindui.com')
    ->setRemoteUser('mkocansey')
    ->set('branch', 'main')
    ->setDeployPath('/var/www/html/{{application}}')
    ->setLabels([
        'stage' => 'production',
    ]);

/*
|--------------------------------------------------------------------------
| Node.js
|--------------------------------------------------------------------------
*/

set(
    'nvm',
    'export NVM_DIR="$HOME/.nvm"'
    . ' && [ -s "$NVM_DIR/nvm.sh" ]'
    . ' && . "$NVM_DIR/nvm.sh"'
);

set('node_version', '20');

/*
|--------------------------------------------------------------------------
| Deployment tasks
|--------------------------------------------------------------------------
*/

desc('Install frontend dependencies and build production assets');
task('deploy:assets', function (): void {
    within('{{release_path}}', function (): void {
        $nodePath = '/home/mkocansey/.nvm/versions/node/v22.23.1/bin';

        run("export PATH={$nodePath}:\$PATH && node --version");
        run("export PATH={$nodePath}:\$PATH && npm --version");

        if (test('[ -f package-lock.json ]')) {
            run("export PATH={$nodePath}:\$PATH && npm ci --no-audit --no-fund");
        } else {
            run("export PATH={$nodePath}:\$PATH && npm install --no-audit --no-fund");
        }

        run("export PATH={$nodePath}:\$PATH && npm run build");
    });
});

desc('Verify the release before making it live');
task('deploy:verify', function (): void {
    if (! test('[ -f {{release_path}}/vendor/autoload.php ]')) {
        throw new \RuntimeException(
            'Deployment aborted: vendor/autoload.php is missing.'
        );
    }

    if (! test('[ -f {{release_path}}/artisan ]')) {
        throw new \RuntimeException(
            'Deployment aborted: artisan is missing.'
        );
    }

    if (! test('[ -f {{release_path}}/public/index.php ]')) {
        throw new \RuntimeException(
            'Deployment aborted: public/index.php is missing.'
        );
    }
});

// sudoers grants NOPASSWD for /usr/sbin/service but not for systemctl,
// so use service here or the reload prompts for a password and fails
// under CI, where there is no TTY to answer it.
desc('Reload PHP-FPM');
task('php-fpm:reload', function (): void {
    run('sudo /usr/sbin/service php8.4-fpm reload');
});

/*
|--------------------------------------------------------------------------
| Deployment flow
|--------------------------------------------------------------------------
|
| Nothing is executed against "current" until deploy:publish updates the
| symlink. Composer, migrations, optimization and frontend compilation all
| run inside the new release directory first.
|
*/

desc('Deploy Bladewind documentation to production');
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:publish-bladewind-assets',
    'artisan:storage:link',
    'artisan:migrate',
    'artisan:optimize',
    'deploy:assets',
    'deploy:verify',
    'deploy:publish',
    'php-fpm:reload',
]);

desc('Publish Bladewind UI public assets');
task('artisan:publish-bladewind-assets', function (): void {
    within('{{release_path}}', function (): void {
        run('php artisan vendor:publish --tag=bladewind-public --force');
    });
});

desc('Confirm and deploy interactively');
task('build', function (): void {
    if (! askConfirmation('Deploy to production?', false)) {
        warning('Deployment aborted.');

        return;
    }

    invoke('deploy');
});

/*
|--------------------------------------------------------------------------
| Failure handling
|--------------------------------------------------------------------------
*/

after('deploy:failed', 'deploy:unlock');
