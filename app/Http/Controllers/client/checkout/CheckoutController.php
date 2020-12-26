<?php

namespace App\Http\Controllers\client\checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use  Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function create()
    {
    	return view('client.checkout.checkout_cart');
    }
    public function store(Request $request)
    {
       
    	$customer =  new Customer();
    	$customer->name = $request->name;
    	$customer->phone = $request->phone;
    	$customer->email = $request->email;
    	$customer->address = $request->address;
    	$customer->note = $request->note;
    	$customer->save();

    	$id_customer = $customer->id;
    	$order = new Order();
    	$order->total_price = $request->sub;
    	$order->customer_id = $id_customer;
    	$order->save();

    	$id_order = $order->id;
    	foreach(Cart::content() as $item){
    	$order_detail = new OrderDetail();
    	$order_detail->order_id  = $id_order;
    	$order_detail->product_id  = $item->id;
    	$order_detail->qty  = $item->qty;
    	$order_detail->price  = $item->price;
    	$order_detail->status  = 0;
    	$order_detail->save();

    	
        }

        Cart::destroy();
        
        return back();
    }
}
