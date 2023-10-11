<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/AntonLeontev/um-landing.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Tasks

task('build', function () {
    cd('{{release_path}}');
    run('npm install');
    run('npm run build');
});

// Hosts

// host('195.93.253.43')
//     ->set('remote_user', 'deployer')
//     ->set('deploy_path', '~/umLanding');

host('94.241.174.226')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/constructor');

// Hooks

after('deploy:failed', 'deploy:unlock');
after('deploy:vendors', 'build');
