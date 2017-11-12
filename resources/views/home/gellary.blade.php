@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><a href="{{route('album')}}">Album</a></h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('thuvien')}}">Thư Viện</a></li>
						<li><a href="#">Hình Ảnh</a></li>
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
		<?php $path = 'public/upload/photo/'?>
		<!-- Content -->
		<div class="col-md-12 col-sm-12">

			<!-- Headline -->
			@foreach ($album as $alb)
			<h3 class="headline small with-border">{{$alb->Album_Title}}</h3>
			@endforeach
			<!-- Service Gallery -->
			<div class="row gallery">
				@foreach ($photo as $photos)
				<div class="col-md-4">
					<a href="{{asset($path.date('d-m-Y', strtotime($photos->Photo_Date)).'/'.$photos->Photo_Image)}}" class="img-hover margin-top-5">
						<img src="{{asset($path.date('d-m-Y', strtotime($photos->Photo_Date)).'/'.$photos->Photo_Image)}}" alt="" />
					</a>
				</div>
				@endforeach
			</div>
			<!--end row-->

			<div class="pagination-container">
				<nav class="pagination">
					<ul>
						{{$photo->links()}}
					</ul>
				</nav>
			</div>

			<a href="{{route('album')}}" class="button small border"><i class="fa fa-long-arrow-left"></i> Quay lại </a>
		</div>

	</div>
</div>

@endsection
