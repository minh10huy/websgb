@extends('master-admin')

@section('content')
<!-- Content area -->
<div class="content">

  <!-- Fieldset legend -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <?php $path = 'public/upload/member/'?>
      <!-- Basic legend -->
      <form class="form-horizontal" method="POST" action="{{Route('post-sua-member',$updatemb->Employee_ID)}}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">Sửa Nhân Sự</h5>
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
										  <label>Phòng ban:</label>
                      <select data-placeholder="Chọn từ danh mục" class="select" value="{{old('mbcate')}}" name="mbcate">
                          <option value="{{$updatemb->Sub_ID}}">{{$updatemb->Sub_Name}}</option>
                      </select>
		          		</div>

                  <div class="form-group">
                    <label>Chức vụ:</label>
                    <select data-placeholder="Chọn từ danh mục" class="select" value="{{old('mbposition')}}" name="mbposition">
                          <option value="{{$updatemb->Position_ID}}">{{$updatemb->Position_Name}}</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Tên nhân viên:</label>
                    <input type="text" class="form-control" placeholder="Tên nhân viên" value="{{$updatemb->Employee_Name}}" name="mbname">
                  </div>

                  <div class="form-group">
                    <label>Cấp trên là:</label>
                      <input type="text" class="form-control" placeholder="Tên nhân viên" value="{{$updatemb->Employee_Parent_ID}}" name="mbparent">
                  </div>


                  <div class="form-group">
                    <label>Hình ảnh:</label>
                    <div class="row">
                      <div class="col-sm-10">
                        @if($updatemb->Employee_Avatar != "")
                          <img class="img-responsive img-thumbnail" width="200" src="{{asset($path.$updatemb->Employee_Avatar)}}"/>
                        <?php else: ?>
                            Chưa có hình
                        @endif
                      </div>
                   </div>
                  </div>

                  <div class="form-group">
                    <span>Trưởng nhóm/trưởng phòng: </span>
                    <span>
                      @if($updatemb->Employee_Top == 1)
                          <span class="btn-success">Có</span>
                      @else
                          <span class="btn-danger">không</span>
                      @endif
                    </span>
                    <p>Thay đổi: </p>
                    <div class="radio radio-primary">
                        <input type="radio" name="mbtop" id="radio1" value="1">
                        <label for="radio1">Có</label>
                        <br/>
                        <input type="radio" name="mbtop" id="radio2" value="0">
                        <label for="radio2">Không</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Phone nội bộ:</label>
                    <input type="text" class="form-control" placeholder="Phone nội bộ" value="{{$updatemb->Employee_InterPhone}}" name="mbphone">
                  </div>

                  <div class="form-group">
                    <label>Email nội bộ:</label>
                    <input type="email" class="form-control" placeholder="email nội bộ" value="{{$updatemb->Employee_Email}}" name="mbemail">
                  </div>


                  <div class="form-group">
                    <label>Tháng ngày sinh :</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calendar2"></i></span>
                      <input type="text" class="form-control daterange-single" placeholder="Chọn ngày sinh" value="{{date('m-d-Y', strtotime($updatemb->Employee_Birthday))}}" name="mbbirth">
                    </div>
                  </div>


                  <div class="form-group">
                    <label>Thông tin thêm</label>
                    <textarea id="editor1" class="ckeditor" rows="10" cols="80" name="mbcontent">{{$updatemb->Employee_Intro}}</textarea>
                  </div>

            </fieldset>

            <div class="text-right">
              <a href="{{route('quanli-member')}}" class="btn btn-danger"><i class="icon-arrow-left13 position-right"></i>Trở về</a>
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
