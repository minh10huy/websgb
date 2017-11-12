@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>TIN TỨC</h2>

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
   <?php $path = 'public/upload/news/'?>
	<!-- Blog Posts -->
	<div class="row">
		<div class="col-md-8">
			<!-- Post -->
			<div class="post-container margin-bottom-30">
				<div class="post-content no-border">
					<h3>{{$newsdt->News_Title}}</h3>
					<div class="meta-tags">
						<span>{{date('d-m-Y', strtotime($newsdt->News_Date))}}</span>
						<!-- <span>Lượt xem: {{$newsdt->News_CountView}}</span> -->
					</div>
					<div>
						{!! $newsdt->News_Content !!}
          </div>
				</div>
			</div>

	</div><!--end-col-->
  @include('home.sidebar')
  </div><!--end row-->

</div>

@endsection
