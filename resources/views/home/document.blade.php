@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Biểu Mẫu</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('noiquy')}}">Biểu mẫu</a></li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">

		<!-- Content -->
		<div class="container">
				<a class="button" href="{{route('trangchu')}}/storage/app/">Biểu mãu và quy định</a>
		</div>

	</div>
</div>

@endsection
