<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::isAuth($request->bearerToken());
        if(is_a($user,User::class)){
            return $next($request);
        }else{
            return $user;
        }

    }
}
