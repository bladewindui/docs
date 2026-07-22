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

add('writable_dirs', [
    'bootstrap/cache',
    'storage',
]);

set('writable_mode', 'chmod');
set('writable_chmod_mode', '0775');
set('writable_chmod_recursive', true);
set('writable_use_sudo', false);

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
        $nvm = get('nvm');
        $nodeVersion = get('node_version');

        run("{$nvm} && nvm install {$nodeVersion}");
        run("{$nvm} && nvm use {$nodeVersion} && npm ci");
        run("{$nvm} && nvm use {$nodeVersion} && npm run build");
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

desc('Reload PHP-FPM');
task('php-fpm:reload', function (): void {
    run('sudo /usr/bin/systemctl reload php8.4-fpm');
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
    'artisan:storage:link',
    'artisan:migrate',
    'artisan:optimize',
    'deploy:assets',
    'deploy:verify',
    'deploy:publish',
    'php-fpm:reload',
]);

/*
|--------------------------------------------------------------------------
| Optional interactive local deployment
|--------------------------------------------------------------------------
|
| Use:
|
|   dep build production
|
| GitHub Actions should use:
|
|   dep deploy production
|
*/

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
