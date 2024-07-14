<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Apikeys;
use Illuminate\Http\Request;

class CheckApiKey
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('x-api-key');

        if (!$apiKey) {
            return response()->json(['error' => 'API key missing'], 401);
        }

        $apikeys = Apikeys::where('key', $apiKey)->first();

        if (!$apikeys) {
            return response()->json(['error' => 'Invalid API key'], 403);
        }

        // Attach the user to the request
        $request->merge(['user' => $apikeys->user]);

        return $next($request);
    }
}
