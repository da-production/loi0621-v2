<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(is_null(auth()->user()->employeur)){
            return redirect(route('employeur.inscription'))->with('error', 'Veuillez remplir les informations Employeur vous concernant');
        }
        return $next($request);
    }
}
