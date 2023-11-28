<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $username = session('username');
        
        
        return view('client.home.index', [
             
        ]);
    }
}
