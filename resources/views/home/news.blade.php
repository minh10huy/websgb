@extends('master')
@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				@foreach($Cate as $item)
					<h2>{{$item->Cat_name}}</h2>
				@endforeach

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('tintuc')}}">Tin tức</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="row">
		<div class="col-md-8">
			<?php $path = 'public/upload/news/'?>

       @foreach($newsall as $new)
				<!-- Post -->
				<div class="post-container">
					<div class="post-img"><img class="img-responsive" src="{{asset($path.date('d-m-Y', strtotime($new->News_Date)).'/'.$new->News_Image)}}" alt="blog-name-img"/></div>
					<div class="post-content">
						<a href="{{route('tinchitiet',$new->News_ID)}}"><h3>{{$new->News_Title}}</h3></a>
						<div class="meta-tags">
							<span>{{date('d-m-Y', strtotime($new->News_Date))}}</span>
							<!-- <span><a href="#">0 Comments</a></span> -->
						</div>
						<p>{{$new->News_Description}}</p>
						<a class="button" href="{{route('tinchitiet',$new->News_ID)}}">Xem thêm</a>
					</div>
				</div><!--end Post -->
		  @endforeach

			<!-- Pagination -->
			<div class="pagination-container">
				<nav class="pagination">
					<ul>
						{{$newsall->links()}}
					</ul>
				</nav>
			</div>
			<div class="clearfix"></div>

		</div><!-- Blog Posts / End -->

		@include('home.sidebar')

	</div><!-- Widgets / End -->
</div>
@endsection
