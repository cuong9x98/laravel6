<?php

namespace App\Http\Controllers\admin\productline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productline;
use App\Model\Brand;

class ProductlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productline = Productline::all();
       
        return view('admin.productline.list_productline',['productline'=>$productline]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        return view('admin.productline.add_productline',['brand'=>$brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productline = new Productline();
        $productline->name = $request->name;
        $productline->brand_id = $request->brand_id;
        $productline->save();
        return redirect()->route('productline.create')->with('msg','Thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productline = Productline::find($id);
        $brand = Brand::find($id);
        return view('admin.productline.show_productline',['productline'=>$productline,'brand'=>$brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productline = Productline::find($id);
        $brand = Brand::all();

        return view('admin.productline.edit_productline',['productline'=>$productline,'brand'=>$brand]);
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
        $productline =Productline::find($id);
        $productline->brand_id = $request->brand_id;
        $productline->save();
        return back()->with('msg','Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productline = Productline::find($id);
        $productline->delete();
        return back()->with('msg','Xóa thành công.');
    }
}
