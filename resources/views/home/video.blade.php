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

 		<div class="videos">
		<!-- Video Gallery -->
		  <?php
				$path = 'public/upload/video/';
			?>
			@foreach ($video  as $vd)
					<div class="col-md-4 video-thumbnail">
							<a href="{{asset($path.date('d-m-Y', strtotime($vd->Video_Date)).'/'.$vd->Video_Name)}}" data-lity="" class="img-hover" title="{{$vd->Video_Title}}">
								<img class="img-respomsive" src="{{asset($path.date('d-m-Y', strtotime($vd->Video_Date)).'/'.$vd->Video_Image)}}"/>
								<div class="plus-icon"></div>
							</a>
							<span class="vdtime"><i class="fa fa-calendar-o"></i> {{date('d-m-Y', strtotime($vd->Video_Date))}}</span>
					</div><!--end video-thumbnail-->
			@endforeach
		</div><!--end video-->

	</div>

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
