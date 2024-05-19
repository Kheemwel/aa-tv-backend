<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * This middleware handles requesting image and video files
 */
class FileAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->route('token');

        if ($token !== '199fed4b-966e-49c5-b19b-0ae361c14f29' && $token !== 'fcf5346a-43fe-41ae-b181-f374bfc9e135') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
