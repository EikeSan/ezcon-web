<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            switch (Auth::user()->type) {
              case 'admin':
                return redirect('/home');
                break;

              case 'morador':
                if (Auth::user()->sindico == 1) {
                  return redirect('/sindico');
                }else {
                  return redirect('/morador');
                }                
                break;

              case 'sindico':
                return redirect('/sindico');
                break;

              case 'funcionario':
                return redirect('/funcionario');
                break;

              default:
                return redirect('/');
                break;
            }

        }

        return $next($request);
    }
}
