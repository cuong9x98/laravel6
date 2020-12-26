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
                        Thêm dòng sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('productline.store')}}" method="post" role="form">
                                @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên dòng sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <select name="brand_id"  class="form-control m-bot15">
                                    @foreach($brand as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
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
@endsection('content')