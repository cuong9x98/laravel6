<?php

namespace App\Http\Controllers\admin\bill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use DB;
use App\Model\Bill;
use App\Model\BillDetail;
use App\Model\Provider;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use  Illuminate\Support\Facades\Redirect;
use PDF;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill = Bill::all();
        return view('admin.bill.list_bill',['bill'=>$bill]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provider = Provider::all();
        $product = Product::all();
        return view('admin.bill.add_bill',['product'=>$product,'provider'=>$provider]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bill = new Bill();
        $bill->total_price = $request->total_price;
        $bill->provideder_id = $request->provideder_id;
        $bill->user_id = Auth::user()->id;
        $bill->save();

        $id_bill = $bill->id;
        foreach(Cart::content() as $item){
        $bill_detail = new BillDetail();
        $bill_detail->bill_id  = $id_bill;
        $bill_detail->product_id  = $item->id;
        $bill_detail->qty  = $request->qty;
        $bill_detail->price  = $item->price;
        $bill_detail->status  = 0;
        $bill_detail->save();

        $product = Product::find($item->id);
        $product->quantity = ($product->quantity)+($item->qty);
        $product->save();
        }
        

        Cart::destroy();

        return back()->with('msg','Thêm thành công');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        $bill_detail = DB::table('bill_details')->where('bill_id', $id)->get();
        return view('admin.bill.show_bill',['bill_detail'=>$bill_detail,'bill'=>$bill]);

    }
    public function print($checkcode)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkcode));
        return $pdf->stream();
    }
    public function print_order_convert($checkcode)
    {
        $bill = Bill::find($checkcode);
        $bill_detail = DB::table('bill_details')->where('bill_id', $checkcode)->get();
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
            <h4><center>HÓA ĐƠN NHẬP HÀNG</center></h4>
            <h4><center>Cửa hàng laptop và phụ kiện </center></h4>
            <p>Địa chỉ :xã Liên Hà - Đông Anh - Hà Nội</p>
            <p>Hostline: 0349077770</p>
            <p>Email:cuong9x98@gmail.com</p>
            <hr>
            <p>Nhà cung cấp: '.$bill->providers->name.'</p>
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
        foreach ($bill_detail as $bill_detail => $value) {
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
        <p>Ngày lập đơn: '.($bill->created_at->format('d/m/Y')).' </p>
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
        //
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
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_qty(Request $request)
    {
        dd($request);
        // Cart::update($request->rowId,['qty'=>$request->quantity]);
        // return back()->with('msg','Cập nhật thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::find($id);
        $bill->delete();

        return back()->with('msg','Xóa thành công');
    }
    public function delete($id)
    {
        Cart::update($id,0);

        return back()->with('msg','Xóa thành công');
    }
}
