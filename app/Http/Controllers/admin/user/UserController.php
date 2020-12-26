<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view ('admin.user.add_user',['role'=>$role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->assignRole($request->role_name);
        $user->save();

        return redirect()->route('user.create')->with('msg','Tạo thành công');
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
    /**
     * Show the form for login the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    
    public function login()
    {
        return view('admin.user.login');
    }

    /**
     * Check the form for login the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'password'=>'required|min:3|max:32',
        ], [
             'username.required'=>'Bạn chưa nhập tài khoản',
             'password.required'=>'Bạn chưa nhập mật khẩu',
             'password.min'=>'Mật khẩu phải lớn hơn 3 kí tự',
             'password.max'=>'Mật khẩu phải nhỏ hơn 32 kí tự'   
            ]
        );
        $username = $request->username;
        $password = $request->password;

        if(Auth::attempt(['username' => $username, 'password' => $password])){
            return redirect('/admin/index');
        }else{
            return back()->with('message','Đăng nhập thất bại');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.user.login');
    }
}
