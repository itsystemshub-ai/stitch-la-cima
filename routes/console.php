<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Respaldos automáticos de la base de datos (y archivos configurados)
\Illuminate\Support\Facades\Schedule::command('backup:clean')->dailyAt('01:30');
\Illuminate\Support\Facades\Schedule::command('backup:run')->dailyAt('02:00');
