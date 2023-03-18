<?php

namespace App\Http\Middleware;

use Closure;

class JWTMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['message' => 'user not found'], 500);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return $next($request);
    }
}
