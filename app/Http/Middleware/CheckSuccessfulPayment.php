<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class CheckSuccessfulPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $vnp_TxnRef = $request->route('vnp_TxnRef');

        $isOrderSuccessful = Order::where('vnp_TxnRef', '=', $vnp_TxnRef)
            ->where('checkout', '=', 'Đã thanh toán')
            ->exists();
        if ($isOrderSuccessful) {
            return $next($request);
        }
        return redirect()->route('client.home');
    }
}
