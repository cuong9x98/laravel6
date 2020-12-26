@extends('admin.layout')
@section('title','Thương Hiệu')
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
      Danh sách sản phẩm
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
            <th>Tên </th>
            <th>Ảnh </th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody id="myTable">
                @foreach($product as $product)
                <tr>
                    <td><label class="i-checks m-b-none"><i></i></label></td>
                    <td>{{$product->id}}</td>
                    <td><span class="text-ellipsis">{{$product->name}}</span></td>
                    @php 
                      $imageImplode = $product->image;
                      $imageExplode = explode(',',$imageImplode);
                    @endphp
                    <td>
                       @foreach(array_slice($imageExplode,0,1) as $items)
                       <img width="100x" height="100px" src="{{asset('img_product/'.$items)}}"> 
                       @endforeach
                    </td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('product.show',['product'=>$product->id])}}" class="active" ui-toggle-class="">
                            <i class="fa fa-eye text-dark text-active"></i>
                        </a>
                    </td>
                    <td width="10px">
                        <a href="{{route('product.edit',['product'=>$product->id])}}">
                            <i class="fa fa-wrench text-success text-active"></i>
                        </a>
                    </td>
                    <form action="{{route('product.destroy',['product'=>$product->id])}}" width="10px" method="post">
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