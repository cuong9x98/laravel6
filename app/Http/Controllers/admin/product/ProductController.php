<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\UploadeddFile;
use App\Model\Product;
use App\Model\Productline;
use App\Model\Brand;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.list_product',['product'=>$product]);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        $productline = Productline::all();
        return view('admin.product.add_product',['brand'=>$brand, 'productline'=>$productline]);
    }
    /**
     * Select productline when click brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectProductline(Request $request)
    {
        // $productline['productlines'] = productline::where('bradn_id',$request->get('id'))->get();
        // $data = "";
        //     foreach ($productline['productlines'] as $value) {
        //         $data .= "<option value=".$value->id.">".$value->_name."</option><br>";
        //     }
        // $data .= "";  
        $data = "cuong";
        echo $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array_image = [];
            foreach($request->file('images') as $file_name){
                $uniqueFileName = Str::random(6).'_'.$file_name->getClientOriginalName();
                array_push($array_image, $uniqueFileName);
                $file_name->move(public_path('img_product/'),$uniqueFileName);

            }
        $image = implode(',', $array_image);
        if($request->cars==2){
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->image = $image;
            $product->cpu = $request->cpu;
            $product->ram = $request->ram;
            $product->disk = $request->disk;
            $product->vga = $request->vga;
            $product->screen = $request->screen;
            $product->resolution = $request->resolution;
            $product->video = $request->video;
            $product->productline_id = $request->productline_id;
            $product->check = $request->cars;
            $product->save();    
        }else{
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->image = $image;
          
            $product->productline_id = 0;
            $product->check = $request->cars;
            $product->save();
        } 
        
        return redirect()->route('product.create')->with('msg','Thêm mới thành công.');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show_product',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit_product',['product'=>$product]);
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
        $product  = Product::find($id);

        if (isset($request->images)) {
            $array_image = [];
            foreach($request->file('images') as $file_name){
                $uniqueFileName = Str::random(6).'_'.$file_name->getClientOriginalName();
                array_push($array_image, $uniqueFileName);
                $file_name->move(public_path('img_product/'),$uniqueFileName);

            }
            $image = implode(',', $array_image);

            if($request->check == 3){
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->quantity = $request->quantity;
                $product->productline_id = 0;
                $product->check = $request->check;
                $product->image = $image;
                
            }else{
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->quantity = $request->quantity;
                $product->productline_id = $request->productline_id;
                $product->check = $request->check;
                $product->image = $image;
                $product->cpu = $request->cpu;
                $product->ram = $request->ram;
                $product->disk = $request->disk;
                $product->vga = $request->vga;
                $product->screen = $request->screen;
                $product->video = $request->video;
                $product->resolution = $request->resolution;
                
            }

            $product->save();
            return back()->with('msg','Sửa thành công');
        }else{
            if($request->check == 3){
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->productline_id = 0;
            $product->check = $request->check;
            
            }else{
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->quantity = $request->quantity;
                $product->productline_id = $request->productline_id;
                $product->check = $request->check;
                $product->cpu = $request->cpu;
                $product->ram = $request->ram;
                $product->disk = $request->disk;
                $product->vga = $request->vga;
                $product->screen = $request->screen;
                $product->video = $request->video;
                $product->resolution = $request->resolution;
                
            }

            $product->save();
            return back()->with('msg','Sửa thành công');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back()->with('msg','Xóa thành công');
    }

}
