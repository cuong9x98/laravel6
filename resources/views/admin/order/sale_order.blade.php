@extends('admin.layout')
@section('title','Danh sách đơn hàng nhập')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    @if(session('msg'))
    <div class="alert alert-success" role="alert">
        {{ session('msg') }}
    </div>
    @endif
    <div class="panel-heading">
      Danh sách đơn hàng đã bán
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Xóa chọn</option>
        </select>
        <button class="btn btn-sm btn-default">Áp dụng</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" id="myInput" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
            </th>
            <th>Mã</th>
            <th>Đơn giá</th>
            <th>Trạng thái</th>
            <th>Số điện thoại</th>
            <th>Tên khách</th>
            <th>Ngày nhận</th>
          </tr>
        </thead>
        <tbody id="myTable">
                @foreach($order as $order)
                <tr>
                    <td></td>
                    <td>{{$order->id}}</td>
                    <td><span class="text-ellipsis">{{$order->total_price}}</span></td>
                    @if($order->status==0)
                    <td><span class="text-ellipsis">Chưa xác nhận</span></td>
                    @else
                    <td><span class="text-ellipsis">Đã xác nhận</span></td>
                    @endif
                    <td><span class="text-ellipsis">{{$order->customers->name}}</span></td>
                    <td><span class="text-ellipsis">{{$order->customers->phone}}</span></td>
                    <td><span class="text-ellipsis">{{$order->created_at->format('d/m/Y')}}</span></td>
                    <td width="10px">
                        <a href="{{route('order.show',['order'=>$order->id])}}" class="active" ui-toggle-class="">
                            <i class="fa fa-eye text-dark text-active"></i>
                        </a>
                    </td>
                    
                    <form action="{{route('order.destroy',['order'=>$order->id])}}" width="10px" method="post">
                        @csrf
                        @method('delete')
                        <td width="10px">
                            <button type="submit">
                                <i class="fa fa-times text-danger text"></i>
                            </button>
                        </td>    
                    </form>
                </tr>
                 @endforeach   
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">hiển thị 20-30 của 50</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
          <div class="footer">
            <div class="wthree-copyright">
              <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
          </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
@endsection('content')