<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Manager
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
        if (User::isAuth($request->bearerToken())->role == 'manager'){
            return $next($request);
        }else{
            return response()->json([
                'status'=>false,
                'message' =>'Недостаточно прав'
            ])->setStatusCode(403,'Forbidden');
        }

    }
}
