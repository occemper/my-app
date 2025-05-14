<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Configuration\Middleware;

class AppMiddleware
{
    public function __invoke(Middleware $middleware)
    {
        $middleware->statefulApi();
        //$middleware->appendToGroup('web', \App\Http\Middleware\MyMiddleware::class);
        $middleware->api([
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::except(['api/*'])
        ]);
    }
}
