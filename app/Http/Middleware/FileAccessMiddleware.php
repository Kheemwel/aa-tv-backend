<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

        if ($token !== 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
