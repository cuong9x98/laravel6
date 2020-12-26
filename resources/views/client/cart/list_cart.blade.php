@extends('client.header')
@section('title','Giỏ hàng')
@section('content')
<?php 
    $content = Cart::content();
    $count = Cart::count();
   	$sub = 0;
?>
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Trang chủ</a></li>
			  <li class="active">Giỏ hàng</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Sản phẩm</td>
						<td class="description">Tên</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $result)
					<tr>
						<td class="cart_product">
							<img width="110px" height="110px" src="{{$result->options->image}}" alt="image">
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
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{$result->qty}}" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p style="font-size: 22px" class="cart_total_price">{{number_format($result->price*$result->qty) }}VND</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php 
						$sub+=$result->price*$result->qty;
					 ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
							
						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
						
						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div>
			<form action="{{route('client.checkout.create')}}">
				<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng tiền <span>{{number_format($sub)}} VND</span></li>
						<li>Khuyến mãi<span>$2</span></li>
						<li>Phí vận chuyển<span>Free</span></li>
						<li>Thành tiền<span>{{number_format($sub)}} VND</span></li>
					</ul>
						<a class="btn btn-default update" href="">Cập nhật</a>
						<button class="btn btn-default check_out" href="">Thanh toán</button>
				</div>
			</div>
			</form>
			
		</div>
	</div>
</section><!--/#do_action-->
@endsection