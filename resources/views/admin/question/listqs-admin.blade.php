@extends('master-admin')

@section('content')

<!-- Page header -->
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-grid position-left"></i> <span class="text-semibold">Câu hỏi</span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-component">
    <ul class="breadcrumb">
      <li><a href="{{route('quantri')}}"><i class="icon-home2 position-left"></i> Trang chủ</a></li>
      <li><a href="">Câu hỏi</a></li>
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

    <table class="table table-bordered ques-table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Câu hỏi</th>
          <th>Ngày đăng</th>
          <th class="text-center">Thao tác</th>
        </tr>
      </thead>

      <tbody>
      <?php
        $path = 'public/upload/question/';
        $i = 1;
      ?>
      @foreach($listqs as $itemqs)

      <tr>
        <td>{{$i}}</td>
        <td>{{$itemqs->Ques_Title}}</td>
        <td>{{date('d-m-Y', strtotime($itemqs->Ques_Date))}}</td>

        <td class="text-center">
          <ul class="icons-list">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-menu9"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="{{route('sua-cauhoi',$itemqs->Ques_ID)}}"><i class="icon-file-empty"></i><span class="label label label-info">Sửa</span></a></li>
                <li><a href="#" data-toggle="modal" data-target="#Modal-{{$itemqs->Ques_ID}}">
                  <i class="icon-file-minus"></i><span class="label label-danger">Xóa</span></a>
                </li>
              </ul>
              <!-- Modal -->
              <div class="modal fade" id="Modal-{{$itemqs->Ques_ID}}" tabindex="-1" role="dialog" aria-labelledby="newsModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="newsModal">Bạn có muốn xóa câu hỏi <span style="color:red">{{$itemqs->Ques_Title}}</span></h4>
                    </div>
                    <div class="modal-footer">
                      <a href="{{route('xoa-cauhoi',$itemqs->Ques_ID)}}" type="button" class="btn btn-danger">Xóa</a>
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
