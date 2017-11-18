@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				@foreach($Subcate as $item)
					<h2>{{$item->Sub_Name}}</h2>
				@endforeach

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Trang chủ</a></li>
						<li><a href="#">Tin Tức</a></li>
						<li>Nội Bộ</li>
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
			@foreach ($newsloai as $tinnb)
				<!-- Post -->
				<div class="post-container">
					<div class="post-img"><img class="img-responsive" src="{{asset($path.$tinnb->News_Image)}}" alt="blog-name-img"  /></div>
					<div class="post-content">
						<a href="{{route('tinchitiet',$tinnb->News_ID)}}"><h3>{!! $tinnb->News_Title !!}</h3></a>
						<div class="meta-tags">
							<span>{!! $tinnb->News_Date !!}</span>
							<!-- <span><a href="#">0 Comments</a></span> -->
						</div>
						<p>{!! $tinnb->News_Description !!}</p>
						<a class="button" href="{{route('tinchitiet',$tinnb->News_ID)}}">Xem thêm</a>
					</div>
				</div><!--end Post -->
      @endforeach


			<!-- Pagination -->
			<div class="pagination-container">
				<nav class="pagination">
					<ul>
							{!! $newsloai->links() !!}
					</ul>
				</nav>

			</div>
			<div class="clearfix"></div>

		</div>

	<!-- Blog Posts / End -->
		@include('home.sidebar')

	<!-- Widgets -->

	</div>
	<!-- Widgets / End -->
</div>

@endsection
