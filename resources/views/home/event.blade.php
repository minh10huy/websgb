@extends('master')
@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Sự Kiện</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Trang chủ</a></li>
						<li><a href="#">Tin Tức</a></li>
						<li>Sự Kiện</li>
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
		<?php $path = 'public/upload/news/'; ?>
 		@foreach($newsev as $tinsk)
			<!-- Post -->
			<div class="post-container">
				<div class="post-img"><img class="img-responsive" src="{{asset($path.$tinsk->News_Image)}}" alt="blog-name-img"  /></div>
				<div class="post-content">
					<a href="{{route('tinchitiet',$tinsk->News_ID)}}"><h3>{{$tinsk->News_Title }}</h3></a>
					<div class="meta-tags">
						<span>{{$tinsk->News_Date}}</span>
						<!-- <span><a href="#">0 Comments</a></span> -->
					</div>
					<p>{{$tinsk->News_Description}}</p>
					<a class="button" href="{{route('tinchitiet',$tinsk->News_ID)}}">Xem thêm</a>
				</div>
			</div>
 		@endforeach


			<!-- Pagination -->
			<div class="pagination-container">
				<nav class="pagination">
					<ul>
						{!! $newsev->links() !!}
					</ul>
				</nav>

			</div>
			<div class="clearfix"></div>

		</div><!-- Blog Posts / End -->
			@include('home.sidebar')
	</div><!-- Widgets / End -->
</div>

@endsection
