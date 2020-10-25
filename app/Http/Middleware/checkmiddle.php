<?php

namespace App\Http\Middleware;

use Closure;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;

class checkmiddle
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
$age=Auth::User()->age;
if($age<15){
return redirect()->route('zezo');
}
        return $next($request);
    }
}
