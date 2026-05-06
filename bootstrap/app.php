<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\SecurityHeadersMiddleware;
use App\Http\Middleware\VerificarPermisoModulo;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
        $middleware->alias([
            'auth.erp' => AuthMiddleware::class,
            'permiso.modulo' => VerificarPermisoModulo::class,
            'role' => VerificarRolUsuario::class,
            'security.headers' => SecurityHeadersMiddleware::class,
        ]);

        $middleware->api(append: [
            'throttle:api',
            'security.headers',
        ]);

        $middleware->web(append: [
            'security.headers',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
