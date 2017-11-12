@extends('master')
@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Tìm Kiếm</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
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
		<div class="col-md-12">
			<h3 class="headline centered with-border">Tìm thấy: {{count($newsearch)}} kết quả</h3>
		</div>
	</div>

	<div class="row">

		<!-- Projects -->
		<div class="projects latest">
		<?php $path = 'public/upload/news/'; ?>

		@foreach($newsearch as $new)
			<!-- Item -->
			<div class="col-md-4 col-sm-6">
				<a href="{{route('tinchitiet',$new->News_ID)}}">
					<img src="{{asset($path.date('d-m-Y', strtotime($new->News_Date)).'/'.$new->News_Image)}}" class="img-responsive" alt="" />
					<div class="overlay">
						<div class="overlay-content">
							<h4>{{$new->News_Title}}</h4>
							<span>{{$new->News_Date}}</span>
						</div>
					</div>
					<div class="plus-icon"></div>
				</a>
			</div>
     @endforeach
		</div>

	</div>
</div>
@endsection
