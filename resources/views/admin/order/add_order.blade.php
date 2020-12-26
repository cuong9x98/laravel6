@extends('admin.layout')
@section('title','Hóa đơn bán')
@section('content')
<!--main content start-->
<!--main content start-->
<?php
    $content = Cart::content();
    $sub = 0;
?>
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
                        Chọn sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('admin.order.choose')}}" method="post" role="form">
                                @csrf
                               <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <select  name="id" id="name_product" class="form-control m-bot15">
                                        @foreach($product as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    <br/>
                                <button type="submit"  class="btn btn-info">Thêm</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
         <div class="panel-heading">
          Chi tiết đơn 
        </div>
        <div class="table-responsive">
    <form action="{{route('order.store')}}" method="post">
        @csrf
      <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                </th>
                <th>Mã</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody id="myTable">
                @foreach($content as $result)
                    <tr>
                        <td></td>
                        <td>{{$result->id}}</td>
                        <td><span class="text-ellipsis">{{$result->name}}</span></td>
                        <td><span class="text-ellipsis">{{$result->qty}}</span></td>
                        <td><span class="text-ellipsis">{{$result->price}}</span></td>
                        <td><span class="text-ellipsis">{{$result->qty*($result->price)}}</span></td>
                    
                        
                    <?php 
                        $sub+=$result->qty*$result->price;
                     ?>
                @endforeach
            </tbody>
        </table>
        <label for="">Tổng tiền: {{number_format($sub)}} VND</label>
        <br>
        <label for="exampleInputEmail1">Thông tin khách hàng</label>
        <br>
        <dir class="col-md-3 form-group">
            <label for="exampleInputEmail1">Tên khách</label>
            <input type="text" class="form-control" name="name">

            <label for="exampleInputEmail1">Số điện thoại</label>
            <input type="text" class="form-control" name="phone">

            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" name="email">

            <label for="exampleInputEmail1">Địa chỉ</label>
            <input type="text" class="form-control" name="address">
            <br/>
           <button type="submit"  class="btn btn-info">Tạo hóa đơn</button>
        </dir>
        <input type="hidden" value="{{$sub}}" name="total_price">
     
      </form>
    </div>
        <!-- page end-->
        </div>
</section>
 
</section>

<!--main content end-->
</section>
@endsection('content')