<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'freeCodeGram');

// Project repository
set('repository', 'git@https://github.com/Igor-my-projects/laravel-project.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('https://freeCodeGram.freecluster.eu')
    ->set('https://freeCodeGram.freecluster.eu/htdocs', '~/{{application}}');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

