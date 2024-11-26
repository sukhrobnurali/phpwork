<?php

namespace App\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $locales = ($request->header('locale') === config('app.locale')) ? config('app.locale') : config('app.fallback_locale');

        app()->setLocale($locales);

        return $next($request);
    }
}
