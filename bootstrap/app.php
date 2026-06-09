<?php

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
        // Exclude the MCP server endpoint from CSRF — it is consumed by external AI tools
        $middleware->validateCsrfTokens(except: ['mcp/server']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
