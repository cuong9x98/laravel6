@extends('client.header')
@section('title','Xác thực')
@section('content')
<?php 
    $content = Cart::content();
    $count = Cart::count();
    $sub = Cart::total();
   	$t = 0;
?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Trang chủ</a></li>
				  <li class="active">Xác nhận</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="register-req">
				<p>Xin vui lòng xác nhận thông tin mua hàng của quý khách</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3 clearfix">
						<div class="bill-to">
							<p>Thông tin</p>
							<div style="width: 100%" class="form-one">
								<form action="{{route('client.checkout.store')}}" method="post">
									@csrf
									<input type="text" name="name" placeholder="Tên khách">
									<input type="text" name="email" placeholder="Email">
									<input type="text" name="phone" placeholder="Số điện thoại">
									<input type="text" name="address" placeholder="Địa chỉ">
									@foreach($content as $result)
									<?php 
										$t+=$result->price*$result->qty;
									 ?>
									 @endforeach
									<input type="text" name="sub" placeholder="" value="{{$t}}">
									<textarea style=" height:100px;margin-bottom:10px" name="note" placeholder="Ghi rõ địa chỉ giao hàng và các yêu cầu khác" rows="16"></textarea>

									<button id="" type="submit"  class="btn btn-fefault cart">
										Mua hàng
									</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image">Sản phẩm</td>
										<td class="description"></td>
										<td class="price">Giá</td>
										<td class="quantity">Số lượng</td>
										<td class="total">Tổng</td>
									</tr>
								</thead>
								<tbody>
									@foreach($content as $result)
									<tr>
										<td class="cart_product">
											<img width="90px" height="90px" src="{{$result->options->image}}" alt="image">
										</td>
										<td class="cart_description">
											<h4><a href="">{{$result->name}}</a></h4>
											<p>Mã: {{$result->id}}</p>
										</td>
										<td class="cart_price">
											<p>{{number_format($result->price,0,'.',',')}} VND</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<input value="{{$result->qty}}" class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">{{number_format($result->price*$result->qty) }}VND</p>
										</td>
									</tr>

									@endforeach
									
									<tr>
										<td colspan="4">&nbsp;</td>
										<td colspan="2">
											<table class="table table-condensed total-result">
												<tr>
													<td>Tổng tiền</td>
													<td>{{$sub}} VND</td>
												</tr>
												<tr>
													<td>Khuyến mại</td>
													<td>$2</td>
												</tr>
												<tr class="shipping-cost">
													<td>Giá Ship</td>
													<td>Free</td>										
												</tr>
												<tr>
													<td>Thành tiền</td>
													<td><span>{{($sub)}} VND</span></td>
												</tr>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			
			</div>
		</div>
</section> <!--/#cart_items-->
@endsection