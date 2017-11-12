@extends('master-admin')

@section('content')
<!-- Content area -->
<div class="content">

  <!-- Fieldset legend -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <?php $path = 'public/upload/album/'?>
      <!-- Basic legend -->
      <form class="form-horizontal" method="POST" action="{{Route('post-sua-album',$updateab->Album_ID)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">Sửa Album</h5>
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
                      <label>Danh mục:</label>
                      <select data-placeholder="Chọn từ danh mục" class="select" value="{{ old('abcate') }}" name="abcate">
                            <option value=""></option>
                            <option value="10">Album</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label>Ngày tạo alum :</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calendar2"></i></span>
                      <input type="text" class="form-control daterange-single" placeholder="Chọn ngày đăng" value="{{date('m-d-Y', strtotime($updateab->Album_Date))}}" name="abdate">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Tên album:</label>
                    <input type="text" class="form-control" placeholder="Nhập tên album" value="{{$updateab->Album_Title}}" name="abtitle">
                  </div>

                  <div class="form-group">
                    <label>Hình Ảnh:</label>
                    <div class="row">
                      <div class="col-sm-10">
                        <img class="img-responsive img-thumbnail" width="400" src="{{asset($path.date('d-m-Y', strtotime($updateab->Album_Date)).'/'.$updateab->Album_Thumb)}}"/>
                      </div>
                   </div>
                  </div>

                  <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control" rows="3" id="field-6" name="abdesc">{{$updateab->Album_Description}}</textarea>
                  </div>

                  <div class="form-group">
                    <label>Bạn ko thể sử dụng chức năng này</label>
                    <textarea id="editor1" class="ckeditor" rows="10" cols="80" name="" disabled></textarea>
                  </div>

            </fieldset>

            <div class="text-right">
              <a href="{{route('quanli-album',$updateab->Album_ID)}}" class="btn btn-danger"><i class="icon-arrow-left13 position-right"></i>Trở về</a>
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
