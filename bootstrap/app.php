<?php

use App\Http\Middleware\EnsureEmailIsVerified;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Configures and creates the Illuminate application instance.
 *
 * This method sets up the routing, middleware, and exception handling for the
 * application. It configures the application to use the specified API routes,
 * console commands, health check endpoint, and API prefix. It also sets up
 * middleware for ensuring frontend requests are stateful and aliasing the
 * 'verified' middleware. Finally, it configures the exception handling to
 * provide custom JSON responses for various exception types.
 *
 * @return Application The configured Illuminate application instance.
 */
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        apiPrefix: '',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'verified' => EnsureEmailIsVerified::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, Request $request) {
            Log::error('Exception caught:', [
                'exception' => get_class($e),
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            if ($e instanceof AuthenticationException || $e->getMessage() === 'Route [login] not defined.') {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }

            if ($e instanceof ValidationException) {
                return response()->json(['message' => $e->getMessage()], 422);
            }

            if ($e instanceof NotFoundHttpException) {
                return response()->json(['message' => 'Not Found.'], 404);
            }

            if ($e instanceof HttpException) {
                return response()->json(['message' => $e->getMessage()], $e->getStatusCode());
            }

            // Catch-all for any other exceptions
            return response()->json(['message' => 'An unexpected error occurred. Please try again later.'], 500);
        });
    })
    ->create();
