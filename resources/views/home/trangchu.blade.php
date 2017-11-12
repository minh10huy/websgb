@extends('master')
@section('content')
<!-- Head Banner -->
<div class="head-banner" style="background-image: url({{asset('public/home/images/parallax-img.jpg')}}">
	<div class="head-title">
		<p>Chào mừng <span class="organ"> {{ Auth::user()->name }} </span>đến với</p>
		<!-- <span>website nội bộ công ty </span><span class="blue">saigon</span><span class="organ">bpo</span></div> -->
		<span>website nội bộ công ty
	</div>
</div>

<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h3 class="headline centered with-border">Chúc mừng sinh nhật các thành viên tháng 11</h3>
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

    <?php $path = 'public/upload/news/'?>

		@foreach($newsmain as $new)

			<!-- Item -->
			<div class="col-md-4 col-sm-6">
				<a href="{{Route ('tinchitiet',$new->News_ID)}}">
					<img src="{{asset($path.date('d-m-Y', strtotime($new->News_Date)).'/'.$new->News_Image)}}" class="img-responsive" alt="" />
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
