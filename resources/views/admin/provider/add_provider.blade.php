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
                            Thêm  nhà cung cấp
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{route('provider.store')}}" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <!-- Tên  -->
                                        <label for="exampleInputEmail1">Tên</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên">
                                         <!-- Điện thoại  -->
                                        <label for="exampleInputEmail1">Điện thoại</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả">
                                        <!-- Địa chỉ -->
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả">
                                        
                                        <!-- Email-->
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả">

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

<!--main content end-->
</section>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

@endsection('content')