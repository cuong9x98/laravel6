<?php

namespace App\Http\Controllers\client\detail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class DetailController extends Controller
{
    public function store(Request $request)
    {
		$id = $request->id;
      
        $data = Product::find($id);
        $result['id'] = $data->id;
        $result['name'] = $data->name;
        $result['qty'] = $request->quantity;
        $result['price'] = $data->price;
        $result['weight'] = $data->price;
        $result['options']['image'] = $request->image;
        $result['options']['creater']=$data->creater;
        Cart::add($result);
        return  back();
    }
}
