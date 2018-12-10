<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class MustBeConfirmed
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
        $user=User::where('verified',1)->exists();
   //     User::whereVerified;
        //dd($user);
    //    die(var_dump($user));

        if(! $user){
            flash()->error('error','you must confirm');
            return back();
        }
        return $next($request);
    }
}
