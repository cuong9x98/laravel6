<?php

namespace App\Http\Controllers\client\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use App\Model\Product;
use App\Model\Blog;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_buy = product::where('status',0)->orderBy('buy_count','ASC')->get();
        $product_view = product::where('status',0)->orderBy('view','DESC')->get();
        $brand = Brand::all();
        
        return view('client.home.index',['brand'=>$brand,'product_buy'=>$product_buy,'product_view'=>$product_view]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Product::find($id);
        $brand = Brand::all();
        return view('client.detail.detail',['brand' => $brand,'detail'=>$detail]);
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

    public function listBlog()
    {
        $blog = DB::table('blogs')->orderBy('created_at','DESC')->get();
        $brand = Brand::all();
        return view('client.blog.list_blog',['blog'=>$blog,'brand'=>$brand]);
    }
    public function showBlog($id)
    {
        $blog = Blog::find($id);
        $brand = Brand::all();
        return view('client.blog.show_blog',['blog'=>$blog,'brand'=>$brand]);
    }
}
