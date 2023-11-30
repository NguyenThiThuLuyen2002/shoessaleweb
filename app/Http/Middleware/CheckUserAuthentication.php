<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Người dùng đã đăng nhập, tiếp tục xử lý yêu cầu
            return $next($request);
        } else {
            // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để mua hàng.');
        }
    }
}
