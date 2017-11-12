@extends('master-admin')

@section('content')

<!-- Page header -->
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-people position-left"></i> <span class="text-semibold">Nhân sự</span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-component">
    <ul class="breadcrumb">
      <li><a href="{{route('quantri')}}"><i class="icon-home2 position-left"></i> Trang chủ</a></li>
      <li><a href="">Nhân Sự</a></li>
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
      <h5 class="panel-title">Danh sách nhân sự</h5>
      <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
      </div>
    </div>

    <table class="table table-bordered member-table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Bộ phận</th>
          <th>Vị trí</th>
          <th>Họ tên</th>
          <th>Hình ảnh</th>
          <th>Trưởng phòng/nhóm</th>
          <!-- <th>Phone nội bộ</th> -->
          <th>Cấp trên</th>
          <th>Email nội bộ</th>
          <th>Ngày sinh</th>
          <th>Thông tin</th>
          <th class="text-center">Thao tác</th>
        </tr>
      </thead>

      <tbody>
      <?php
        $path = 'public/upload/member/';
        $i = 1;
      ?>
      @foreach($listmb as $itemmb)

      <tr>
        <td>{{$i}}</td>
        <td>{{$itemmb->Sub_Name}}</td>
        <td>{{$itemmb->Position_Name}}</td>
        <td>{{$itemmb->Employee_Name}}</td>
        <td>
          @if($itemmb->Employee_Avatar != "")
            <img class="img-responsive" src="{{asset($path.$itemmb->Employee_Avatar)}}"/>
          <?php else: ?>
            <img src="../public/home/images/no-imgmem.png"/>
          @endif
          <ul class="icons-list">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-menu9"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li>
                  <a href="#" data-toggle="modal" data-target="#EditImg-{{$itemmb->Employee_ID}}">
                  <i class="icon-file-minus"></i><span class="label label-danger">Đổi hình</span></a>
                </li>
              </ul>


              <form class="form-horizontal" method="POST" action="{{Route('post-sua-member-img',$itemmb->Employee_ID)}}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <!-- Modal -->
                  <div class="modal fade" id="EditImg-{{$itemmb->Employee_ID}}" data-keyboard="false" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="newsedit">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="newsedit">Chọn hình khác cho nhân sự: <span style="color:red">{{$itemmb->Employee_Name}}</span></h4>
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
        <td>{{$itemmb->Employee_Top}}</td>
        <td>{{$itemmb->Employee_Parent_ID}}</td>
        <td>{{$itemmb->Employee_Email}}</td>
        <td>{{date('d-m', strtotime($itemmb->Employee_Birthday))}}</td>
        <td>{!!$itemmb->Employee_Intro!!}</td>
        <td class="text-center">
          <ul class="icons-list">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-menu9"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="{{route('sua-member',$itemmb->Employee_ID)}}"><i class="icon-file-empty"></i><span class="label label label-info">Sửa</span></a></li>
                <li><a href="#" data-toggle="modal" data-target="#Modal-{{$itemmb->Employee_ID}}">
                  <i class="icon-file-minus"></i><span class="label label-danger">Xóa</span></a>
                </li>
              </ul>
              <!-- Modal -->
              <div class="modal fade" id="Modal-{{$itemmb->Employee_ID}}" tabindex="-1" role="dialog" aria-labelledby="newsModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="newsModal">Bạn có muốn xóa nhân sự <span style="color:red">{{$itemmb->Employee_Name}}</span></h4>
                    </div>
                    <div class="modal-footer">
                      <a href="{{route('xoa-member',$itemmb->Employee_ID)}}" type="button" class="btn btn-danger">Xóa</a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
            </li>
          </ul>
        </td>
      </tr><!--end tr-->
      <?php  $i=$i+1; ?>
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- /basic responsive  -->


</div><!-- /content area -->

@endsection
