<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';
require 'contrib/rsync.php';

// Config

set('repository', 'https://github.com/billalxcode/stemdja-master-app.git');
set('ssh_multiplexing', true);

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

set("rsync_src", function () {
    return __DIR__;
});

add("rsync", [
    "exclude" => [
        "git",
        "/vendor/",
        "/node_modules/",
        ".github",
        "deploy.php"
    ]
]);

// Hosts

host('54.251.66.29')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/$PWD')
    ->set('branch', 'main');

// Tasks
task("deploy:secrets", function () {
    file_put_contents(__DIR__ . "/.env", getenv("DOT_ENV"));
    upload(".env", get("deploy_path") ."/shared");
});

desc('Start of Deploy the application');

task('deploy', [
    'deploy:prepare',
    'rsync',                // Deploy code & built assets
    'deploy:secrets',       // Deploy secrets
    'deploy:vendors',
    'deploy:shared',        // 
    'artisan:storage:link', //
    'artisan:view:cache',   //
    'artisan:config:cache', // Laravel specific steps
    'artisan:migrate',      //
    'artisan:queue:restart',//
    'deploy:publish',       // 
]);

desc('End of Deploy the application');

// Hooks

after('deploy:failed', 'deploy:unlock');
