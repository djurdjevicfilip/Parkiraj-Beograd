<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserMiddleware
{
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
    public function handle($request, Closure $next)
    {
        
        //Redirect user back if he doesn't have the privilege of accessing the User panel
        if ($this->auth->getUser()->type !== "0") {
            
            return redirect()->back();
        }
        return $next($request);
    }
}