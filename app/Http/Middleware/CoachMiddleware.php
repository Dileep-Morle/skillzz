<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CoachMiddleware
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
        if (Auth::check()) {
            if (Auth::user() && Auth::user()->role==2) {
                return $next($request);
            }else{
                return redirect('coach/login')->with('info', 'You are not coach please enter right credential'); 
            }
        }
        return redirect()->route('coach.login')->with('danger', 'Something went wrong please enter the email and password');
    }
}
