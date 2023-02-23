<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $requestToken=explode("|",$request->header('authorization'));
        $userTokens=auth()->user()->tokens;
        foreach($userTokens as $token){
            if(hash("sha256",$requestToken[1])==$token->token){
                $token->uses++;
                $token->save();
                return $next($request);

            }
        }
        
        return $next($request);
    }
    
}
