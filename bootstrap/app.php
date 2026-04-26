<?php

use App\Http\Middleware\FindTenant;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: [
            __DIR__.'/../routes/api.php',
            __DIR__.'/../app/Modules/Tenant/Routes/api.php',
            // __DIR__.'/../app/Modules/Auth/Routes/api.php',
            // __DIR__.'/../app/Modules/Student/Routes/api.php',
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Option 1: Append to the 'api' group
        $middleware->api(append: [
            FindTenant::class,
        ]);

        // Option 2: If you just wanted to alias it for use in routes
        // $middleware->alias([
        //    'tenant' => \App\Http\Middleware\IdentifyTenant::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();