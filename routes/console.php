<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('psp', function () {
    $this->comment('Hello PSP, I have something for you: ');
    $this->comment(Inspiring::quote());
})->describe('Hifi PSP');

Artisan::command('magic', function () {
    $this->comment('Please wait while PSP does the magic!');
    shell_exec('composer install');
    Artisan::call('migrate:fresh --seed');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    // Artisan::call('serve');
    $this->comment('Abra Cadabra, magic is done');
    $this->comment('Go ahead and run: php artisan serve now.');
})->describe('does some magic');

Artisan::command('git', function () {
    $this->comment('Git can be hard sometimes, relax');
    shell_exec('git add .');
    shell_exec('git commit -m "magic commit" ');
    shell_exec('git push');
    $this->comment('Sit back & relax,');
    $this->comment('because Git pushed successfully!');
})->describe('updates the remote repo');
