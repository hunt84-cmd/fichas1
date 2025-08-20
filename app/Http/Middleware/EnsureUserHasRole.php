<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {

        foreach($roles as $role) {
//            dd($request->user());
            // Check if user has the role This check will depend on how your roles are set up
            if($request->user()->hasRole($role))
                return $next($request);
        }
        return redirect('login');
//        return $next($request);
    }
}
