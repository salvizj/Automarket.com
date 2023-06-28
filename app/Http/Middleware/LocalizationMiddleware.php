<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->session()->get('lang');

        if ($locale && in_array($locale, ['en', 'lv'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
