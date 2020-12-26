<?php

namespace App\Http\Controllers\client\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index()
    {
		return view('client.cart.list_cart');
    }
}
