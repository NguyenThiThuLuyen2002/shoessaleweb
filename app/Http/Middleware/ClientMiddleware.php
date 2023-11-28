<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class ClientMiddleware
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
            if ($user->id_role != 0 && $user->id_role != 2) {
                return redirect()->route('admin-home-page');
            } else {
                return $next($request);
            }
        }
        return $next($request);
    }
}