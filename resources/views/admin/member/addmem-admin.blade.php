@extends('master-admin')

@section('content')
<!-- Content area -->
<div class="content">

  <!-- Fieldset legend -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <!-- Basic legend -->
      <form class="form-horizontal" method="POST" action="{{Route('post-them-member')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">Thêm Nhân Sự</h5>
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

            @if(session('success'))
              <div class="alert alert-success">
                  {{session('success')}}
              </div>
            @endif

            @if(session('status'))
              <div class="alert alert-danger">
                  {{session('status')}}
              </div>
            @endif

            <fieldset>
                  <div class="form-group">
										  <label>Phòng ban:</label>
                      <select data-placeholder="Chọn từ danh mục" class="select" value="{{ old('mbcate') }}" name="mbcate">
                          @foreach($submb as $itemmb)
                            <option value=""></option>
                            <option value="{{$itemmb->Sub_ID}}">{{$itemmb->Sub_Name}}</option>
                          @endforeach
                      </select>
		          		</div>

                  <div class="form-group">
                    <label>Chức vụ:</label>
                    <select data-placeholder="Chọn từ danh mục" class="select" value="{{ old('mbposition') }}" name="mbposition">
                          @foreach($posmb as $itempos)
                            <option value=""></option>
                            <option value="{{$itempos->Position_ID}}">{{$itempos->Position_Name}}</option>
                          @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Tên nhân viên:</label>
                    <input type="text" class="form-control" placeholder="Tên nhân viên" value="{{ old('mbname') }}" name="mbname">
                  </div>


                  <div class="form-group">
                    <label>Là cấp dưới:</label>
                    <select data-placeholder="Chọn từ danh mục" class="select" value="{{ old('mbparent') }}" name="mbparent">
                          @foreach($prmb as $itempr)
                            <option value=""></option>
                            <option value="{{$itempr->Employee_ID}}">{{$itempr->Employee_Name}}</option>
                          @endforeach
                    </select>
                  </div>


                  <div class="form-group">
                    <label>Hình ảnh:</label>
                    <input type="file" class="file-styled" value="{{ old('mbimage') }}" name="mbimage" accept="image/jpeg,image/x-png,img/jpg">
                  </div>

                  <div class="form-group">
                    <span>Trưởng phòng:</span>
                    <div class="radio radio-primary">
                        <input type="radio" name="mbtop" id="radio1" value="1">
                        <label for="radio1">Có</label>
                        <br/>
                        <input type="radio" name="mbtop" id="radio2" value="0">
                        <label for="radio2">Không</label>
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <label>Phone nội bộ:</label>
                    <input type="text" class="form-control" placeholder="Phone nội bộ" value="{{ old('mbphone') }}" name="mbphone">
                  </div>

                  <div class="form-group">
                    <label>Email nội bộ:</label>
                    <input type="email" class="form-control" placeholder="email nội bộ" value="{{ old('mbemail') }}" name="mbemail">
                  </div> -->

                  <!-- <div class="form-group">
                    <label>Ngày tháng sinh :</label>
                    <input type="text" class="form-control" placeholder="Nhập ngày tháng" value="{{ old('mbbirth') }}" name="mbbirth">
                  </div> -->

                  <div class="form-group">
                    <label>Ngày tháng sinh :</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calendar2"></i></span>
                      <input type="text" class="form-control daterange-single" placeholder="Nhập ngày tháng" value="{{ old('mbbirth') }}" name="mbbirth">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Thông tin thêm</label>
                    <textarea id="editor1" class="ckeditor" rows="10" cols="80" name="mbcontent">{{ old('mbcontent') }}</textarea>
                  </div>

            </fieldset>

            <div class="text-right">
              <a href="{{route('quanli-member')}}" class="btn btn-danger"><i class="icon-arrow-left13 position-right"></i>Trở về</a>
              <button type="submit" class="btn btn-primary">Thêm<i class="icon-arrow-right14 position-right"></i></button>
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
