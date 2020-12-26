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
                            Sửa  Banner
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{route('banner.update',['banner'=>$banner->id])}}" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <!-- Tên  -->
                                        <label for="exampleInputEmail1">Tên</label>
                                        <input type="text" value="{{$banner->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên">
                                        <!-- Tên  -->
                                        <label for="exampleInputEmail1">Đường dẫn</label>
                                        <input type="text" value="{{$banner->name}}" name="url" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên">
                                        <!-- Ảnh -->
                                        <label for="exampleInputFile">Chọn ảnh</label>
                                        <input  name="img" id="upload" type="file" multiple="true" >
                                      
                                       
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

@endsection('content')