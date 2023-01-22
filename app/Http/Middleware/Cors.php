<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request)
        /* ->header('X-Frame-Options',  'allow from *') */
        ->header('Access-Control-Allow-Origin', '127.0.0.1:8100')
        ->header('Access-Control-Allow-Origin', 'localhost:8100')
        ->header('Access-Control-Allow-Origin', 'http://localhost:8100')
        ->header('Access-Control-Allow-Origin', 'http://127.0.0.1:8100');

        $response->headers->set('X-Frame-Options', 'ALLOW-FROM *', false);
    }
}
