@extends('master-admin')

@section('content')
<!-- Content area -->
<div class="content">

  <!-- Fieldset legend -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <?php $path = 'public/upload/subcate/'?>

      <!-- Basic legend -->
      <form class="form-horizontal" method="POST" action="{{Route('post-sua-bophan',$updatedp->Sub_ID)}}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">Sửa Bộ Phận</h5>
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
                      <select data-placeholder="Chọn từ danh mục" class="select" value="{{ old('dpname') }}" name="dpcate">
                            <option value=""></option>
                            <option value="{{$updatedp->Cat_id}}">{{$updatedp->Cat_name}}</option>
                      </select>
		          		</div>

                  <div class="form-group">
                    <label>Tên bộ phận:</label>
                    <input type="text" class="form-control" placeholder="Nhập bộ phận" value="{{$updatedp->Sub_Name}}" name="dpname">
                  </div>

                  <div class="form-group">
                    <label>Hình Ảnh:</label>
                    <div class="row">
                      <div class="col-sm-10">
                        @if($updatedp->Sub_Image != "")
                      		<img class="img-responsive img-thumbnail" width="50%" src="{{asset($path.$updatedp->Sub_Image)}}"/>
  											<?php else: ?>
  												  Chưa có hình
  											@endif
                      </div>
                   </div>
                  </div>


                  <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control" rows="3" placeholder="Nhập mô tả" id="field-6" name="dpdesc">{{$updatedp->Sub_Description}}</textarea>
                  </div>
            </fieldset>

            <div class="text-right">
              <a href="{{route('quanli-bophan')}}" class="btn btn-danger"><i class="icon-arrow-left13 position-right"></i>Trở về</a>
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
