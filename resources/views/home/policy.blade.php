@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Chính sách</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Trang Chủ</a></li>
						<li>Chính Sách</li>
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

   @foreach ($poli as $polii)
			<div class="col-md-4 col-sm-6">
				<!-- Service -->
				<div class="service">
					<img src="{{asset('public/home/images/'.$polii->Poli_Thumb)}}" alt="" />
					<div class="service-overlay">
						<h4>{{$polii->Poli_Title}}</h4>
						<div class="hidden-part">
							<p>{{$polii->Poli_Description}}</p>
							<a href="{{route('tinchitiet',$polii->Poli_ID)}}">Xem thêm</a>
						</div>
					</div>
				</div>
			</div>
  @endforeach

	</div><!--end row-->

	<!-- Pagination -->
	<div class="pagination-container">
		<nav class="pagination">
			<ul>
				{{$poli->links()}}
			</ul>
		</nav>
	</div>
	<div class="clearfix"></div>
</div>

@endsection
