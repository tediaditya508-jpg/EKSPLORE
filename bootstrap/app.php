<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

    $exceptions->render(function (\Throwable $e, \Illuminate\Http\Request $request) {

        // Biarkan error validasi, autentikasi, dan otorisasi
        // ditangani oleh Laravel seperti biasanya.
        if (
            $e instanceof \Illuminate\Validation\ValidationException ||
            $e instanceof \Illuminate\Auth\AuthenticationException ||
            $e instanceof \Illuminate\Auth\Access\AuthorizationException ||
            $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException
        ) {
            return null;
        }

        // Pertahankan penanganan HTTP 400–499.
        if (
            $e instanceof \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface &&
            $e->getStatusCode() < 500
        ) {
            return null;
        }

        // Untuk permintaan browser, tampilkan halaman 500 EKSPLORE.
        if (!$request->expectsJson()) {
            return response()->view('errors.500', [], 500);
        }

        // Biarkan Laravel menangani respons JSON.
        return null;
    });

})->create();
