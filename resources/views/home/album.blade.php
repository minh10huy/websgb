@extends('master')
@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Album</h2>
				<!-- <span>Tagline</span> -->

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('thuvien')}}">Thư Viện</a></li>
						<li>Hình Ảnh</li>
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

		<!-- Projects -->
		<div class="projects">
    <?php $path = 'public/upload/album/'?>

			 @foreach ($album as $alb)
				<!-- Item -->
				<div class="col-md-4 col-sm-6">
					<a href="{{route('hinhanh', $alb->Album_ID)}}">
						<img src="{{asset($path.date('d-m-Y', strtotime($alb->Album_Date)).'/'.$alb->Album_Thumb)}}" alt="" />
						<div class="overlay">
							<div class="overlay-content">
								<h4>{{$alb->Album_Title}}</h4>
								<span>{{date('d-m-Y', strtotime($alb->Album_Date))}}</span>

							</div>
						</div>
						<div class="plus-icon"></div>
					</a>
				</div>
			@endforeach

		</div>

	</div>

  <div class="row">
	<!-- Pagination -->
	<div class="pagination-container">
		<nav class="pagination">
			<ul>
				{{$album->links()}}
			</ul>
		</nav>
	</div>

  </div><!-- end row -->
</div>
@endsection
