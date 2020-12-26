@extends('admin.layout')
@section('title','Loại sản phẩm')
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
                            Sửa  nhà cung cấp
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{route('provider.update',['provider'=>$provider->id])}}" method="post" role="form" >
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <!-- Tên  -->
                                        <label for="exampleInputEmail1">Tên</label>
                                        <input type="text" value="{{$provider->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên">
                                         <!-- Điện thoại  -->
                                        <label for="exampleInputEmail1">Điện thoại</label>
                                        <input type="text" value="{{$provider->phone}}" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả">
                                        <!-- Địa chỉ -->
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" value="{{$provider->address}}" name="address" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả">
                                        
                                        <!-- Email-->
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" value="{{$provider->email}}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả">

                                    </div>
                                    <button type="submit" class="btn btn-info">Sửa</button>
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
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
@endsection('content')