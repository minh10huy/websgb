@extends('master-admin')
@section('content')

<!-- Content area -->
<div class="content">
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close"><span aria-hidden="true"></span></button>
    <strong>Hello!</strong> Đây là trang dành cho nhà quản trị
  </div>

  <!--stats -->
  <div class="row">
      <div class="col-sm-6 col-lg-3">
          <div class="widget-simple-chart text-right card-box">
              <div class="circliful-chart circliful text-success"><i class="icon-magazine"></i></div>
              <h3 class="text-success counter m-t-10">{{$newsc}}</h3>
              <p class="text-nowrap m-b-10">Tổng số tin tức</p>
          </div>
      </div>

      <div class="col-sm-6 col-lg-3">
          <div class="widget-simple-chart text-right card-box">
              <div class="circliful-chart circliful text-primary"><i class="icon-grid"></i></div>
              <h3 class="text-success counter m-t-10">{{$depart}}</h3>
              <p class="text-nowrap m-b-10">Tổng số bộ phận</p>
          </div>
      </div>

      <div class="col-sm-6 col-lg-3">
          <div class="widget-simple-chart text-right card-box">
              <div class="circliful-chart circliful text-warning"><i class="icon-people"></i></div>
              <h3 class="text-success m-t-10">{{$member}}</h3>
              <p class="text-nowrap m-b-10">Tổng số nhân sự</p>
          </div>
      </div>

      <div class="col-sm-6 col-lg-3">
          <div class="widget-simple-chart text-right card-box">
              <div class="circliful-chart circliful text-pink"><i class="icon-image4"></i></div>
              <h3 class="text-success counter m-t-10">{{$album}}</h3>
              <p class="text-nowrap m-b-10">Tổng số album</p>
          </div>
      </div>

      <div class="col-sm-6 col-lg-3">
          <div class="widget-simple-chart text-right card-box">
              <div class="circliful-chart circliful text-pink"><i class="icon-images2"></i></div>
              <h3 class="text-success counter m-t-10">{{$photo}}</h3>
              <p class="text-nowrap m-b-10">Tổng số hình ảnh</p>
          </div>
      </div>


      <div class="col-sm-6 col-lg-3">
          <div class="widget-simple-chart text-right card-box">
              <div class="circliful-chart circliful text-slate-600"><i class="icon-video-camera3"></i></div>
              <h3 class="text-success counter m-t-10">{{$video}}</h3>
              <p class="text-nowrap m-b-10">Tổng số video</p>
          </div>
      </div>


      <div class="col-sm-6 col-lg-3">
          <div class="widget-simple-chart text-right card-box">
              <div class="circliful-chart circliful text-danger"><i class="icon-question3"></i></div>
              <h3 class="text-success counter m-t-10">{{$ques}}</h3>
              <p class="text-nowrap m-b-10">Tổng số câu hỏi</p>
          </div>
      </div>

      <div class="col-sm-6 col-lg-3">
          <div class="widget-simple-chart text-right card-box">
              <div class="circliful-chart circliful text-purple-700"><i class="icon-clipboard2"></i></div>
              <h3 class="text-success counter m-t-10">{{$ans}}</h3>
              <p class="text-nowrap m-b-10">Tổng số câu trả lời</p>
          </div>
      </div>
  </div><!-- /stats -->



</div><!-- /content area -->

@endsection
<script language="javascript" type="text/javascript">
    $(document).ready(function() {
        setInterval("location.reload(true)", 60000);
    });
</script>
