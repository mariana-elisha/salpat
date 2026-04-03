<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Add essential security headers
        if (method_exists($response, 'header')) {
            $response->header('X-Frame-Options', 'SAMEORIGIN');
            $response->header('X-XSS-Protection', '1; mode=block');
            $response->header('X-Content-Type-Options', 'nosniff');
            $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');
            $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
            $response->header('Content-Security-Policy', "default-src 'self' https: font.googleapis.com fonts.gstatic.com cdn.jsdelivr.net unpkg.com; script-src 'self' 'unsafe-inline' 'unsafe-eval' https: cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https: cdn.jsdelivr.net fonts.googleapis.com; img-src 'self' data: https:; font-src 'self' https: fonts.gstatic.com; connect-src 'self' https:;");
            $response->header('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
        }

        return $response;
    }
}
