<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $roles
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
          return redirect('login');
        }

        $aRoles = explode("|", $role);

        foreach ($aRoles as $sRole) {
          if(auth()->user()->role == $sRole){
              return $next($request);
          }
        }

        return redirect('home');
    }
}
