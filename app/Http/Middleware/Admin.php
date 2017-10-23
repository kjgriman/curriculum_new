<?php

namespace App\Http\Middleware;

use Closure;
use DB;

use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::user()->id != 1){
             $array=['error'=>'usted no esta logueado como admin'];
             return response()
            ->view('welcome',compact('array') ); 
        
        }else{
           return $next($request);

       }
    }
}
