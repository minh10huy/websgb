@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Video</h2>
				<!-- <span>Tagline</span> -->

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('thuvien')}}">Thư Viện</a></li>
						<li>Video</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
<!-- Content
================================================== -->
<div class="container">
	<div class="row">
		<!-- Video Gallery -->

	<?php $path = 'public/upload/video/'; ?>

	<div class="videos">

     @foreach ($video  as $vd)
		 	<div class="col-md-4 video-thumbnail">
					<video id="video" class="video-js vjs-default-skin" controls preload="none" width="380" height="250"
					 poster="{{asset($path.date('d-m-Y', strtotime($vd->Video_Date)).'/'.$vd->Video_Image)}}" data-setup="{}" title="{{$vd->Video_Title}}">
					 <source src="{{asset($path.date('d-m-Y', strtotime($vd->Video_Date)).'/'.$vd->Video_Name)}}" type="video/mp4">
				  </video>
					<span class="vdtitle">{{$vd->Video_Title}}</span>
					<br/>
					<span>Ngày đăng: </span><span class="vdtime">{{date('d-m-Y', strtotime($vd->Video_Date))}}</span>
			</div><!--end col-->
		@endforeach

	</div><!--end videos-->


 </div><!--end row-->


	<div class="row">

		<!-- Pagination -->
		<div class="pagination-container">
			<nav class="pagination">
				<ul>
					{{$video->links()}}
				</ul>
			</nav>
		</div>

  </div><!-- end row -->
</div><!--container-->


@endsection
