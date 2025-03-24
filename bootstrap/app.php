<?php

use App\Http\Middleware\CheckUserRole;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'check.role' => \App\Http\Middleware\CheckUserRole::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class, // Middleware Admin
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
