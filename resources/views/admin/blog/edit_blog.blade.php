@extends('admin.layout')
@section('title','Loại sản phẩm')
@section('content')
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
                            Sửa bài viết
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{route('blog.update',['blog'=>$blog->id])}}" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <!-- Tiêu đề -->
                                        <label for="exampleInputEmail1">Tiêu đề</label>
                                        <input type="text" value="{{$blog->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="">
                                        <!-- Mô tả ngắn -->
                                        <label for="exampleInputEmail1">Mô tả ngắn</label>
                                        <input type="text" value="{{$blog->short_description}}" name="short_description" class="form-control" id="exampleInputEmail1" placeholder=" ">
                                        <!-- Ảnh bài viết -->
                                        <label for="exampleInputFile">Chọn ảnh</label>
                                        <input  name="img" id="upload" type="file"  >
                                        <!-- Nội dung -->
                                        <script src="../ckeditor/ckeditor.js"></script>
                                        <div class="form-group mb-0">
                                             <label for="exampleInputEmail1">Mô tả </label>
                                            <textarea name="description"  id="ckeditor1" class="ckeditor" >{{$blog->description}}</textarea>
                                            <script>
                                                CKEDITOR.replace(ckeditor1);
                                            </script>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Sửa</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>
</section>

<!--main content end-->
</section>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
@endsection('content')