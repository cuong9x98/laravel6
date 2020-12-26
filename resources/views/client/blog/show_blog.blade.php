@extends('client.layout')
@section('title','Tin tức')
@section('content')
<div class="col-sm-9">
	<div class="blog-post-area">
		<h2 class="title text-center">Xem bài viết</h2>
		<div class="single-blog-post">
			<h3>{{$blog->name}}}</h3>
			<div class="post-meta">
				<ul>
					<li><i class="fa fa-user"></i> Mac Doe</li>
					<li><i class="fa fa-calendar"></i> {{$blog->created_at}}</li>
				</ul>
			</div>
			<a href="">
				<img src="../img_blog/{{$blog->img}}" alt="">
			</a>
			<p>{!!$blog->description!!}</p> 
		</div>
	</div><!--/blog-post-area-->

	

	<div class="socials-share">
		<a href=""><img src="images/blog/socials.png" alt=""></a>
	</div><!--/socials-share-->

	<div class="media commnets">
		<a class="pull-left" href="#">
			<img class="media-object" src="images/blog/man-one.jpg" alt="">
		</a>
		
	
</div>	
@endsection
	