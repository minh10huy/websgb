@extends('master-admin')

@section('content')

<!-- Page header -->
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-magazine position-left"></i> <span class="text-semibold">Tin Tức</span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-component">
    <ul class="breadcrumb">
      <li><a href="{{route('quantri')}}"><i class="icon-home2 position-left"></i> Trang chủ</a></li>
      <li><a href="">Tin Tức</a></li>
      <li class="active">Danh sách</li>
    </ul>
  </div>
</div><!-- /page header -->


<!-- Content area -->
<div class="content">
  @if(session('messages'))
  <div class="alert alert-success">
      {{session('messages')}}
  </div>
  @endif
  <!-- Basic responsive configuration -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Danh sách tin tức</h5>
      <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
      </div>
    </div>

    <table class="table table-bordered news-table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tiêu đề</th>
          <th>Thao tác</th>
          <th>Ngày đăng</th>
          <th>Hình Ảnh</th>
          <th>Mô Tả</th>
          <th>Nội Dung</th>
        </tr>
      </thead>

      <tbody>
      <?php
        $path = 'public/upload/news/';
        $i = 1;
      ?>
      @foreach($listnews as $itemnews)

      <tr>
        <td>{{$i}}</td>
        <td>{{$itemnews->News_Title}}</td>
        <td class="text-center">
          <ul class="icons-list">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-menu9"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="{{route('sua-tin',$itemnews->News_ID)}}"><i class="icon-file-empty"></i><span class="label label label-info">Sửa</span></a></li>
                <li><a href="#" data-toggle="modal" data-target="#Modal-{{$itemnews->News_ID}}">
                  <i class="icon-file-minus"></i><span class="label label-danger">Xóa</span></a>
                </li>
              </ul>
              <!-- Modal -->
              <div class="modal fade" id="Modal-{{$itemnews->News_ID}}" tabindex="-1" role="dialog" aria-labelledby="newsModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button> -->
                      <h4 class="modal-title" id="newsModal">Bạn chắc muốn xóa tin {{$itemnews->News_Title}}</h4>
                    </div>
                    <div class="modal-footer">
                      <a href="{{route('xoa-tin',$itemnews->News_ID)}}" type="button" class="btn btn-danger">Xóa</a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
            </li>
          </ul>
        </td>
        <td>{{date('d-m-Y', strtotime($itemnews->News_Date))}}</td>
        <td>
          <img class="img-responsive" src="{{asset($path.date('d-m-Y', strtotime($itemnews->News_Date)).'/'.$itemnews->News_Image)}}"/>
          <ul class="icons-list">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-menu9"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li>
                  <a href="#" data-toggle="modal" data-target="#EditImg-{{$itemnews->News_ID}}">
                  <i class="icon-file-minus"></i><span class="label label-danger">Đổi hình</span></a>
                </li>
              </ul>


              <form class="form-horizontal" method="POST" action="{{Route('post-sua-tin-img',$itemnews->News_ID)}}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <!-- Modal -->
                  <div class="modal fade" id="EditImg-{{$itemnews->News_ID}}" data-keyboard="false" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="newsedit">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="newsedit">Chọn Hình Khác</h4>
                        </div>
                        <div class="modal-body">
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif

                          <div class="form-group">
                            <label>Ngày đăng :</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon-calendar2"></i></span>
                              <input type="text" class="form-control" readonly="true" placeholder="Chọn ngày đăng" value="{{date('d-m-Y', strtotime($itemnews->News_Date))}}" name="editdate">
                            </div>
                          </div>

                          <div class="form-group">
                            <input type="file" class="file-styled" name="editimg" accept="image/jpeg,image/x-png,img/jpg">
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Đổi<i class="icon-arrow-right14 position-right"></i></button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal -->
              </form><!-- /end form-->

            </li>
          </ul><!--/icon-list-->
        </td>
        <td>{{$itemnews->News_Description}}</td>
        <td>
          <p>{!!$itemnews->News_Content!!}</p>
        </td>
        <!-- <td>{{date('d-m-Y', strtotime($itemnews->News_Date))}}</td> -->

      </tr><!--end tr-->
      <?php  $i=$i+1; ?>
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- /basic responsive  -->


</div><!-- /content area -->

@endsection
