@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Bộ Phận</h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('bophan')}}">Bộ Phận</a></li>
            <!-- <li>Phần Mềm</li> -->
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
			@foreach($memtop as $memtops)
        <div class="col-sm-6 col-xs-6">
            <div class="list">
                <div class="list-header">
                    <a href="#" class="list-header-image">
											@if($memtops->Employee_Avatar != "")
                    		<img class="img-responsive" width="120" src="{{asset($path.$memtops->Employee_Avatar)}}">
											<?php else: ?>
												<img class="img-responsive" width="120" src="../public/home/images/no-mem.png"/>
											@endif
                    </a>
                </div>
                <div class="list-content">
                    <h3><a href="#" class="text-black">{{$memtops->Employee_Name}}</a></h3>
                    <span class="list-meta">
											<span class="list-meta-item"><i class="fa fa-id-card-o"></i> {{$memtops->Position_Name}}</span>
                    </span>
										<!-- <span class="list-meta">
											<span class="list-meta-item"><i class="fa fa-volume-control-phone"></i> {{$memtops->Employee_InterPhone}}</span>
                    	<span class="list-meta-item"><i class="fa fa-envelope-open-o"></i> {{$memtops->Employee_Email}}</span>
                    </span> -->
                    <p>{!!$memtops->Employee_Intro!!}</p>
                </div>
            </div>
        </div><!--end col-sm-->
			@endforeach
			  <div class="preboder"></div>
    </div><!--end row-->

		<div class="row">
			 @foreach($mem as $mems)
			 <div class="col-sm-6 col-xs-6">
					 <div class="list">
							 <div class="list-header">
									 <a href="#" class="list-header-image">
										 @if($mems->Employee_Avatar != "")
											 <img class="img-responsive" width="120" src="{{asset($path.$mems->Employee_Avatar)}}">
										 <?php else: ?>
											 <img class="img-responsive" width="120" src="../public/home/images/no-mem.png"/>
										 @endif
									 </a>
							 </div>
							 <div class="list-content">
									 <h3><a href="#" class="text-black">{{$mems->Employee_Name}}</a></h3>
									 <span class="list-meta">
										 <span class="list-meta-item"><i class="fa fa-id-card-o"></i> {{$mems->Position_Name}}</span>
									 </span>
									 <p>{!!$mems->Employee_Intro!!}</p>
							 </div>
					 </div>
			 </div>
			@endforeach

	 </div><!--end row-->
	 <!-- Pagination -->
	 <div class="pagination-container">
		 <nav class="pagination">
			 <ul>
				 {{$mem->links()}}
			 </ul>
		 </nav>
	 </div>
	 <div class="clearfix"></div>

	 <a href="{{route('bophan')}}" class="button small border"><i class="fa fa-long-arrow-left"></i> Quay lại </a>
</div>

@endsection
