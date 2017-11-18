@extends('master-admin')

@section('content')
<!-- Content area -->
<div class="content">

  <!-- Fieldset legend -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <?php $path = 'public/upload/answer/'?>

      <!-- Basic legend -->
      <form class="form-horizontal" method="POST" action="{{Route('post-sua-traloi',$editan->Ans_ID)}}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">Sửa Câu Trả Lời</h5>
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
                    <label>Câu hỏi:</label>
                    <select data-placeholder="Chọn câu hỏi" class="select" name="quescate">
                          <option value=""></option>
                          <option value="{{$editan->Ques_ID}}">{{$editan->Ques_Title}}</option>
                    </select>
                </div>

                  <div class="form-group">
                    <label>Câu trả lời:</label>
                    <input type="text" class="form-control" placeholder="Trả lời" value="{{$editan->Ans_Title}}" name="anstitle">
                  </div>

                  <div class="form-group">
                    <label>Hình Ảnh:</label>
                    <div class="row">
                      <div class="col-sm-10">
                        @if($editan->Ans_Image != "")
                      		<img class="img-responsive img-thumbnail" width="50%" src="{{asset($path.$editan->Ans_Image)}}"/>
  											<?php else: ?>
  												  Chưa có hình
  											@endif
                      </div>
                   </div>
                  </div>
            </fieldset>

            <div class="text-right">
              <a href="{{route('quanli-traloi')}}" class="btn btn-danger"><i class="icon-arrow-left13 position-right"></i>Trở về</a>
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
