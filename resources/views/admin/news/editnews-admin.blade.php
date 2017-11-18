@extends('master-admin')

@section('content')

<!-- Content area -->
<div class="content">

  <!-- Fieldset legend -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <?php $path = 'public/upload/news/'?>

      <!-- Basic legend -->
      <form class="form-horizontal" method="POST" action="{{Route('post-sua-tin',$updatenews->News_ID)}}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">Sửa Tin Tức</h5>
            <div class="heading-elements">
              <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
              </ul>
            </div>
          </div>

          <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('messages'))
            <div class="alert alert-success">
                {{session('messages')}}
            </div>
            @endif


            <fieldset>
                  <div class="form-group">
                    <label>Ngày đăng :</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calendar2"></i></span>
                      <input type="text" class="form-control daterange-single" placeholder="Chọn ngày đăng" value="{{date('m-d-Y', strtotime($updatenews->News_Date))}}" name="ndate">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Tiêu đề:</label>
                    <input type="text" class="form-control" placeholder="Nhập tiêu đề" value="{{$updatenews->News_Title}}" name="ntitle">
                  </div>

                  <div class="form-group">
                    <span>Tin hot: </span>
                    <span>
                      @if($updatenews->News_Hot == 1)
                          <span class="btn-success">Có</span>
                      @else
                          <span class="btn-danger">không</span>
                      @endif
                    </span>
                    <p>Thay đổi: </p>
                    <div class="radio radio-primary">
                        <input type="radio" name="nhot" id="radio1" value="1">
                        <label for="radio1">Có</label>
                        <br/>
                        <input type="radio" name="nhot" id="radio2" value="0">
                        <label for="radio2">Không</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Hình Ảnh:</label>
                    <div class="row">
                      <div class="col-sm-10">
                        @if($updatenews->News_Image != "")
                      		<img class="img-responsive img-thumbnail" width="50%" src="{{asset($path.date('d-m-Y', strtotime($updatenews->News_Date)).'/'.$updatenews->News_Image)}}"/>
  											<?php else: ?>
  												  Chưa có hình
  											@endif
                      </div>
                   </div>
                  </div>

                  <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control" rows="3" placeholder="Nhập mô tả" id="field-6" name="ndesc">{{$updatenews->News_Description}}
</textarea>
                  </div>

                  <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea id="editor1" class="ckeditor" rows="10" cols="80" name="ncontent">{{$updatenews->News_Content}}</textarea>
                  </div>
            </fieldset>

            <div class="text-right">
              <a href="{{route('quanli-tin')}}" class="btn btn-danger"><i class="icon-arrow-left13 position-right"></i>Trở về</a>
              <button type="submit" class="btn btn-primary">Sửa<i class="icon-arrow-right14 position-right"></i></button>
            </div>
          </div>
        </div>
      </form><!-- /end form-->


    </div><!--end col-->

  </div><!-- /end row-->

  <!-- Footer -->
  <div class="footer text-muted">
    &copy; 2017.SaigonBpo Admin by Khoa Tran
  </div>
  <!-- /footer -->

</div>
<!-- /content area -->


@endsection
