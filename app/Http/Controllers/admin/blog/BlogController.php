<?php

namespace App\Http\Controllers\admin\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\UploadeddFile;
use App\Model\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.list_blog',['blog'=>$blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.add_blog');
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

        $blog = new Blog();
        $blog->name = $request->title;
        $blog->img = $file_name;
        $blog->description = $request->description;
        $blog->short_description = $request->short_description;
        $blog->user_id = 1;
        $request->file('img')->move(public_path('img_blog/'),$file_name);
        $blog->save();



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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit_blog',['blog'=>$blog]);
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
        $blog =Blog::find($id);
        if(is_null($request->file('img'))){
            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->short_description = $request->short_description;
            $blog->user_id = 1;
            $blog->save();    
        }else{
            $file_name  = $request->file('img')->getClientOriginalName();

            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->short_description = $request->short_description;
            $blog->user_id = 1;
            $blog->img = $file_name;
            $request->file('img')->move(public_path('img_blog/'),$file_name);
            $blog->save();
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
        $blog = Blog::find($id);
        $blog->delete();

        return back()->with('msg','Xóa thành công');
    }
}
