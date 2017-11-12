@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Thư Viện</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('thuvien')}}">Thư Viện</a></li>
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
		<!-- department -->
		<?php $path = 'public/upload/library/'?>

		@foreach ($libcat as $libitem)
		<div class="col-md-4 col-sm-6">
			<div class="service">
				<img src="{{$path.$libitem->Sub_Image}}" alt="" />
				<div class="service-overlay">
					<h4>{{$libitem->Sub_Name}}</h4>
					<div class="hidden-part">
						<p>{{$libitem->Sub_Description}}</p>
						<a href="{{route('loai',['id' => $libitem->Sub_ID.'/'.str_slug($libitem->Sub_Name)] )}}">Xem thêm</a>
					</div>
				</div>
			</div>
		</div>
	 @endforeach
	</div>

	<!-- Pagination -->
	<div class="pagination-container">
		<nav class="pagination">
			<ul>
				<!-- <li><span>Page 1 of 2</span></li>
				<li><a href="#" class="current-page">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#" class="next">>></a></li> -->
				{{$libcat->links()}}
			</ul>
		</nav>
	</div>
	<div class="clearfix"></div>
</div>

@endsection
