@extends('master-admin')

@section('content')

<!-- Page header -->
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-grid position-left"></i> <span class="text-semibold">Câu trả lời</span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-component">
    <ul class="breadcrumb">
      <li><a href="{{route('quantri')}}"><i class="icon-home2 position-left"></i> Trang chủ</a></li>
      <li><a href="{{route('quanli-chucvu')}}">Chức Vụ</a></li>
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
      <h5 class="panel-title">Danh sách chức vụ</h5>
      <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
      </div>
    </div>

    <table class="table table-bordered positon-table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Chức vụ</th>
          <th class="text-center">Thao tác</th>
        </tr>
      </thead>

      <tbody>
      <?php
        $i = 1;
      ?>
      @foreach($listpst as $listpo)

      <tr>
        <td>{{$i}}</td>
        <td>{{$listpo->Position_Name}}</td>

        <td class="text-center">
          <ul class="icons-list">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-menu9"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="{{route('sua-chucvu',$listpo->Position_ID)}}">
                <i class="icon-file-empty"></i><span class="label label label-info">Sửa</span></a></li>
              </ul>
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
