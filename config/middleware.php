<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Route Middleware Aliases
    |--------------------------------------------------------------------------
    |
    | Here you may register your route middleware aliases.
    | These middleware may be assigned to groups or used individually.
    |
    */

    'routeMiddleware' => [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'user' => \App\Http\Middleware\UserMiddleware::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // Add other middleware aliases you need here
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware are run during every request to your application.
    | Add any global middleware classes you want to run on all requests.
    |
    */

    'middleware' => [
        // Example:
        // \App\Http\Middleware\TrustHosts::class,
        // \App\Http\Middleware\TrustProxies::class,
        // \Fruitcake\Cors\HandleCors::class,
        // \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // \App\Http\Middleware\TrimStrings::class,
        // \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Middleware Groups
    |--------------------------------------------------------------------------
    |
    | You can also register middleware groups here to apply multiple middleware
    | at once. This example shows the typical web and api groups.
    |
    */

    'middlewareGroups' => [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ],

];
