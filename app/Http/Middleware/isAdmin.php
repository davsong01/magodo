<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        $adminRoles = [1,2];
        
        if(!in_array(auth()->user()->role, $adminRoles )){
            return redirect()->back()->withErrors(['message' => 'Unauthorized request']);
        }
        return $next($request);
    }
}
