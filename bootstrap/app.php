<?php

use Laravel\Lumen\Application;

$app = new Application(
    dirname(__DIR__)
);

$app->withEloquent();

// Si necesitas configurar middlewares, asegúrate de usar los disponibles en Lumen
$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'auth.basic' => Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    // No es necesario agregar 'bindings' aquí si no está disponible
]);

$app->router->group(['namespace' => 'App\Http\Controllers'], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;