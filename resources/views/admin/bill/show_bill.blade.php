@extends('admin.layout')
@section('title','Chi tiết đơn hàng')
@section('content')
<!--main content start-->
<!--main content start-->
<?php
    $sub = 0;
?>
<style type="text/css">
    .print{
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
    }
</style>
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
                </section>
            </div>
        </div>
         <div class="panel-heading">
          Chi tiết đơn nhập
        </div>
        <div class="table-responsive">
            <form action="" method="post">
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
                        @foreach($bill_detail as $result)
                            <tr>
                                <td></td>
                                <td>{{$result->id}}</td>
                                <td><span class="text-ellipsis">{{$result->id}}</span></td>
                                <td><span class="text-ellipsis">{{$result->qty}}</span></td>
                                <td><span class="text-ellipsis">{{$result->price}}</span></td>
                                <td><span class="text-ellipsis">{{$result->qty*($result->price)}}</span></td>
                            </tr>
                            <?php 
                                $sub+=$result->qty*$result->price;
                             ?>
                        @endforeach
                    </tbody>
                </table>
                <label for="">Tổng tiền: {{number_format($sub)}} VND</label>
                <br>
                <label for="exampleInputEmail1">Nhà cung cấp: {{$bill->providers->name}}</label>
                <br/>
                <input type="hidden" value="{{$sub}}" name="total_price">
              </form>
        </div>
        <br>
          <a class="print" href="{{route('admin.bill.print',['checkcode'=>$bill->id])}}"  >In hóa đơn</a>
        <!-- page end-->
        </div>
</section>
 
</section>

<!--main content end-->
</section>
@endsection('content')