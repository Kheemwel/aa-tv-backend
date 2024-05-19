<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiToken;

/**
 * Custom middleware for the AA TV Back-end
 * This middleware prevents third party requesting data without the specific token
 */
class ApiTokenMiddleware
{
    const API_TOKEN = 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce';
    public function handle($request, Closure $next)
    {
        
        $apiToken = $request->bearerToken();

        if (!$apiToken) {
            return response()->json(['message' => 'API token is missing', 'response' => $request->header()], 401);
        }

        $validToken = $apiToken == $this::API_TOKEN;

        if (!$validToken) {
            return response()->json(['message' => 'Invalid API token'], 401);
        }

        return $next($request);
    }
}
