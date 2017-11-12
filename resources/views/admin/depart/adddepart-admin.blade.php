@extends('master-admin')

@section('content')
<!-- Content area -->
<div class="content">

  <!-- Fieldset legend -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <!-- Basic legend -->
      <form class="form-horizontal" method="POST" action="{{Route('post-them-bophan')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">Thêm Bộ Phận</h5>
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
										  <label>Danh mục:</label>
                      <select data-placeholder="Chọn từ danh mục" class="select" name="dpcate">
                          @foreach($catedp as $catdp)
                            <option value=""></option>
                            <option value="{{$catdp->Cat_id}}">{{$catdp->Cat_name}}</option>
                          @endforeach
                      </select>
		          		</div>

                  <div class="form-group">
                    <label>Tên bộ phận:</label>
                    <input type="text" class="form-control" placeholder="Tên bộ phận" value="{{ old('dpname') }}" name="dpname">
                  </div>

                  <div class="form-group">
                    <label>Hình ảnh:</label>
                    <input type="file" class="file-styled" value="{{ old('nlimage') }}" name="dpimage" accept="image/jpeg,image/x-png,img/jpg">
                  </div>

                  <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control" rows="3" placeholder="Nhập mô tả" id="field-6" name="dpdesc">{{ old('ndesc') }}</textarea>
                  </div>
            </fieldset>

            <div class="text-right">
              <a href="{{route('quanli-bophan')}}" class="btn btn-danger"><i class="icon-arrow-left13 position-right"></i>Trở về</a>
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
