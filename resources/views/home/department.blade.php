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
						<li><a href="{{route('bophan')}}">Bộ phận</a></li>
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
		<?php $path = 'public/upload/subcate/'; ?>
		<!-- department -->
		@foreach ($depart as $items)
		<div class="col-md-3 col-sm-6">
			<div class="service">
				@if($items->Sub_Image != "")
					<img src='{{asset($path.$items->Sub_Image)}}' alt='' />
				<?php else: ?>
					<img src='public/home/images/no-image.png' alt='' />
				@endif
				<div class="service-overlay">
					<h4>{{$items->Sub_Name}}</h4>
					<div class="hidden-part">
						<p>{{$items->Sub_Description}}</p>
						<a href="{{route('nhanvien',$items->Sub_ID)}}">Xem thêm</a>
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
				{{$depart->links()}}
			</ul>
		</nav>
	</div>
	<div class="clearfix"></div>
</div>

@endsection
