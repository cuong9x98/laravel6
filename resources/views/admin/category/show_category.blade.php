@extends('admin.layout')
@section('title','Chi tiết sản phẩm')
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
                    <header class="panel-heading">
                        Chi tiết loại sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên loại</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"disabled placeholder="Enter email" value="{{$category->name}}">
                                </div>
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