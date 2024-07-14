<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Apikey;
use Illuminate\Http\Request;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Lire la valeur de l'en-tête 'x-api-key'
        $apiKeyValue = $request->header('x-api-key');

        // Vérifiez si la clé API est présente
        if (!$apiKeyValue) {
            return response()->json(['message' => 'API key is missing'], 401);
        }

        // Rechercher la clé API dans la base de données
        $apiKey = ApiKey::where('key', $apiKeyValue)->first();

        // Vérifiez si la clé API est valide
        if (!$apiKey) {
            return response()->json(['message' => 'Invalid API key'], 401);
        }

        // Authentifier l'utilisateur correspondant à l'API key
        auth()->login($apiKey->user);

        return $next($request);
    }
}