<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use PDF;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('admin.order.list_order',['order'=>$order]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sale()
    {
        $order = DB::table('orders')->where('status',1)->get();
        return view('admin.order.sale',['order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('admin.order.add_order',['product' => $product]);
    }

    /**
     * Show the form for choose a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choose(Request $request)
    {
        $id = $request->id;
      
        $data = Product::find($id);
        $result['id'] = $data->id;
        $result['name'] = $data->name;
        $result['qty'] = 1;
        $result['price'] = $data->price;
        $result['weight'] = $data->price;
        $result['options']['image'] = $request->image;
        $result['options']['creater']=$data->creater;
        Cart::add($result);
        return  back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer =  new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->note = "";
        $customer->save();

        $id_customer = $customer->id;
        $order = new Order();
        $order->total_price = $request->total_price;
        $order->customer_id = $id_customer;
        $order->save();

        $id_order = $order->id;
        foreach(Cart::content() as $item){
        $order_detail = new OrderDetail();
        $order_detail->order_id  = $id_order;
        $order_detail->product_id  = $item->id;
        $order_detail->qty  = $item->qty;
        $order_detail->price  = $item->price;
        $order_detail->status  = 1;
        $order_detail->save();

        $product = Product::find($item->id);
        $product->quantity = ($product->quantity)-($item->qty);
        $product->save();
        }

        Cart::destroy();
        
        return back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $order_detail = DB::table('order_details')->where('order_id', $id)->get();
        return view('admin.order.show_order',['order_detail'=>$order_detail,'order'=>$order]);
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function see($id)
    {
        $order = Order::find($id);
        $order_detail = DB::table('order_details')->where('order_id', $id)->get();
        return view('admin.order.see',['order_detail'=>$order_detail,'order'=>$order]);
    }
    public function print($checkcode)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkcode));
        return $pdf->stream();
    }
    public function print_order_convert($checkcode)
    {
        $order = Order::find($checkcode);
        $order_detail = DB::table('order_details')->where('order_id', $checkcode)->get();
        $sub = 0;

        $output = '';
        $output .= '
            <style>
                body {
                    font-family:DejaVu Sans;
                }
                table {
                    font-family:DejaVu Sans;
                    border-collapse: collapse;
                    width: 100%;
                }
                td, th {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
                  font-family:DejaVu Sans;
                }

                tr:nth-child(even) {
                  background-color: #dddddd;
                }
                .pen{
                    display:flex;
                }
                .ship{
                    margin-left:500px;
                }
            </style>
            <title>Hóa đơn bán</title>
            <h4><center>HÓA ĐƠN BÁN HÀNG</center></h4>
            <h4><center>Cửa hàng laptop và phụ kiện </center></h4>
            <p>Địa chỉ :xã Liên Hà - Đông Anh - Hà Nội</p>
            <p>Hostline: 0349077770</p>
            <p>Email:cuong9x98@gmail.com</p>
            <hr>
            <p>Tên khách: '.$order->customers->name.'</p>
            <p>Số điện thoại: '.$order->customers->name.'</p>
            <table class="table table-striped  table-bordered">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
        ';
        foreach ($order_detail as $order_detail => $value) {
             $output.='
                <tr>
                    <th>'.$value->id.'</th>
                    <th>'.$value->product_id.'</th>
                    <th>'.number_format($value->price).'</th>
                    <th>'.$value->qty.'</th>
                    <th>'.number_format($value->qty*$value->price).'</th>
                </tr>
            ';
            $sub += $value->qty*$value->price;
        }
       
        $output.='
                </tbody>
            </table>
        ';

        $output.='
        <p>Tổng tiền: '.number_format($sub).' VND</p>
        <p>Ngày lập đơn: '.($order->created_at->format('d/m/Y')).' </p>
        <div class="pen">
            <div ><h5 >Người lập đơn </h5></div>
            <div class="ship"><h5>Người giao hàng</h5></div>
        </div>
        ';
        return $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        $order_detail = DB::table('order_details')->where('order_id',$order->id)->get();

        foreach($order_detail as $order){
            $product = Product::find($order->product_id);
            $product->quantity = ($product->quantity)-($order->qty);
            $product->save();
        }

        return back()->with('msg','Duyệt thành công.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
