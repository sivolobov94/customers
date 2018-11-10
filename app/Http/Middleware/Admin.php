<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get('admin_token') !== md5(env('ADMIN_TOKEN'))) {
            return redirect()->route('admin-get-login');
        }

        return $next($request);
    }
}
