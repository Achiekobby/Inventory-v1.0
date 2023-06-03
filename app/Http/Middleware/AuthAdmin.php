<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Session;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role ==="ADM"){
            return $next($request);
        }
        else{
            Session::flash('admin_error_message','You are not allowed to access this page. Please contact the administrator');
            return redirect()->route('login');
        }
    }
}
