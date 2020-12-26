<?php

namespace App\Http\Controllers\admin\banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.list_banner',['banner'=>$banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.add_banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name  = $request->file('img')->getClientOriginalName();

        $banner = new Banner();
        $banner->name = $request->name;
        $banner->url = $request->url;
        $banner->img = $file_name;
        $banner->user_id = 1;
        $request->file('img')->move(public_path('img_banner/'),$file_name);
        $banner->save();

        return back()->with('msg','Thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit_banner',['banner'=>$banner]);
    }
    public function choose($id)
    {
        $banner =Banner::find($id);
        if($banner->status==0){
            $banner->status = 1;
        }else{
            $banner->status = 0;
        }
         $banner->save();    

        return back()->with('msg','Chọn thành công');
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
        
        $banner =Banner::find($id);
        if(is_null($request->file('img'))){
            $banner->name = $request->name;
            $banner->url = $request->url;
            $banner->user_id = 1;
            $banner->save();    
        }else{
            $file_name  = $request->file('img')->getClientOriginalName();

            $banner->name = $request->name;
            $banner->url = $request->url;
            $banner->user_id = 1;
            $banner->save(); 
            $banner->img = $file_name;
            $request->file('img')->move(public_path('img_banner/'),$file_name);
            $banner->save();
        }
        
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
        $banner = Banner::find($id);
        $banner->delete();

        return back()->with('msg','Xóa thành công');
    }
}
