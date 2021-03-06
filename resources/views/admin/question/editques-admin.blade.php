@extends('master-admin')

@section('content')

<!-- Content area -->
<div class="content">

  <!-- Fieldset legend -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <!-- Basic legend -->
      <form class="form-horizontal" method="POST" action="{{Route('post-sua-cauhoi',$editques->Ques_ID)}}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">Sửa Câu Hỏi</h5>
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
                  <input type="text" class="form-control" placeholder="Nhập câu hỏi" value="{{$editques->Ques_Title}}" name="qstitle">
                </div>

                <div class="form-group">
                  <label>Ngày đăng :</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar2"></i></span>
                    <input type="text" class="form-control daterange-single"  placeholder="Chọn ngày đăng" value="{{date('m-d-Y', strtotime($editques->Ques_Date))}}"  name="qsdate">
                  </div>
                </div>

                <div class="form-group">
                  <label>Nội dung:</label>
                  <textarea id="editor1" class="ckeditor" rows="10" cols="80" disabled></textarea>
                </div>

            </fieldset>

            <div class="text-right">
              <a href="{{route('quanli-cauhoi')}}" class="btn btn-danger"><i class="icon-arrow-left13 position-right"></i>Trở về</a>
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
