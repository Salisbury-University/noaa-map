<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackTokenUsage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $requestToken = explode('|', $request->header('authorization'));
        if (auth()->user()) {
            $userTokens = auth()->user()->tokens;
            if ($userTokens) {
                foreach ($userTokens as $token) {
                    if (hash('sha256', $requestToken[1]) == $token->token) {
                        if ($token->uses < $token->max_usage) {
                            $token->uses++;
                            $token->save();

                            return $next($request);
                        } else {
                            return response(['message' => 'your token is over its usage limit of '.$token->max_usage], 429);
                        }

                    }
                }
            }
        }

        return $next($request);
    }
}
