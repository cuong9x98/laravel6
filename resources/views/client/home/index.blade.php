@extends('client.layout')
@section('title','Trang chủ')

@section('content')
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Sản phẩm Mua Nhiều</h2>
		@foreach($product_buy as $product)
		<a href="{{route('client.home.show',$product->id)}}">
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							@php 
		                      $imageImplode = $product->image;
		                      $imageExplode = explode(',',$imageImplode);
		                    @endphp
	                        @foreach(array_slice($imageExplode,0,1) as $items)
							<img width="255px" height="237px" src="{{asset('img_product/'.$items)}}" alt="image_product" />
							@endforeach
							<h2>{{number_format($product->price,0,'.',',')}} VND</h2>
							<p>{{$product->name}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
						</div>
					</div>
				</div>
			</div>
		</a>
		@endforeach
	</div><!--features_items-->
</div>
<div class="col-sm-12 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Sản phẩm xem nhiều</h2>
		@foreach($product_view as $product)
		<a href="{{route('client.home.show',$product->id)}}">
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							@php 
		                      $imageImplode = $product->image;
		                      $imageExplode = explode(',',$imageImplode);
		                    @endphp
	                        @foreach(array_slice($imageExplode,0,1) as $items)
							<img width="255px" height="237px" src="{{asset('img_product/'.$items)}}" alt="image_product" />
							@endforeach
							<h2>{{number_format($product->price,0,'.',',')}} VND</h2>
							<p>{{$product->name}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
						</div>
					</div>
				</div>
			</div>
		</a>
		@endforeach
	</div><!--features_items-->
</div>
@endsection('content')
@section('banner')
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
</section><!--/slider-->
@endsection('banner')
