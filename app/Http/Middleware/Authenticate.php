<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (!$request->expectsJson()) {
        //     return route('login');
        // }
    }

    // public function handle($request, Closure $next){

    //     try {
    //         $user =JWTAuth::toUser($request->header('Authorization'));
    //     }catch (TokenExpiredException $e) {
    //         return response()->json([ ' token_expried'], $e->getstatuscode());
    //     }catch (TokenInvalidException $e) {
    //         return response()->json(['token_invalid'], $e->getstatuscode());
    //     }catch (JWTException $e) {
    //         return response()->json(['error'], 'Token is required');
    //     }
    //     return $next($request);
    // }
}
