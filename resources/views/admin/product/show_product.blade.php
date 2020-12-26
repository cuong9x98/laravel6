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
                        @if(session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                        @endif
                        @php 
                          $imageImplode = $product->image;
                          $imageExplode = explode(',',$imageImplode);
                        @endphp
                        <header class="panel-heading">
                            Chi tiết sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{route('product.store')}}" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <!-- Tên sản phẩm -->
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" name="name" value="{{$product->name}}" disabled class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                       
                                        <!-- Ảnh sản phẩm -->
                                        <label for="exampleInputFile"> ảnh</label>
                                        <div class="gallery">
                                            @foreach(array_slice($imageExplode,0) as $items)
                                              <a href=""><img height="84px" width="84px" disabled src="{{asset('img_product/'.$items)}}" alt=""></a>
                                            @endforeach
                                        </div>
                                        <button class="btn btn-dark btn-clear ml-3" type="button" id="clear">Xóa</button>
                                        <br>
                                        <!-- Giá sản phẩm -->
                                        <label for="exampleInputEmail1">Giá</label>
                                        <input type="text" name="price" value="{{$product->price}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                        <!-- Số lượng sản phẩm -->
                                        <label for="exampleInputEmail1">Số lượng </label>
                                        <input type="text" name="quantity" value="{{$product->quantity}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                        <!-- Mô tả sản phẩm -->
                                        <script src="../ckeditor/ckeditor.js"></script>
                                        <div class="form-group mb-0">
                                             <label for="exampleInputEmail1">Mô tả </label>
                                            <textarea name="description" value="" disabled id="ckeditor1" class="ckeditor" >{{$product->description}}</textarea>
                                            <script>
                                                CKEDITOR.replace(ckeditor1);
                                            </script>
                                        </div>
                                        @if($product->check == 2)
                                        <div id="myRadioGroup">
                                            <hr>
                                            <div id="Cars2" class="desc">
                                               
                                                <!-- Tên dòng -->
                                                <label for="exampleInputEmail1">Tên dòng</label>
                                                <select disabled id="productline_id" name="productline_id"  class="form-control m-bot15">
                                                    <option value="{{$product->id}}">{{$product->productlines->name}}</option>
                                                </select>
                                                <!-- CPU -->
                                                <label for="exampleInputEmail1">CPU</label>
                                                <input type="text" name="cpu" value="{{$product->cpu}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                                <!-- Ram -->
                                                <label for="exampleInputEmail1">Ram</label>
                                                <input type="text" name="ram" value="{{$product->ram}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                                <!-- Disk -->
                                                <label for="exampleInputEmail1">Ổ cứng</label>
                                                <input type="text" name="disk" value="{{$product->disk}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                                <!-- VGA -->
                                                <label for="exampleInputEmail1">VGA</label>
                                                <input type="text" name="vga" value="{{$product->vga}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                                <!-- resolution -->
                                                <label for="exampleInputEmail1">Độ phân giải</label>
                                                <input type="text" name="resolution" value="{{$product->resolution}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                                <!-- man hinh -->
                                                <label for="exampleInputEmail1">Màn hình</label>
                                                <input type="text" name="screen" value="{{$product->screen}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                                <!-- Video -->
                                                <label for="exampleInputEmail1">Video</label>
                                                <input type="text" name="video" value="{{$product->video}}" disabled class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                            
                                        </div>
                                        @endif
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

@endsection('content')