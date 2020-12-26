@extends('admin.layout')
@section('title','Tài khoản')
@section('content')
<!--main content start-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    @if(session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                    @endif
                    <header class="panel-heading">
                        Tạo tài khoản
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('user.store')}}" method="post" >
                                @csrf
                                <!-- Tên -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài khoản</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                 <!-- Mật khẩu -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                                <!-- Chức vụ -->
                                <label for="exampleInputEmail1">Chức vụ</label>
                                <select name="role_name"  class="form-control m-bot15">
                                    @foreach($role as $role)
                                    <option value="{{$role->name}}">
                                        @if ($role->id == 1)
                                            Quản trị viên
                                        @elseif ($role->id == 2)
                                            Nhân viên quảng cáo
                                        @elseif ($role->id == 3)
                                            Nhân viên bán sản phẩm
                                        @else
                                            Nhân viên chăm sóc khách hàng
                                        @endif
                                    </option>
                                    @endforeach
                                </select>
                                 <!-- Email -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                </br>
                                <button type="submit" class="btn btn-info">Tạo tài khoản</button>
                        </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </div>
</section>
 
</section>

<!--main content end-->
</section>
@endsection('content')