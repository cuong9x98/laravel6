@extends('admin.layout')
@section('title','Thương Hiệu')
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
                            Thêm  Banner
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{route('banner.store')}}" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <!-- Tên  -->
                                        <label for="exampleInputEmail1">Tên</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên">
                                        <!-- Tên  -->
                                        <label for="exampleInputEmail1">Đường dẫn</label>
                                        <input type="text" name="url" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên">
                                        <!-- Ảnh -->
                                        <label for="exampleInputFile">Chọn ảnh</label>
                                        <input  name="img" id="upload" type="file" multiple="true" >
                                      
                                       
                                    </div>
                                    <button type="submit" class="btn btn-info">Thêm</button>
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