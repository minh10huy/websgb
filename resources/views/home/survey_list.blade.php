@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

					<h2>Khảo Sát</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="#">Khảo sát</a></li>
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

			 @foreach ($ques as $qitem)
			 <div class="testimonial">
            <div class="testimonial-content">
                <div class="testimonial-icon">
                    <i class="fa fa-question"></i>
                </div>
                <h3 class="description">
                    <a href="{{route('khaosat_edit',$qitem->Ques_ID)}}">{{$qitem->Ques_Title}} ?</a>
            		</h3>
            		<span class="date">{{date('d-m-Y', strtotime($qitem->Ques_Date))}}</span>
        	 </div>
			</div>
			@endforeach

		</div><!--end col-->
	</div>
</div>
@endsection
