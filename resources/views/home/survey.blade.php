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

			<?php $path = 'public/upload/answer/'; ?>

			 @if (session()->has('data'))
				<div class="alert alert-danger">
						{{session('data')}}
				</div>
		   @endif

			 @if (session()->has('wraning'))
			 <div class="alert alert-danger">
					 {{session('wraning')}}
			 </div>
			@endif

			@if(session('messages'))
      <div class="alert alert-success">
          {{session('messages')}}
      </div>
      @endif

			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
								<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@foreach ($quescate as $itemqc)

			<div class="poll-container">
				<form id="fsurvey" action="{{Route('post_khaosat_edit',$itemqc->Ques_ID)}}" method="post">
				{{ csrf_field() }}
			    <div class="panel panel-primary">
			      <div class="panel-heading">
								{{$itemqc->Ques_Title}}
			      </div>

			      <div class="panel-body">
						@foreach ($survey as $itemsv)
		            <ul>
		              <li>
										@if($itemsv->Ans_Image != "")
		                	<img class="img-responsive" src="{{asset($path.$itemsv->Ans_Image)}}"/>
										@else
											<span></span>
										@endif
		                <input class="" type="radio" name="ansrdo" value="{{$itemsv->Ans_ID}}"> {{$itemsv->Ans_Title}}
		              </li>
		            </ul>

						@endforeach
			      </div><!--panel-body-->

			      <div class="panel-footer">
							<!-- <button type="submit" name="act" class="button"><i class="fa fa-long-arrow-right"></i> Bình Chọn </button> -->
							<a href="javascript:{}" onclick="document.getElementById('fsurvey').submit(); return false;" class="button small border right">
								<i class="fa fa-paper-plane-o"></i> Bình Chọn
							</a>
							<a href="{{route('ketqua',$itemsv->Ans_Ques_ID)}}" class="button small border"><i class="fa fa-pie-chart"></i> Kết Quả </a>
			      </div>
			  </div><!--panel-->

			</form><!--end form-->

		  @endforeach
 		</div><!--poll-container-->


		</div><!--col-md-12-->

	</div>
</div>
@endsection
