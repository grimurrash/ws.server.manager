<?php

namespace App\Http\Middleware;

use Closure;

class Worker
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
        if (User::isAuth($request->bearerToken())->role == 'worker'){
            return $next($request);
        }else{
            return response()->json([
                'status'=>false,
                'message' =>['permission'=>'Недостаточно прав']
            ])->setStatusCode(403,'Forbidden');
        }
    }
}
