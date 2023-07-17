<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StudentMiddleware
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
            if ($request->user() && $request->user()->role == 0) {
                return $next($request);
            }else{
                return redirect('student/login')->with('info', 'You are not student please enter right credential');
            }
        }
        return redirect('student/login')->with('danger', 'Something went wrong please enter the email and password');
    }
}
