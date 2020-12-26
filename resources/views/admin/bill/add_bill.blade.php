@extends('admin.layout')
@section('title','Hóa đơn nhập')
@section('content')
<?php
    $content = Cart::content();
    $sub = 0;
?>
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
                        Chọn sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('admin.bill.choose')}}" method="post" role="form">
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
    <form action="{{route('bill.store')}}" method="post">
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
                    <tr id="{{$result->id}}">
                        <form action="{{route('admin.bill.change')}}" method="post">
                        @csrf
                        <td></td>
                        <td>{{$result->id}}</td>
                        <td><span class="text-ellipsis">{{$result->name}}</span></td>
                        <td>
                            <input type="text" name="qty" value="{{$result->qty}}"> 
                            <input type="submit" value="Cập nhật" name="quantity"></input>
                        </td>
                        <td><span class="text-ellipsis">{{number_format($result->price)}} VND</span></td>
                        <td><span class="text-ellipsis">{{number_format($result->qty*($result->price))}} VND</span></td>
                        <td width="10px">
                            <a href="{{route('admin.bill.delete',['bill'=>$result->rowId])}}" class="active" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                        </form>>
                    </tr>
                    <input type="hidden" name="rowId" value="{{$result->rowId}}">
                    <?php 
                        $sub+=$result->qty*$result->price;
                     ?>
                @endforeach
            </tbody>
        </table>
        <label for="">Tổng tiền: {{number_format($sub)}} VND</label>
        <br>
        <label for="exampleInputEmail1">Nhà cung cấp</label>
        <select  name="provideder_id"  class="form-control m-bot15">
            @foreach($provider as $provider)
            <option value="{{$provider->id}}">{{$provider->name}}</option>
            @endforeach
        </select>
        <br/>
        <input type="hidden" value="{{$sub}}" name="total_price">
        <button type="submit"  class="btn btn-info">Tạo hóa đơn</button>
      </form>
    </div>
        <!-- page end-->
        </div>
</section>
 
</section>

<!--main content end-->
</section>


@endsection('content')