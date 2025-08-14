<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()) {
            return redirect(route('login-page'));
        } else {
            $user = auth()->user();
            if ($user) {

                if (auth()->user()->role == "investor") {
                    session()->flash('error', 'أنت غير مسموح لك لدخول هذه الصفحة');
                    return redirect(route('login-page'));
                }
                return $next($request);
            } else {
                return $next($request);
            }
        }
    }
}
