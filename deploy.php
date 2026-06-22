<?php
namespace Deployer;

require 'recipe/common.php';

// Config

set('repository', 'git@github.com:mkocansey/bladewind-docs.git');
set('keep_releases', 1);
set('composer_options', 'update --no-scripts');
add('shared_files', ['.env']);
add('shared_dirs', ['storage']);
add('writable_dirs', ['bootstrap/cache', 'storage']);

// Hosts
host('production')
    ->set('remote_user', 'mkocansey')
    ->set('hostname', 'bladewindui.com')
    ->set('application', '{{hostname}}')
    ->set('labels', [ 'stage'=> 'production'])
    ->set('branch','main')
    ->set('deploy_path', '/var/www/html/{{application}}');

// Tasks
desc('Confirm whether to deploy or not');
//runLocally('confirm_deployment');
task('build', function(){
    writeln("\n\n\n");
    if (! askConfirmation('Are you sure you want to deploy?')) {
        warning('Deployment aborted by user');
        exit;
    }
    writeln('==================================================================================================================');
    invoke('config');
});


desc('Deploy the project');
task('config', [
    'deploy:prepare',
    'deploy:publish',
    'deploy:run_composer',
    'deploy:success'
]);

desc('run composer update');
task('deploy:run_composer', function(){
    writeln('RUN COMPOSER ================================================================================');

    // Ensure NVM is loaded and correct Node.js version is used
    $nvmInit = 'export NVM_DIR="$HOME/.nvm" && [ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" && nvm use 20';

    // .env is now a shared_file, symlinked into each release by deploy:shared.
    cd(get('deploy_path').'/current');
    run('touch database/database.sqlite');
    run('echo "-----------------------------------------------------" && composer update'); //php /usr/bin/
    run('echo ">>>>>>>" && sudo chgrp -R www-data storage && php artisan key:generate');
    run('php artisan config:clear && php artisan view:clear');
    run('php artisan route:clear && php artisan clear-compiled && php artisan optimize');
    run('php artisan migrate --force');
    run('php artisan storage:link');
    run("$nvmInit && sudo rm -rf package-lock.json && npm install");
    run("$nvmInit && npm run build");
    run('sudo /usr/sbin/service php8.4-fpm reload');
});

after('deploy:failed', 'deploy:unlock');
