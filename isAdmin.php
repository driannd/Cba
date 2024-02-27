<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $users = Auth::user();
        if(Auth::check()){
            if($users->role === 'admin'){
                return $next($request);
            }elseif($users->role === 'user'){
                return redirect()->route('index');
            }
        }else{
            return redirect()->route('login.login');
        }
    }
}