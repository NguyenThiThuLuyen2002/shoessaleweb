<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('name')) {
            $username = session('name');
            $user = User::where('name', $username)->first();
            if ($user->id_role != 1) {
                return redirect()->route('client.home');
            } else {
                return $next($request);
            }
        }
        
        return redirect()->route('login');
    }
}