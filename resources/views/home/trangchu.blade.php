@extends('master')
@section('content')

<style type="text/css">
	.slider {
			width: 100%;
			margin: 30px auto;
	}
	.slick-slide {
		margin: 0px 15px;
		position: relative;
	}

	.slick-slide img {
		width: 100%;
	}

	.slick-prev:before,
	.slick-next:before {
		color: white;
	}

	.slick-slide {
		transition: all ease-in-out .3s;
		opacity: .2;
	}

	.slick-active {
		opacity: 1;
	}

	.slick-current {
		opacity: 1;
	}

	.slick-text{
		color: #fff;
		font-weight: bold;
	}

	.slick-date{
		background-color: #ffa409;
		color: #fff;
		font-size: 12px;
		padding: 0px 5px;
		position: absolute;
		left: 0px;
		top: 0px;
		float: left;
	}
</style>



<!-- Head Banner -->
<div class="head-title">
		<p>Chào mừng <span class="organ"> {{ Auth::user()->name }} </span>đến với website nội bộ công ty</p>
</div>

<div class="head-banner" style="background-image: url({{asset('public/home/images/parallax-img.jpg')}}">
	<div class="container">
		<div class="row">
			<?php $path = 'public/upload/news/'?>
			<section class="regular slider">

				@foreach($newshot as $itemhot)
			    <div>
			    <a href="{{route('tinchitiet',$itemhot->News_ID)}}"><img src="{{asset($path.date('d-m-Y', strtotime($itemhot->News_Date)).'/'.$itemhot->News_Image)}}" class="img-responsive"></a>
						<span class="slick-text">{{$itemhot->News_Title}}</span>
						<span class="slick-date">{{date('d-m-Y', strtotime($itemhot->News_Date))}}</span>
			    </div>
				@endforeach

			  </section>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h3 class="headline centered with-border">Chúc mừng sinh nhật các nhân viên tháng 11</h3>
		</div>
	</div>


	<div class="cd-testimonials-wrapper cd-container">
 <ul class="cd-testimonials">
	 <?php $path = 'public/upload/member/'; ?>
	 @foreach($birthtop as $itemtop)
	 <li>
		 <div class="cd-author">
			 <img src="{{asset($path.$itemtop->Employee_Avatar)}}" alt="Author image">
			 <ul class="cd-author-info">
				 <li>{{$itemtop->Employee_Name}}</li>
				 <li>{{$itemtop->Position_Name}}</li>
			 </ul>
		 </div>
	 </li>
	 @endforeach


 </ul> <!-- cd-testimonials -->

 <a href="#" class="cd-see-all">Xem tất cả</a>
</div> <!-- cd-testimonials-wrapper -->

<div class="cd-testimonials-all">
 <div class="cd-testimonials-all-wrapper">
	 <ul>
		 @foreach($birthall as $itemall)
		 <li class="cd-testimonials-item">
			 <div class="cd-author">

				 <!-- <img src="{{asset($path.$itemall->Employee_Avatar)}}" alt="Author image"> -->

				 @if($itemall->Employee_Avatar != "")
					 <img class="img-responsive" src="{{asset($path.$itemall->Employee_Avatar)}}" alt="Member image">
				 <?php else: ?>
					 <img src="public/home/images/no-imgmem.png"/>
				 @endif


				 <ul class="cd-author-info">
					 <li>{{$itemall->Employee_Name}}</li>
					 <li>{{$itemall->Position_Name}}</li>
				 </ul>
			 </div> <!-- cd-author -->
		 </li>
		 @endforeach
	 </ul>
 </div>	<!-- cd-testimonials-all-wrapper -->

 <a href="#0" class="close-btn">Close</a>
</div> <!-- cd-testimonials-all -->




	<div class="row">
		<div class="col-md-12">
			<h3 class="headline centered with-border">Tin Tức</h3>
		</div>
	</div>

	<div class="row">

		<!-- Projects -->
		<div class="projects latest">

    <!-- <?php $path = 'public/upload/news/'?> -->

		@foreach($newsmain as $new)

			<!-- Item -->
			<div class="col-md-4 col-sm-6">
				<a href="{{Route ('tinchitiet',$new->News_ID)}}">
					<img src="{{asset($path.date('d-m-Y', strtotime($new->News_Date)).'/'.$new->News_Image)}}" class="img-responsive" />
					<div class="overlay">
						<div class="overlay-content">
							<h4>{{$new->News_Title}}</h4>
							<span>{{date('d-m-Y', strtotime($new->News_Date))}}</span>
						</div>
					</div>
					<div class="plus-icon"></div>
				</a>
			</div>
     @endforeach
		</div>

	</div>
</div>
<!-- Container -->


@endsection
