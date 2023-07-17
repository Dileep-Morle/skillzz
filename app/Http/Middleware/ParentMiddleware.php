<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ParentMiddleware
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
            if ($request->user() && $request->user()->role == 3) {
                return $next($request);
            }else{
                return redirect('parent/login')->with('info', 'You are not admin please enter right credential');
            }
        }
        return redirect()->route('parent.login')->with('danger', 'Something went wrong please enter the email and password');
    }
}
