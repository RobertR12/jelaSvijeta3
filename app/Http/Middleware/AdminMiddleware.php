<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /*public function handle($request, Closure $next)
    {


        if(Auth::check() && Auth::user()->user()->role_id == 1 ){

            abort(403, 'Unauthorized action.');
            return $next($request);
        }
            return redirect('home');
    }*/

    public function handle($request, Closure $next)
    {
        if(auth()->user()->isAdmin == 1){
            return $next($request);
        }
        return redirect('home')->with('error','You have not admin access');
    }


}
