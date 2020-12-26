@extends('client.layout')
@section('title','Tin tức')
@section('content')
<div class="col-sm-9">
	<div class="blog-post-area">
		<h2 class="title text-center">Các bài viết mới nhất</h2>
		@foreach($blog as $blog)
		<div class="single-blog-post">
			<h3>{{$blog->name}}</h3>
			<div class="post-meta">
				<ul>
					<li><i class="fa fa-user"></i> Mac Doe</li>
					<li><i class="fa fa-calendar"></i>{{$blog->created_at}}</li>
				</ul>
				<span>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
				</span>
			</div>
			<a href="{{route('client.blog.showBlog',['id'=>$blog->id])}}">
				<img width="845px" height="845px" src="../img_blog/{{$blog->img}}" alt="img_blog">
			</a>
			<p>{{$blog->short_description}}</p>
			<a  class="btn btn-primary" href="{{$blog->short_description}}">Đọc tiếp</a>
		</div>
		@endforeach
		<div class="pagination-area">
			<ul class="pagination">
				<li><a href="" class="active">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
			</ul>
		</div>
	</div>
</div>	
@endsection
	