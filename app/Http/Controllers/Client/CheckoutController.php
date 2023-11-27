<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $productName = request('name');
        $productPrice = request('price');
        $productSize = request('size');
        $productColor = request('color');
        $productQuantity = request('quantity');
        $totalAmount = request('total');


        return view('client.checkout', compact('productName', 'productPrice', 'productSize', 'productColor', 'productQuantity', 'totalAmount'));
    }
}
